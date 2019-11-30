@if($content_type_id ==1 || $content_type_id==3 || $content_type_id==5 )
    <div class="form-group">
        <a target="_blank" id="holder"><p class="image_name"></p></a>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" style="width: 100%" class="lfm btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose File
                </a>
            </span>
            <input id="thumbnail" class="form-control" type="hidden" required name="file_location">
        </div>
    </div>
@elseif($content_type_id ==2)
    <div class="form-group">
        <label for="name">Youtube Link</label>
        <input type="text" name="file_location" value="" placeholder="Enter Youtube Link" id="name" class="form-control" required>
    </div>
@else

    <div class="form-group">
        <label for="exampleInputEmail1">Detail</label>
        <textarea name="file_content" cols="40" rows="12"  data-error-container="#editor1_error"  class="editor form-control" ></textarea>
    </div>

@endif

