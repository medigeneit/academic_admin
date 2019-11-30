<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Hosting;
use Mail;

class MailsController extends Controller{



    public function newHostingToUser()
    {

        Mail::send('mail.test', [], function($message){

            $message->to( 'rabiul0420@gmail.com', 'receiver nmame' )
                ->from('rabiul0420@gmail.com', 'from name')

                ->subject('email subject');

        });

    }

    public function template($id,$contents) {

        $asd = explode('[',$contents);
        $text = '';
        for($i=0;$i<count($asd);$i++){
            if($i==0){
                $text .= $asd[$i];
            }else{
                $fc =  explode(']',$asd[$i]);

                $text .= $this->the_shortcode($fc[0],$id).' '.$fc[1];
            }
        }

        return $text;
    }

    function the_shortcode($field,$id){
        $hosting = Hosting::select('hostings.*','users.name as client_name')
            ->join('users','users.id','hostings.users_id')
            ->find($id);
        return $hosting->$field;
    }

}