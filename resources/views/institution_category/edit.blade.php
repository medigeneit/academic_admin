@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Institution Category
                <small>Edit Institution Category</small>
            </h1>


        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::open(['action'=>['InstitutionCategoryController@update',$institution_category->id],'method'=>'PUT','files'=>true]) !!}
                <div class="col-xs-9">
                    <div class="box">
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" name="title" value="{{ $institution_category->title }}" placeholder="Enter Name" id="name" class="form-control" required>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">Update</button>                             <button type="button" class="btn btn-default" onclick="window.history.back();">Back</button>
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
            var s2 = $('.select2').select2({
                placeholder:'Select Services',

            });

            var ids = $('#sourceValues').val();





            s2.val(vals).trigger("change");



        })
    </script>



@endsection