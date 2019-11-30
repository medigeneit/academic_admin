@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>User Profile<small>User Profile</small></h1>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-9">
                    <div class="box">
                        @if(Session::has('message'))
                            <div class="allert-message alert-success-message pgray  alert-lg" role="alert">
                                <p> {{ Session::get('message') }}</p>
                            </div>
                        @endif
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name: {{ $user->name }}</label>
                            </div>
                            <div class="form-group">
                                <label for="email">Email: {{ $user->email }}</label>
                            </div>

                            <div class="form-group">
                                <label for="name">Phone: {{ $user->phone }}</label>
                            </div>

                            <div class="form-group">
                                <label for="name">Status: {{ $user->status }}</label>
                            </div>


                            <a class="btn btn-primary" href="{{ url('profile-edit/'.Auth::id()) }}"> Profile Update</a>


                        </div>
                        <!-- /.box-body -->


                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Profile Image</h3>
                        </div>
                        <div class="box-body text-center">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 200px;">
                                    <img src="@if($user->image != ''){{ asset($user->image) }} @else{{ 'http://placehold.it/200x200' }} @endif" width="100%" alt="...">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

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

    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>




@endsection