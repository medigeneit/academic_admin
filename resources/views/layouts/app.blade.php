<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ settings('site_title', $settings) }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/png" href="{{ settings('site_fevicon', $settings) }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-timepicker.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('css/blue.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('css/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('css/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap3-wysihtml5.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/jasny-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jasny-bootstrap.min.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('/')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>{{ settings('site_title', $settings) }}</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">{{ settings('site_title', $settings) }}</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    @if(isset($notifications))
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">@php echo (count($notifications))?count($notifications):''@endphp</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">@php echo (count($notifications))?"You have ". count($notifications)." notifications":'No Notification Received'@endphp</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    @foreach($notifications as $notification)
                                    <li>
                                        <a href="{{url('message-show/'.$notification->ticket_id)}}">
                                            <i class="fa fa-users text-aqua"></i> {!! $notification->message !!}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endif


                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="@if(Auth::user()->profile_image != ''){{ asset(Auth::user()->profile_image) }} @else{{ 'http://placehold.it/200x200' }} @endif " class="user-image" alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="@if(Auth::user()->profile_image != ''){{ asset(Auth::user()->profile_image) }} @else{{ 'http://placehold.it/200x200' }} @endif " class="img-circle" alt="User Image">

                                <p>
                                    {{Auth::user()->name}}
                                </p>
                            </li>


                            <!-- Menu Footer-->
                            <li style="background: #dddddd" class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ url('profile/'.Auth::id()) }}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    {!! Form::open(['route' => 'auth.logout', 'id' => 'logout']) !!}
                                    <button type="submit">Logout</button>
                                    {!! Form::close() !!}
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="@if(Auth::user()->image != ''){{ asset(Auth::user()->image) }} @else{{ 'http://placehold.it/200x200' }} @endif" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="@php echo (Request::segment(1)=='' || Request::segment(1)=='home' )?'active':'' @endphp">
                    <a href="{{url('/')}}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                @can('users_manage')
                 <li class="treeview @php echo (in_array(Request::segment(1), array("users", "permissions", "roles")))?'active':'' @endphp">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Users Management</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="@php echo (Request::segment(1)=='users' && Request::segment(2)=='')?'active':''  @endphp"><a href="{{ url('users') }}"><i class="fa fa-circle-o"></i>Users List</a></li>
                        <li class="@php echo (Request::segment(1)=='users' && Request::segment(2)=='create')?'active':''  @endphp"><a href="{{ action('UsersController@create') }}"><i class="fa fa-circle-o"></i> Add New User</a></li>
                        <li class="{{ Request::segment(1) == 'permissions' ? 'active active-sub' : '' }}"><a href="{{ url('permissions') }}"><i class="fa fa-briefcase"></i><span class="title">Permision</span></a></li>
                        <li class="{{ Request::segment(1) == 'roles' ? 'active active-sub' : '' }}"><a href="{{ url('roles') }}"><i class="fa fa-briefcase"></i><span class="title">Role</span></a></li>
                    </ul>
                 </li>
                @endcan


                <li class="treeview @php echo in_array(Request::segment(1),array('institution','classes','institution-type','subjects','writers','content-type','level-year','departments','institution-category','subjects','locations','job-exam-subject','job-exam','skill-development-category'))?'active':''  @endphp">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Basic Setup</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('Class')
                            <li class="@php echo (Request::segment(1)=='classes')?'active':''  @endphp"><a href="{{ url('classes') }}"><i class="fa fa-circle-o"></i>Class</a></li>
                        @endcan
                                @can('Institution Type')
                        <li class="@php echo (Request::segment(1)=='institution-type')?'active':''  @endphp"><a href="{{ url('institution-type') }}"><i class="fa fa-circle-o"></i>Institution Type</a></li>
                                @endcan
                                @can('Institution Category')
                        <li class="@php echo (Request::segment(1)=='institution-category')?'active':''  @endphp"><a href="{{ url('institution-category') }}"><i class="fa fa-circle-o"></i>Institution Category</a></li>
                                 @endcan
                                 @can('Institution')
                        <li class="@php echo (Request::segment(1)=='institution')?'active':''  @endphp"><a href="{{ url('institution') }}"><i class="fa fa-circle-o"></i>Institution</a></li>
                                @endcan

                                @can('Subject')
                        <li class="@php echo (Request::segment(1)=='subjects')?'active':''  @endphp"><a href="{{ url('subjects') }}"><i class="fa fa-circle-o"></i>Subject</a></li>
                                @endcan
                                @can('Department')
                        <li class="@php echo (Request::segment(1)=='departments')?'active':''  @endphp"><a href="{{ url('departments') }}"><i class="fa fa-circle-o"></i>Department</a></li>
                                @endcan
                                @can('Writer')
                        <li class="@php echo (Request::segment(1)=='writers')?'active':''  @endphp"><a href="{{ url('writers') }}"><i class="fa fa-circle-o"></i>Writer</a></li>
                                @endcan
                                @can('Content Type')
                        <li class="@php echo (Request::segment(1)=='content-type')?'active':''  @endphp"><a href="{{ url('content-type') }}"><i class="fa fa-circle-o"></i>Content Type</a></li>
                                @endcan
                                @can('Skill Development Category')
                        <li class="@php echo (Request::segment(1)=='skill-development-category')?'active':''  @endphp"><a href="{{ url('skill-development-category') }}"><i class="fa fa-circle-o"></i>Skill Development Category</a></li>
                                @endcan
                                @can('Writer')
                        <li class="@php echo (Request::segment(1)=='standarized-tests')?'active':''  @endphp"><a href="{{ url('standarized-tests') }}"><i class="fa fa-circle-o"></i>Standarized Tests</a></li>
                                @endcan

                                @can('Job Exam Subject')
                        <li class="@php echo (Request::segment(1)=='job-exam-subject')?'active':''  @endphp"><a href="{{ url('job-exam-subject') }}"><i class="fa fa-circle-o"></i>Job Exam Subject</a></li>
                                @endcan
                                @can('Job Exam')
                        <li class="@php echo (Request::segment(1)=='job-exam')?'active':''  @endphp"><a href="{{ url('job-exam') }}"><i class="fa fa-circle-o"></i>Job Exam</a></li>
                               @endcan
                    </ul>
                </li>

                <li class="treeview @php echo in_array(Request::segment(1),array('contents','school-college','madrasha','english-medium','english-version','qawmi','technical-vocational','admission-test','under-graduate','post-graduate','higher-study','job','skill-development','level-year'))?'active':''  @endphp">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Contents</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('School & College')
                        <li class="@php echo (Request::segment(1)=='school-college')?'active':''  @endphp"><a href="{{ url('school-college') }}"><i class="fa fa-circle-o"></i>School & College</a></li>
                        @endcan
                        @can('Madrasha')
                        <li class="@php echo (Request::segment(1)=='madrasha')?'active':''  @endphp"><a href="{{ url('madrasha') }}"><i class="fa fa-circle-o"></i>Madrasha</a></li>
                            @endcan
                            @can('English Medium')
                        <li class="@php echo (Request::segment(1)=='english-medium')?'active':''  @endphp"><a href="{{ url('english-medium') }}"><i class="fa fa-circle-o"></i>English Medium</a></li>
                            @endcan
                            @can('English Version')
                        <li class="@php echo (Request::segment(1)=='english-version')?'active':''  @endphp"><a href="{{ url('english-version') }}"><i class="fa fa-circle-o"></i>English Version</a></li>
                            @endcan
                            @can('Qawmi')
                        <li class="@php echo (Request::segment(1)=='qawmi')?'active':''  @endphp"><a href="{{ url('qawmi') }}"><i class="fa fa-circle-o"></i>Qawmi</a></li>
                            @endcan
                            @can('Technical & Vocational')
                        <li class="@php echo (Request::segment(1)=='technical-vocational')?'active':''  @endphp"><a href="{{ url('technical-vocational') }}"><i class="fa fa-circle-o"></i>Technical & Vocational</a></li>
                            @endcan
                            @can('Admission Test')
                        <li class="@php echo (Request::segment(1)=='admission-test')?'active':''  @endphp"><a href="{{ url('admission-test') }}"><i class="fa fa-circle-o"></i>Admission Test</a></li>
                            @endcan
                            @can('Under Graduate')
                        <li class="@php echo (Request::segment(1)=='under-graduate')?'active':''  @endphp"><a href="{{ url('under-graduate') }}"><i class="fa fa-circle-o"></i>Under Graduate</a></li>
                            @endcan
                            @can('Post Graduate')
                        <li class="@php echo (Request::segment(1)=='post-graduate')?'active':''  @endphp"><a href="{{ url('post-graduate') }}"><i class="fa fa-circle-o"></i>Post Graduate</a></li>
                            @endcan
                            @can('Skill Development')
                        <li class="@php echo (Request::segment(1)=='skill-development')?'active':''  @endphp"><a href="{{ url('skill-development') }}"><i class="fa fa-circle-o"></i>Skill Development</a></li>
                            @endcan
                            @can('Higher Study')
                        <li class="@php echo (Request::segment(1)=='higher-study')?'active':''  @endphp"><a href="{{ url('higher-study') }}"><i class="fa fa-circle-o"></i>Higher Study</a></li>
                            @endcan
                            @can('Job')
                        <li class="@php echo (Request::segment(1)=='job')?'active':''  @endphp"><a href="{{ url('job') }}"><i class="fa fa-circle-o"></i>Job Preparation</a></li>
                            @endcan

                    </ul>
                </li>

                @can('Approve Manager')
                <li class="@php echo (Request::segment(1)=='approve' )?'active':'' @endphp">
                    <a href="{{url('approve')}}">
                        <i class="fa fa-dashboard"></i> <span>Approve</span>
                    </a>
                </li>
                @endcan



                @can('Pages Manager')
                <li class="treeview @php echo (in_array(Request::segment(1), array("pages")))?'active':'' @endphp">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Pages</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="@php echo (Request::segment(1)=='pages')?'active':''  @endphp"><a href="{{ url('pages') }}"><i class="fa fa-circle-o"></i>Pages List</a></li>
                        <li class="@php echo (Request::segment(1)=='pages' && Request::segment(2)=='create')?'active':''  @endphp"><a href="{{ action('PagesController@create') }}"><i class="fa fa-circle-o"></i> Add New Page</a></li>
                    </ul>
                </li>
                @endcan

                @can('Blogs Manager')
                <li class="treeview @php echo (in_array(Request::segment(1), array("users", "permissions", "roles")))?'active':'' @endphp">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Blogs/Scholarships</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="@php echo (Request::segment(1)=='blogs' && Request::segment(2)=='')?'active':''  @endphp"><a href="{{ url('blogs') }}"><i class="fa fa-circle-o"></i>Blogs List</a></li>
                        <li class="@php echo (Request::segment(1)=='blogs' && Request::segment(2)=='create')?'active':''  @endphp"><a href="{{ action('BlogsController@create') }}"><i class="fa fa-circle-o"></i> Add New Blog</a></li>
                    </ul>
                </li>
                @endcan


                @can('Blogs Manager')
                    <li class="treeview @php echo (in_array(Request::segment(1), array("useful-higher-education")))?'active':'' @endphp">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Useful Higher Education</span>
                            <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@php echo (Request::segment(1)=='useful-higher-education' && Request::segment(2)=='')?'active':''  @endphp"><a href="{{ url('useful-higher-education') }}"><i class="fa fa-circle-o"></i>List</a></li>
                            <li class="@php echo (Request::segment(1)=='useful-higher-education' && Request::segment(2)=='create')?'active':''  @endphp"><a href="{{ action('UsefulHigherEducationController@create') }}"><i class="fa fa-circle-o"></i> Add New</a></li>
                        </ul>
                    </li>
                @endcan

                @can('Blogs Manager')
                    <li class="treeview @php echo (in_array(Request::segment(1), array("job-circular")))?'active':'' @endphp">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Job Circular</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@php echo (Request::segment(1)=='job-circular' && Request::segment(2)=='')?'active':''  @endphp"><a href="{{ url('job-circular') }}"><i class="fa fa-circle-o"></i>List</a></li>
                            <li class="@php echo (Request::segment(1)=='job-circular' && Request::segment(2)=='create')?'active':''  @endphp"><a href="{{ action('JobCircularController@create') }}"><i class="fa fa-circle-o"></i> Add New</a></li>
                        </ul>
                    </li>
                @endcan

                @can('University Manager')
                    <li class="treeview @php echo (in_array(Request::segment(1), array("university")))?'active':'' @endphp">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>University</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@php echo (Request::segment(1)=='country')?'active':''  @endphp"><a href="{{ url('country') }}"><i class="fa fa-circle-o"></i>Country</a></li>
                            <li class="@php echo (Request::segment(1)=='state')?'active':''  @endphp"><a href="{{ url('state') }}"><i class="fa fa-circle-o"></i>State</a></li>
                            <li class="@php echo (Request::segment(1)=='city')?'active':''  @endphp"><a href="{{ url('city') }}"><i class="fa fa-circle-o"></i>City</a></li>
                            <li class="@php echo (Request::segment(1)=='university' && Request::segment(2)=='')?'active':''  @endphp"><a href="{{ url('university') }}"><i class="fa fa-circle-o"></i>University List</a></li>
                            <li class="@php echo (Request::segment(1)=='university' && Request::segment(2)=='create')?'active':''  @endphp"><a href="{{ action('UniversityController@create') }}"><i class="fa fa-circle-o"></i> Add University</a></li>
                            <li class="@php echo (Request::segment(1)=='locations')?'active':''  @endphp"><a href="{{ url('locations') }}"><i class="fa fa-circle-o"></i>Location</a></li>
                        </ul>
                    </li>
                @endcan

                @can('Feedback Manager')
                <li class="treeview @php echo (in_array(Request::segment(1), array("feedback")))?'active':'' @endphp">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Feedback</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="@php echo (Request::segment(1)=='feedback' && Request::segment(2)=='')?'active':''  @endphp"><a href="{{ url('feedback') }}"><i class="fa fa-circle-o"></i>Feedback List</a></li>
                    </ul>
                </li>
                @endcan

                @can('Settings Manager')
                    <li class="@php echo (Request::segment(1)=='system-settings' || Request::segment(1)=='system-settings' )?'active':'' @endphp">
                        <a href="{{ url('system-settings') }}">
                            <i class="fa fa-dashboard"></i> <span>Global Settings</span>
                        </a>
                    </li>
                @endcan




            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>


     @yield('content')


    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; {{date('Y')}} <a href="#">{{$global_setting->company_name}}</a>.</strong> All rights reserved.
    </footer>

</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- jQuery 3 -->
@yield('js')



</body>
</html>
