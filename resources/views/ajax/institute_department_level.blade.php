
    <div class="form-group">
        <label>Select Department</label>
        @php $departments->prepend('Select Department','') @endphp
        {!! Form::select('department_id', $departments, old('department_id'),['class'=>'form-control','required'=>'required']) !!}
    </div>

    <div class="form-group">
        <label>Select Class</label>
        @php $classes->prepend('Select Class','') @endphp
        {!! Form::select('class_id', $classes, old('class_id'),['class'=>'form-control','required'=>'required']) !!}
    </div>
