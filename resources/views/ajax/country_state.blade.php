<div class="form-group">
    <label>State</label>
    @php $country_state->prepend('Select Stat','') @endphp
    {!! Form::select('state_id', $country_state, old('state_id'),['class'=>'form-control','required'=>'required']) !!}
</div>