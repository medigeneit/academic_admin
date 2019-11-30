@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Institution
                <small>Edit Institution</small>
            </h1>


        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::open(['action'=>['InstitutionController@update',$institution->id],'method'=>'PUT','files'=>true]) !!}
                <div class="col-xs-9">
                    <div class="box">
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $institution->name }}" placeholder="Enter Name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Address</label>
                                <input type="text" name="address" value="{{ $institution->address }}" placeholder="Enter Address"  class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Institution Type</label>
                                {!! Form::select('institution_type_id[]', $institution_type, $institution_types,['class'=>'form-control select2','multiple'=>'multiple']) !!}
                            </div>

                            <div class="form-group">
                                <label>Institution Category</label>
                                @php $institution_category->prepend('Select Institution Category','') @endphp
                                {!! Form::select('institution_category_id', $institution_category, $institution->institution_category_id,['class'=>'form-control']) !!}
                            </div>

                            <div class="classes">
                                <div class="form-group">
                                    <label>Select Departments</label>
                                    {!! Form::select('department_id[]', $departments, $department_institution,['class'=>'select2 form-control','multiple'=>'multiple','required'=>'required']) !!}
                                </div>
                            </div>


                            <div class="classes">
                                <div class="form-group">
                                    <label>Select Classes</label>
                                    {!! Form::select('class_id[]', $classes, $class_institution,['class'=>'select2 form-control','multiple'=>'multiple','required'=>'required']) !!}
                                </div>
                            </div>



                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button type="button" class="btn btn-default" onclick="window.history.back();">Back</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <img id="holder_image" src="{{asset($institution->image)}}" style="margin-top:15px;margin-bottom:5px;max-width:100%;">
                        @php $file_array = explode('/',$institution->image); @endphp
                        <p class="image_name">{{end($file_array)}}</p>
                        <div class="input-group">
                                                      <span class="input-group-btn">
                                                        <a  data-input="thumbnail_image" data-preview="holder_image" style="width: 100%" class="lfm btn btn-primary">
                                                          <i class="fa fa-picture-o"></i> {{($institution->image)?'Change Image':'Choose Image'}}
                                                        </a>
                                                      </span>
                            <input id="thumbnail_image" class="form-control" type="hidden" value="{{$institution->image}}" name="image">
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
                placeholder:'Select Classes',

            });

            $.fn.filemanager = function(type, options) {
                type = type || 'file';

                this.on('click', function(e) {
                    var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                    localStorage.setItem('target_input', $(this).data('input'));
                    localStorage.setItem('target_preview', $(this).data('preview'));
                    window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
                    window.SetUrl = function (url, file_path) {
                        //set the value of the desired input to image url
                        var target_input = $('#' + localStorage.getItem('target_input'));
                        target_input.val(file_path).trigger('change');

                        // view file name
                        file_path_arr = file_path.split('/');
                        file_name = file_path_arr[file_path_arr.length-1];
                        $('.image_name').text(file_name).trigger('change');

                        //set or change the preview image src
                        var target_preview = $('#' + localStorage.getItem('target_preview'));
                        target_preview.attr('src', url).trigger('change');
                    };
                    return false;
                });
            }

            $('.lfm').filemanager('image');



        })
    </script>



@endsection