@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Permissions</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <a href="{{ action('PermissionsController@create') }}" class="btn btn-primary">Add Permissions</a>
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
                                    <th>@lang('global.permissions.fields.name')</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if (count($permissions) > 0)
                                    @foreach ($permissions as $key=>$permission)
                                        <tr data-entry-id="{{ $permission->id }}">
                                            <td>{{$key+1}}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>
                                                <a href="{{ route('permissions.edit',[$permission->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                                {!! Form::open(array(
                                                    'style' => 'display: inline-block;',
                                                    'method' => 'DELETE',
                                                    'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                    'route' => ['permissions.destroy', $permission->id])) !!}
                                                {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                {!! Form::close() !!}
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">@lang('global.app_no_entries_in_table')</td>
                                    </tr>
                                @endif
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

            var i = 0;
            $('#example2 tfoot th:not(":last")').each( function () {
                var size = (i==0)?3:((i==1)?20:(i==2)?28:((i==3)?16:16));
                var title = $(this).text();
                $(this).html( '<input size="'+size+'" class="form-control" type="text" placeholder="'+title+'" />' );
                i++;
            } );

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
                "initComplete": function () {
                    var i = 0;
                    this.api().columns().every( function () {
                        if (i == 3 || i == 4){
                            var column = this;
                            var select = $('<select><option value="">Select</option></select>')
                                .appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
                                    column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });
                            column.data().unique().sort().each(function (d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>')
                            });
                        }
                        i++;
                    } );
                }
            });

            // Apply the search
            table.columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );






        })
    </script>



@endsection

















