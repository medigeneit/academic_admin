<div class="institutions">
    <div class="form-group">
        <label>Institution</label>
        @php $institutions->prepend('Select Institution','') @endphp
        {!! Form::select('institution_id', $institutions, old('institution_id'),['class'=>'form-control','required'=>'required']) !!}
    </div>
</div>