
    <div class="form-group">
        <label>Select Department</label>
        {!! Form::select('department_id[]', $departments, old('department_id'),['class'=>'form-control department2','multiple'=>'multiple','required'=>'required']) !!}
    </div>

    <div class="form-group">
        <label>Select Class</label>
        @php $classes->prepend('Select Class','') @endphp
        {!! Form::select('class_id', $classes, old('class_id'),['class'=>'form-control','required'=>'required']) !!}
    </div>

    <script type="text/javascript">
        $('.department2').select2({
            placeholder:'Select Departments',
        });
    </script>
