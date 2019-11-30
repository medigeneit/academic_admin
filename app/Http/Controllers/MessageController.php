<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class MessageController extends Controller
{
    //

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function message_admin()
    {

        return view('messages.conversions');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function message_show($id)
    {

        $ticket = DB::table('tickets')->where('id',$id)->first();

        $message_show = DB::table('messages')
                            ->select('messages.*','users.name','users.role_id','users.name','users.profile_image','users.designation')
                            ->join('users','users.id','messages.sender_id')
                            ->where('ticket_id', $id)
                            ->OrderBy('id','desc')
                            ->take(10)->get();

                                   /*update notification*/
       if(Auth::user()->role_id==1){
           DB::table('messages')
               ->where('ticket_id',$id)
               ->update(['admin_show'=>'Yes']);
       }else{
           DB::table('messages')
               ->where('ticket_id',$id)
               ->where('receiver_id',Auth::user()->id)
               ->update(['is_read'=>'Yes']);
       }



        if(Auth::user()->role_id==5){
            $receiver_id = $ticket->assign_id;
        }else{
            $receiver_id = $ticket->creator_id;
        }
        $user = User::where('id',$receiver_id)->first();
        $employee = User::where('role_id',6)->pluck('name', 'id');

        return view('messages.message_show',(['message_show'=>$message_show->reverse(),'employee'=>$employee,'user'=>$user,'ticket'=>$ticket]));
    }



    /*admin message assign and approval update*/

    public function message_assign(Request $request)
    {
        if(!$request->update){
            DB::table('messages')
                ->where('ticket_id', $request->ticket_id)
                ->update(['receiver_id' =>$request->receiver_id,'admin_approved'=>'Yes']);
        }else{
            DB::table('messages')
                ->where('ticket_id', $request->ticket_id)
                ->update(['admin_approved'=>'Yes']);
        }

        DB::table('tickets')
            ->where('id', $request->ticket_id)
            ->update(['assign_id' =>$request->receiver_id,'is_approved' =>($request->is_approved)?'Yes':'No']);
        return redirect('message-show/'.$request->ticket_id);

    }

    public function file_download($id,$file)
    {
        $message = DB::table('messages')->where('id',$id)->first();

        header("Content-disposition: attachment; filename=$file");
        header("Content-type: application/pdf");
        readfile("$message->message");
    }








}
