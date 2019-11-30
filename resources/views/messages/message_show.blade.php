
@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1></h1>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="accordion">
                            <span class="glyphicon glyphicon-comment"></span> Conversion with {{ (Auth::user()->role_id==5)?$user->designation:$user->name}}
                            <div class="btn-group pull-right">
                                <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                </a>
                            </div>
                        </div>
                        <div class="panel-collapse collapse in" id="collapseOne">
                            <div id="scroll_id" class="panel-body">
                                <ul class="chat">
                                    @foreach($message_show as $message)
                                        @if(Auth::user()->role_id==1 || Auth::id()==$message->sender_id || $message->admin_approved=='Yes')
                                            @php $file = explode('/',$message->message); $file = end($file); @endphp
                                            @if($message->role_id==5)
                                            <li class="left clearfix">
                                                <span class="chat-img pull-left">
                                                    <img width="40" height="40"  src="@if($message->profile_image != ''){{ asset($message->profile_image) }} @else{{ 'http://placehold.it/200x200' }} @endif" alt="User Avatar" class="img-circle" />
                                                </span>
                                                <div class="chat-body clearfix">
                                                    <div class="header">
                                                        <strong class="primary-font">{{$message->name}}</strong> <small class="pull-right text-muted">
                                                            <span class="glyphicon glyphicon-time"></span>@php echo ($message->created_at)?date('d M Y h:i a',strtotime($message->created_at)):'' @endphp</small>
                                                    </div>
                                                    <p>
                                                        @if($message->type=='Text')
                                                            {!! $message->message !!}
                                                        @else
                                                            <a href="{{url('file-download/'.my_simple_crypt($message->message,'e'))}}">{{$file}}</a>
                                                        @endif
                                                    </p>
                                                </div>
                                            </li>
                                            @else
                                            <li class="right clearfix">
                                                <span class="chat-img pull-right">
                                                     <img width="40" height="40"  src="@if($message->profile_image != ''){{ asset($message->profile_image) }} @else{{ 'http://placehold.it/200x200' }} @endif" alt="User Avatar" class="img-circle" />
                                                </span>
                                                <div class="chat-body clearfix">
                                                    <div class="header">
                                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>@php echo ($message->created_at)?date('d M Y h:i a',strtotime($message->created_at)):'' @endphp</small>
                                                        <strong class="pull-right primary-font">{{ (Auth::user()->role_id==5)?$message->designation:$message->name}}</strong>
                                                    </div>
                                                    <p>
                                                        @if($message->type=='Text')
                                                            {!! $message->message !!}
                                                        @else
                                                            <a href="{{url('file-download/'.my_simple_crypt($message->message,'e'))}}">{{$file}}</a>
                                                        @endif
                                                    </p>
                                                </div>
                                            </li>
                                            @endif
                                        @endif
                                    @endforeach

                                </ul>
                            </div>
                            @if(Auth::user()->role_id==5 || Auth::user()->role_id==6)
                            <div class="panel-footer">
                                <div class="input-group">
                                    <input type="hidden" name="ticket_id" value="{{Request::segment(2)}}">
                                    <input name="message" id="btn-input" type="text" class="form-control  input-sm" placeholder="Type your message here..." />
                                    <label class="message-file" for="upload-photo"><i class="fa fa-paperclip"></i></label>
                                    <input type="file" name="attach" id="upload-photo">
                                    <span class="input-group-btn">
                                        <button class="btn btn-warning btn-sm btn-send-message" id="btn-chat">Send</button>
                                    </span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if(Auth::user()->role_id==1)
                <div class="col-md-4">
                    {!! Form::open(['url'=>'message-assign','files'=>true]) !!}
                        <div class="form-group">
                            <input type="hidden" name="ticket_id" value="{{Request::segment(2)}}">
                            <input type="hidden" name="update" value="{{$ticket->assign_id}}">
                            <label>Assign To</label>
                            @php  $employee->prepend('Select Client', ''); @endphp
                            {!! Form::select('receiver_id', $employee, $ticket->assign_id,['class'=>'form-control select2','required'=>'required']) !!}
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label><input name="is_approved" {{($ticket->is_approved=='Yes')?'checked':''}} value="Yes"  type="checkbox">Approve</label>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>                             <button type="button" class="btn btn-default" onclick="window.history.back();">Back</button>
                        </div>
                    {!! Form::close() !!}
                </div>
                @endif
            </div>
        </div>


    </div>
@endsection

@section('js')

    <!-- Morris.js charts -->
    <script src="{{ asset('js/raphael.min.js') }}"></script>
    <script src="{{ asset('js/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('js/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('js/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('js/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('js/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('js/demo.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('js/select2.full.min.js') }}"></script>

    <!-- bootstrap time picker -->
    <script src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>

    <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
    <script>
        $(function () {

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false,
            })

            $('.select2').select2({
                tags: true,
            });

                            /*coversation scroll position bottom*/
            var element = document.getElementById("scroll_id");
            element.scrollTop = element.scrollHeight;
                           /*message submit*/
            var ticket_id = '@php echo Request::segment(2) @endphp';
            $('.btn-send-message').click(function(){
                message_submit();
            });

            $('[name="message"]').keypress(function(e) {
                if(e.which == 13) {
                    message_submit();
                }
            });


            function message_submit() {
                var message = $('[name="message"]').val();
                var message_length = message.length;
                if(message_length>0){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: '/message-submit',
                        data: {ticket_id:ticket_id,message: message},
                        success: function( msg ) {
                            $('.chat').html(msg);
                            $('[name="message"]').val('');
                            var element = document.getElementById("scroll_id");
                            element.scrollTop = element.scrollHeight;
                        }
                    });
                }
                else{
                    alert('must contain at least 1 character');
                }
            }
                                    /*conversation*/
            setInterval(function() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: '/conversation',
                    data: {ticket_id: ticket_id},
                    success: function( msg ) {
                        $('.chat').html(msg);
                        var element = document.getElementById("scroll_id");
                        element.scrollTop = element.scrollHeight;
                    }
                });
            }, 10000); //10 seconds

                             /*messagr file submit*/
            $(document).on('change', 'input[type="file"]', function(e) {
                $(this).parent().prepend('<div class="wait"></div>');
                var file = this.files[0];
                var form = new FormData();
                form.append('image', file);
                form.append('ticket_id', ticket_id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url : "/message-file-submit",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data : form,

                    success: function(response){
                       if(response=='error'){
                           alert('This file format not allowed, Please choose another');
                       }else{
                           $('.chat').html(response);
                       }

                        $(".wait").remove();
                    }
                });
            });

        })
    </script>




@endsection