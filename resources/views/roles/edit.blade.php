@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Role Edit</h1>
        </section>
        <section class="content">
            <div class="row">


            {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update', $role->id]]) !!}


                        <div class="col-xs-12 form-group">
                            {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>

                        <div class="col-xs-12 form-group">
                            {!! Form::label('permission', 'Permissions', ['class' => 'control-label']) !!}
                            {!! Form::select('permission[]', $permissions, old('permission') ? old('permission') : $role->permissions()->pluck('name', 'name'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('permission'))
                                <p class="help-block">
                                    {{ $errors->first('permission') }}
                                </p>
                            @endif
                        </div>

                <div class="col-xs-12 form-group">


            {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
                </div>
            {!! Form::close() !!}

        </div>
       </section>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $('.select2').select2();
        })
    </script>

@endsection

