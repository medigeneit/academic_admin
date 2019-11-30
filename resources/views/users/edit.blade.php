@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>User<small>Edit User</small></h1>
        </section>
        <section class="content">
            <div class="row">
                {!! Form::open(['action'=>['UsersController@update',$user->id],'method'=>'PUT','files'=>true]) !!}
                <div class="col-xs-9">
                    <div class="box">
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" placeholder="Enter User Name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" placeholder="Enter Email Address" id="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control"  value="" name="password">
                            </div>

                            <div class="form-group">
                                <label for="name">Phone</label>
                                <input type="text" name="phone" value="{{ $user->phone }}" placeholder="Enter User Name" id="phone" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>User Status</label>
                                {!! Form::select('status', ['Active' => 'Active','InActive' => 'InActive', 'Pending' => 'Pending'], $user->status,['class'=>'form-control']) !!}
                            </div>



                            <div class="form-group">
                                <label>Role</label>
                                {!! Form::label('roles', 'Roles*', ['class' => 'control-label']) !!}
                                {!! Form::select('roles[]', $roles, old('roles') ? old('roles') : $user->roles()->pluck('name', 'name'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                            </div>


                        </div>

                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{url('users')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="form-group">
                        <img id="holder_image" src="{{asset($user->image)}}" style="margin-top:15px;margin-bottom:5px;max-width:100%;">
                        @php $file_array = explode('/',$user->image); @endphp
                        <p class="image_name">{{end($file_array)}}</p>
                        <div class="input-group">
                                                      <span class="input-group-btn">
                                                        <a  data-input="thumbnail_image" data-preview="holder_image" style="width: 100%" class="lfm btn btn-primary">
                                                          <i class="fa fa-picture-o"></i> {{($user->image)?'Change profile Image':'Choose profile Image'}}
                                                        </a>
                                                      </span>
                            <input id="thumbnail_image" class="form-control" type="hidden" value="{{$user->image}}" name="image">
                        </div>
                    </div>


                </div>
                {!! Form::close() !!}
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $('.select2').select2();


            $.fn.filemanager = function(type, options) {
                type = type || 'file';

                this.on('click', function(e) {
                    var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                    localStorage.setItem('target_input', $(this).data('input'));
                    localStorage.setItem('target_preview', $(this).data('preview'));
                    window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
                    window.SetUrl = function (url, file_path) {
                        //set the value of the desired input to image url
                        var target_input = $('#' + localStorage.getItem('target_input'));
                        target_input.val(file_path).trigger('change');

                        // view file name
                        file_path_arr = file_path.split('/');
                        file_name = file_path_arr[file_path_arr.length-1];
                        $('.image_name').text(file_name).trigger('change');

                        //set or change the preview image src
                        var target_preview = $('#' + localStorage.getItem('target_preview'));
                        target_preview.attr('src', url).trigger('change');
                    };
                    return false;
                });
            }

            $('.lfm').filemanager('image');
        })
    </script>

@endsection