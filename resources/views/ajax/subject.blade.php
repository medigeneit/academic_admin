<div class="form-group">
    <label>Subject</label>
    @php $subject->prepend('Select Subject','') @endphp
    {!! Form::select('subject_id', $subject, old('subject_id'),['class'=>'form-control','required'=>'required']) !!}
</div>