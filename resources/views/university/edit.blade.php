@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                University
                <small>Edit University</small>
            </h1>


        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::open(['action'=>['UniversityController@update',$university->id],'method'=>'PUT','files'=>true]) !!}
                <div class="col-xs-9">
                    <div class="box">
                        <!-- form start -->
                        <div class="box-body">

                            <div class="form-group">
                                <label>Countery</label>
                                @php $country->prepend('Select Country','')  @endphp
                                {!! Form::select('country_id', $country, $university->country_id,['class'=>'form-control','required'=>'required']) !!}<i></i>
                            </div>

                            <div class="state">
                                <div class="form-group">
                                    <label>State</label>
                                    @php $state->prepend('Select State','')  @endphp
                                    {!! Form::select('state_id', $state, $university->state_id,['class'=>'form-control','required'=>'required']) !!}<i></i>
                                </div>
                            </div>

                            <div class="city">
                                <div class="form-group">
                                    <label>city</label>
                                    @php $country->prepend('Select City','')  @endphp
                                    {!! Form::select('city_id', $city, $university->city_id,['class'=>'form-control','required'=>'required']) !!}<i></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">University Name</label>
                                <input type="text" name="name" value="{{ $university->name }}" placeholder="Enter University Name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Link</label>
                                <input type="text" name="link" value="{{ $university->link }}" placeholder="Enter Link" id="name" class="form-control" required>
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

    <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $("body").on( "change", "[name='country_id']", function() {
                var country_id = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: '/country-state',
                    dataType: 'HTML',
                    data: {country_id: country_id},
                    success: function( data ) {
                        $('.state').html(data);
                    }
                });
            })

            $("body").on( "change", "[name='state_id']", function() {
                var state_id = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: '/state-city',
                    dataType: 'HTML',
                    data: {state_id: state_id},
                    success: function( data ) {
                        $('.city').html(data);
                    }
                });
            })
        })
    </script>



@endsection