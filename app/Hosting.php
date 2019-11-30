<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Hosting extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='hostings';

    protected $fillable = [
        'domain_name','package','users_id','payment_status','register_at','status','expire_at'
    ];


}
