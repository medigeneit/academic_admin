@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Global Setting<small>Global Setting</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            @if(Session::has('message'))
                <div class="allert-message alert-success-message pgray  alert-lg" role="alert">
                    <p> {{ Session::get('message') }}</p>
                </div>
            @endif

            p[po[op[

                {!! Form::open(['url'=>'global-setting','files'=>true]) !!}
                <div class="row">
                    <div class="col-xs-4">
                        <div class="box">
                            <!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Company Name</label>
                                    <input type="text" name="company_name" value="{{ $global_setting->company_name }}" placeholder="Enter Company Name" id="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ $global_setting->email }}" placeholder="Enter Email Address" id="email" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name">Facebook</label>
                                    <input type="url" name="facebook" value="{{ $global_setting->facebook }}" placeholder="Enter Facebook" id="phone" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name">Twitter</label>
                                    <input type="url" name="twitter" value="{{ $global_setting->twitter }}" placeholder="Enter User Name" id="phone" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name">Google Plus</label>
                                    <input type="url" name="google_plus" value="{{ $global_setting->google_plus }}" placeholder="Enter Google Plus" id="phone" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name">Youtube</label>
                                    <input type="url" name="youtube" value="{{ $global_setting->youtube }}" placeholder="Enter Youtube" id="phone" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name">Linkedin</label>
                                    <input type="url" name="linkedin" value="{{ $global_setting->linkedin }}" placeholder="Enter Linkedin" id="phone" class="form-control">
                                </div>


                            </div>

                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Logo</h3>
                            </div>
                            <div class="box-body text-center">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 200px;">
                                        <img src="@if($global_setting->company_logo != ''){{ asset($global_setting->company_logo) }} @else{{ 'http://placehold.it/200x200' }} @endif" width="100%" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                    <div>
                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                        <input name="company_logo" type="file" >
                                    </span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Favicon</h3>
                            </div>
                            <div class="box-body text-center">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 200px;">
                                        <img src="@if($global_setting->favicon != ''){{ asset($global_setting->favicon) }} @else{{ 'http://placehold.it/200x200' }} @endif" width="100%" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                    <div>
                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                        <input name="favicon" type="file" >
                                    </span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Update</button>
                <button type="button" class="btn btn-default" onclick="window.history.back();">Back</button>

                {!! Form::close() !!}

        </section>
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

    <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
    <script>
        $(function () {

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false,
            })

        })
    </script>




@endsection