@extends('layouts.app')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Subject/Course<small>Add Subject/Course</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::open(['action'=>'SubjectsController@store','files'=>true]) !!}
                <div class="col-xs-9">
                    <div class="box">
                        <!-- form start -->
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name">Subject/Course Name</label>
                                <input type="text" name="title" value="{{ old('title') }}" placeholder="Enter Subject Name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Institution Type</label>
                                {!! Form::select('institution_type_id[]', $institution_type, old('institution_type_id'),['class'=>'form-control select2','multiple'=>'multiple']) !!}
                            </div>

                            <div class="form-group">
                                <label for="name">Institution Category</label>
                                @php $institution_category->prepend('Select Institution Category','') @endphp
                                {!! Form::select('institution_category_id', $institution_category, old('institution_category_id'),['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                <label>Clasees</label>
                                {!! Form::select('class_id[]', $classes, old('class_id'),['class'=>'form-control class2','multiple'=>'multiple']) !!}
                            </div>

                            <div class="form-group">
                                <label for="name">Department</label>
                                @php $department->prepend('Select Department','') @endphp
                                {!! Form::select('department_id', $department, old('department_id'),['class'=>'form-control']) !!}
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button type="button" class="btn btn-default" onclick="window.history.back();">Back</button>
                        </div>
                    </div>
                </div>


                {!! Form::close() !!}
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')

    <!-- Morris.js charts -->
    <script src="{{ asset('js/raphael.min.js') }}"></script>
    <script src="{{ asset('js/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('js/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('js/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('js/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('js/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('js/demo.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('js/select2.full.min.js') }}"></script>

    <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
    <script>
        $(function () {

            $('.select2').select2({
                placeholder:'Select Institution Types',
            });

            $('.class2').select2({
                placeholder:'Select Institution Types',
            });


            $("body").on( "change", "[name='institution_type_id']", function() {
                var institution_type_id = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: '/institute-type-class',
                    dataType: 'HTML',
                    data: {institution_type_id: institution_type_id},
                    success: function( data ) {
                        $('.classes').html(data);
                    }
                });
            })


        })
    </script>




@endsection
