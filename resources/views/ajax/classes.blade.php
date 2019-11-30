<div class="institutions">
    <div class="form-group">
        <label>Select Classes</label>
        {!! Form::select('class_id[]', $classes, old('class_id'),['class'=>'select2 form-control','multiple'=>'multiple','required'=>'required']) !!}
    </div>
</div>

<script>
    $(function () {
        $('.select2').select2({
            placeholder:'Select Classes',

        });
    })
</script>