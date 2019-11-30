@extends('layouts.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Permission Add</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12 form-group">
                {!! Form::open(['method' => 'POST', 'route' => ['permissions.store']]) !!}




                                {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif





                {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                </div>

            </div>
        </section>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>

@endsection