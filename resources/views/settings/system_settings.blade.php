@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Global Setting<small>Global Setting</small>
            </h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-body">
                    @php  $tab = isset($_GET['tab'])?$_GET['tab']:'Basic' @endphp
            <div class="row">


            <div class="col-xs-3">
                <ul class="nav nav-tabs tabs-left">
                    <li class="@php echo ($tab=='Basic')?'active':'' @endphp"><a href="#basic" data-toggle="tab">Basic</a></li>
                    <li class="@php echo ($tab=='Contact')?'active':'' @endphp"><a href="#contact" data-toggle="tab">Contact</a></li>
                    <li class="@php echo ($tab=='Social')?'active':'' @endphp"><a href="#social" data-toggle="tab">Social</a></li>
                    <li class="@php echo ($tab=='Misc')?'active':'' @endphp"><a href="#misc" data-toggle="tab">Misc</a></li>
                </ul>
            </div>
            <div class="col-xs-9">
                <!-- Tab panes -->
                {!! Form::open(['url'=>'system-settings','files'=>true]) !!}
                <input type="hidden" name="tab" value="{{$tab}}">
                <div class="tab-content">

                    <div class="tab-pane @php echo ($tab=='Basic')?'active':'' @endphp" id="basic">
                        <div class="form-group">
                            <label>Site Title</label>
                            <input type="text" class="form-control" value="{{ settings('site_title', $settings) }}" name="data[site_title]">
                        </div>
                        <div class="form-group">
                            <label>Slogan</label>
                            <input type="text" class="form-control" value="{{ settings('site_slogan', $settings) }}" name="data[site_slogan]">
                        </div>

                        <div class="form-group">
                            <label>Fevicon @if(settings('site_fevicon', $settings)) <a href="#" data-toggle="modal" data-target="#FeviconModal">View Fevicon</a> @endif</label>
                            <div class="input-group">
                                <input id="Fevicon" readonly  type="text" class="form-control" value="{{ settings('site_fevicon', $settings) }}" name="data[site_fevicon]">
                                <a data-input="Fevicon" class="lfm iframe-btn input-group-addon bg-success no-border"><i class="icon fa fa-upload"></i></a>
                                <a onclick="$(this).parent().find('#Fevicon').val('');" href="javascript:" class="input-group-addon bg-danger no-border"><i class="icon fa fa-times-circle"></i></a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Logo @if(settings('site_logo', $settings)) <a href="#" data-toggle="modal" data-target="#LogoModal">View Logo</a> @endif</label>
                            <div class="input-group">
                                <input id="Logo" readonly type="text" class="form-control" value="{{ settings('site_logo', $settings) }}" name="data[site_logo]">
                                <a data-input="Logo" class="lfm iframe-btn input-group-addon bg-success no-border"><i class="icon fa fa-upload"></i></a>
                                <a onclick="$(this).parent().find('#Logo').val('');" href="javascript:" class="input-group-addon bg-danger no-border"><i class="icon fa fa-times-circle"></i></a>
                            </div>
                        </div>

                    </div>


                    <div class="tab-pane @php echo ($tab=='Contact')?'active':'' @endphp" id="contact">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" class="form-control" value="{{ settings('site_phone', $settings) }}" name="data[site_phone]">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{ settings('site_email', $settings) }}" name="data[site_email]">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" value="{{ settings('site_address', $settings) }}" name="data[site_address]">
                        </div>
                    </div>


                    <div class="tab-pane @php echo ($tab=='Social')?'active':'' @endphp" id="social">
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" class="form-control" value="{{ settings('site_facebook', $settings) }}" name="data[site_facebook]">
                        </div>
                        <div class="form-group">
                            <label>Twitter</label>
                            <input type="text" class="form-control" value="{{ settings('site_twitter', $settings) }}" name="data[site_twitter]">
                        </div>
                        <div class="form-group">
                            <label>LinkedIn</label>
                            <input type="text" class="form-control" value="{{ settings('site_linkedin', $settings) }}" name="data[site_linkedin]">
                        </div>
                        <div class="form-group">
                            <label>Google Plus</label>
                            <input type="text" class="form-control" value="{{ settings('site_google_plus', $settings) }}" name="data[site_google_plus]">
                        </div>
                        <div class="form-group">
                            <label>Instagram</label>
                            <input type="text" class="form-control" value="{{ settings('site_instagram', $settings) }}" name="data[site_instagram]">
                        </div>
                        <div class="form-group">
                            <label>Pinterest</label>
                            <input type="text" class="form-control" value="{{ settings('site_pinterest', $settings) }}" name="data[site_pinterest]">
                        </div>
                    </div>

                    <div class="tab-pane @php echo ($tab=='Misc')?'active':'' @endphp" id="misc">

                        <div class="form-group">
                            <label>Show the statistics section ? {{ settings('show_statistics_section', $settings) }}</label><br>
                            <label class="radio-inline"><input type="radio" {{ (settings('show_statistics_section', $settings)=='yes')?'checked':'' }} value="yes" name="data[show_statistics_section]">Yes</label>
                            <label class="radio-inline"><input type="radio" {{ (settings('show_statistics_section', $settings)=='no')?'checked':'' }} value="no" name="data[show_statistics_section]">No</label>
                        </div>

                        <div class="form-group">
                            <label>Special Job Exam {{ settings('spaecial_job_exam_id', $settings) }}</label>
                            {!! Form::select('data[spaecial_job_exam_id]', $job_exam, settings('spaecial_job_exam_id', $settings),['class'=>'form-control','required'=>'required']) !!}
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
            </div>
                </div>


            </div>

        </section>
    </div>


    <!-- Modal -->
    {{--fevicon modal--}}
    <div id="FeviconModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Fevicon Icom</h4>
                </div>
                <div class="modal-body">
                    <img src="{{ asset(settings('site_fevicon', $settings)) }}" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    {{--logo modal--}}
    <div id="LogoModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Logo</h4>
                </div>
                <div class="modal-body">
                    <img src="{{ asset(settings('site_logo', $settings)) }}" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
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

    <!-- bootstrap time picker -->
    <script src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>



    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {

            $('.tabs-left a').click(function(){
                var tabtext = $(this).text();
                $('[name="tab"]').val(tabtext);
            })


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

                    };
                    return false;
                });
            }
            $('.lfm').filemanager('image');



        })

    </script>






@endsection