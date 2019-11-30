@extends('layouts.app')
@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h1>Admission Test<small>Edit Admission Test</small></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::open(['action'=>['AdmissionTestController@update',$admission_test->id],'method'=>'PUT','files'=>true]) !!}
                <div class="col-xs-9">
                    <div class="box">
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Institution Category</label>
                                @php $institutions_category->prepend('Select Category','') @endphp
                                {!! Form::select('institution_category_id', $institutions_category, $admission_test->institution_category_id,['class'=>'form-control','required'=>'required']) !!}
                            </div>
                            <div class="institutions-subject">
                                <div class="form-group">
                                    <label>Institution</label>
                                    @php $institutions->prepend('Select Institution','') @endphp
                                    {!! Form::select('institution_id', $institutions, $admission_test->institution_id,['class'=>'form-control','required'=>'required']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    @php $subject->prepend('Select Subject','') @endphp
                                    {!! Form::select('subject_id', $subject, $admission_test->subject_id,['class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>



                            <div class="form-group">
                                <label>Content Type</label>
                                @php $content_type->prepend('Select Content Type','') @endphp
                                {!! Form::select('content_type_id', $content_type, $admission_test->content_type_id,['class'=>'form-control','required'=>'required']) !!}
                            </div>


                            <div class="form-group">
                                <label for="name">Content Name</label>
                                <input type="text" name="content_name" value="{{ $admission_test->content_name }}" placeholder="Enter Content Name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Material Type</label>
                                @php $material_type->prepend('Select Material Type','') @endphp
                                {!! Form::select('material_type_id', $material_type, $admission_test->material_type_id,['class'=>'form-control','required'=>'required']) !!}
                            </div>

                            <div class="main_content">
                                @if($admission_test->content_type_id ==1 || $admission_test->content_type_id ==3 || $admission_test->content_type_id==5)
                                    <div class="form-group">
                                        <a id="holder_image" target="_blank" href="{{asset($admission_test->file_location)}}">
                                            @php $file_array = explode('/',$admission_test->file_location); @endphp
                                            <p class="image_name">{{end($file_array)}}</p></a>
                                        <div class="input-group">
                                                      <span class="input-group-btn">
                                                        <a  data-input="thumbnail_image" data-preview="holder_image" style="width: 100%" class="lfm btn btn-primary">
                                                          <i class="fa fa-picture-o"></i> {{($admission_test->file_location)?'Change File':'Choose File'}}
                                                        </a>
                                                      </span>
                                            <input id="thumbnail_image" class="form-control" type="hidden" value="{{$admission_test->file_location}}" name="file_location">
                                        </div>
                                    </div>
                                @elseif($admission_test->content_type_id ==2)
                                    <div class="form-group">
                                        <label for="name">Youtube Link</label>
                                        <input type="text" name="file_location" value="{{$admission_test->file_location}}" placeholder="Enter Content Name" id="name" class="form-control" required>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Detail</label>
                                        <textarea name="file_content" cols="40" rows="12"  data-error-container="#editor1_error" class="editor form-control" >{{$admission_test->file_content}}</textarea>
                                    </div>
                                @endif
                            </div>


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">Update</button>
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

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>
        var editor_config ={
            path_absolute : "/",
            selector: "textarea.editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern",
                "textcolor"
            ],

            toolbar: "insertfile undo redo | styleselect | bold italic | fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;



                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };
        tinymce.init(editor_config);


        $.fn.filemanager_image = function(type, options) {
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
                    target_preview.attr('href', url).trigger('change');
                };
                return false;
            });
        }

        $('.lfm').filemanager_image('file');




    </script>

    <script type="text/javascript">


        $("body").on( "change", "[name='institution_category_id']", function() {
            var institution_category_id = $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: '/institute-category-institute-subject',
                dataType: 'HTML',
                data: {institution_category_id: institution_category_id,institution_type_id:7},
                success: function( data ) {
                    $('.institutions-subject').html(data);
                    tinymce.init(editor_config);
                    $('.lfm').filemanager('file');
                }
            });
        })




    </script>



@endsection