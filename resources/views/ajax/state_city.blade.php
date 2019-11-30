<div class="form-group">
    <label>City</label>
    @php $state_city->prepend('Select Subject','') @endphp
    {!! Form::select('city_id', $state_city, old('city_id'),['class'=>'form-control','required'=>'required']) !!}
</div>