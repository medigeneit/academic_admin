
    <div class="form-group">
        <label>Institution</label>
        @php $institutions->prepend('Select Institution','') @endphp
        {!! Form::select('institution_id', $institutions, old('institution_id'),['class'=>'form-control','required'=>'required']) !!}
    </div>

    <div class="form-group">
        <label>Subject</label>
        @php $subjects->prepend('Select Subject','') @endphp
        {!! Form::select('subject_id', $subjects, old('subject_id'),['class'=>'form-control','required'=>'required']) !!}
    </div>
