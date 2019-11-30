<div class="form-group">
    <label>Class</label>
    @php $classes->prepend('Select Class','') @endphp
    {!! Form::select('class_id', $classes, old('class_id'),['class'=>'form-control','required'=>'required']) !!}
</div>
<div class="form-group">
    <label>Subject</label>
    @php $subject->prepend('Select Subject','') @endphp
    {!! Form::select('subject_id', $subject, old('subject_id'),['class'=>'form-control','required'=>'required']) !!}
</div>

<div class="form-group">
    <label>Institution</label>
    @php $institution->prepend('Select Institution','') @endphp
    {!! Form::select('institution_id', $institution, old('institution_id'),['class'=>'form-control']) !!}
</div>


