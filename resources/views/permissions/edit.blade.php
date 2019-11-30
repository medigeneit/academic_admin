@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Permission Edit</h1>
        </section>
        <section class="content">
            <div class="row">


                <div class="col-xs-12 form-group">
                {!! Form::model($permission, ['method' => 'PUT', 'route' => ['permissions.update', $permission->id]]) !!}




                                {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                                {!! Form::text('name', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif




                {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
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
