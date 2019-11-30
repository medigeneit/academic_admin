@extends('layouts.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h1>Under Graduate Contents<small>Under Graduate Contents list</small></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <!-- /.box -->

                    <div class="box">
                        <div class="box-header">
                            <a href="{{ action('UnderGraduateController@create') }}" class="btn btn-primary">Add Under Graduate Contents</a>
                            @if(Session::has('message'))
                                <div class="allert-message alert-success-message pgray  alert-lg" role="alert">
                                    <p> {{ Session::get('message') }}</p>
                                </div>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ins. Category</th>
                                    <th>Institution</th>
                                    <th>Department</th>
                                    <th>Level/Year</th>
                                    <th>Subject</th>
                                    <th>Material Type</th>
                                    <th>Content Name</th>
                                    <th class="no-sort">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($under_graduate as $key=>$row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->institution_category}}</td>
                                    <td>{{$row->institution_name}}</td>
                                    <td>{{$row->department}}</td>
                                    <td>{{$row->class}}</td>
                                    <td>{{$row->subject}}</td>
                                    <td>{{$row->material_type}}</td>
                                    <td>{{$row->content_name}}</td>
                                    <td>
                                        <a href="{{ action('UnderGraduateController@edit',['id'=>$row->id]) }}"  class="btn btn-primary">Edit</a>
                                        {!! Form::open(array('route' => array('under-graduate.destroy', $row->id), 'method' => 'delete','style' => 'display:inline')) !!}
                                        <button onclick="return confirm('Are You Sure ?')" class='btn btn-danger' type="submit">Delete</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')

    <!-- DataTables -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
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
    <script>
        $(function () {
            $('#example1').DataTable()


            var table =$('#example2').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
                "columnDefs": [ {
                    "targets": 'no-sort',
                    "orderable": false,
                } ],
                "order": [],

            })






        })
    </script>



@endsection