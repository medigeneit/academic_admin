<?php

use Carbon\Carbon;

                   /*attendace condition by bg color*/
function bg_color($starting_time,$check_in_time,$attend)
    {

        if($attend=="No"){
            return 'bg-red';
        }else{
            if( strtotime($starting_time)>=strtotime($check_in_time) )
            {
                return 'bg-green';
            }
            else
            {
                return 'bg-orange';
            }
        }

    }

       /*Hosting and domain  condition by bg color*/

function bg_color_web_account($expire_date,$status)
{

    /*$todaydate = Carbon::now();
    $todaydatebeforemonth = Carbon::now()->addMonth();
    $todaydatebeforefifteen = Carbon::now()->addDays(15);

    $todaydate = date('Y-m-d',strtotime($todaydate));
    $todaydatebeforemonth = date('Y-m-d',strtotime($todaydatebeforemonth));
    $todaydatebeforefifteen = date('Y-m-d',strtotime($todaydatebeforefifteen));
    $expire_date = date('Y-m-d',strtotime($expire_date));*/

    $now = Carbon::now();
    $end = Carbon::parse($expire_date);
    $length =  $end->diffInDays($now);

    if($status=='InActive'){
        return 'bg-gray';
    }
    elseif (($length < 15) && ($length > 0) && $now<$end )
    {
        return 'bg-orange';
    }
    elseif (($length < 30) && ($length > 15) && $now<$end)
    {
        return 'bg-yellow';
    }
    elseif( $now>$end )
        {
            return 'bg-red';
        }

}

function bg_color_utility($date,$status){

    $now = Carbon::now();
    $end = Carbon::parse($date);
    $days =  $end->diffInDays($now);
    if($status=='Yes'){
        return '';
    }elseif($now>$end ) {
        return 'bg-red';
    }elseif($days<3 and $days>=0){
        return 'bg-orange';
    }



}
                /*encription and decription*/

function my_simple_crypt( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = 'my_simple_secret_key';
    $secret_iv = 'my_simple_secret_iv';

    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }

    return rtrim($output,'=');
}


function month_convert($month){
    return ($month=='01')?'Junaury':(($month=='02')?'Feabruary':(($month=='03')?'March':(($month=='04')?'April':(($month=='05')?'May':(($month=='06')?'June':(($month=='07')?'July':(($month=='08')?'August':(($month=='09')?'September':(($month=='10')?'Octobor':(($month=='11')?'November':'December'))))))))));
}

function settings($key, $settings) {
    foreach ($settings as  $val) {
        if ($key == $val->key) {
            return $val->value;
        }
    }
    return null;
}

