<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Message extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='messages';

    protected $fillable = [
        'sender_id','receiver_id','admin_show','admin_approved','is_read','message','ticket_id'
    ];


}
