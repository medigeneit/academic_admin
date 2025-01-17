@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Feedback  <small>Add Feedback</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::open(['action'=>'FeedbackController@store','files'=>true]) !!}
                <div class="col-xs-9">
                    <div class="box">
                        <input type="hidden" name="institution_type_id" value="13">
                        <div class="box-body">


                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" name="title" value="{{ old('title') }}" placeholder="Enter Title" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Detail</label>
                                <textarea name="detail" cols="40" rows="12" id="DetailNews" data-error-container="#editor1_error" class="form-control" ></textarea>
                            </div>


                        </div>

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
                placeholder:'Select Services',
            });
        })
    </script>

    <script type="text/javascript" src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">

        tinymce.init({
            content_css : "{{ asset('assets/tinymce/mcecontent.css') }}",
            selector: "#DetailNews",
            theme: "modern",
            force_p_newlines : false,
            force_br_newlines : true,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor responsivefilemanager"
            ],
            relative_urls : false,
            remove_script_host : false,
            convert_urls : true,
            paste_as_text: true,
            paste_data_images: false,
            paste_auto_cleanup_on_paste : true,
            toolbar1: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | |styleselect fontsizeselect | link unlink anchor",
            toolbar2: "| responsivefilemanager | insertfile image media |  print preview  code | forecolor backcolor emoticons |  pastetext pasteword  selectall",
            image_advtab: true,
            external_filemanager_path:"{{URL::to('/').'/assets/filemanager/'}}",
            filemanager_title:"Filemanager" ,
            external_plugins: { "filemanager" : "{{ asset('assets/filemanager/plugin.min.js') }}"},
            templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
            ]
        });

        $("body").on( "change", "[name='class_id']", function() {
            var class_id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: '/class-subject',
                dataType: 'HTML',
                data: {class_id: class_id},
                success: function( data ) {
                    $('.subject').html(data);
                }
            });
        })




    </script>




@endsection