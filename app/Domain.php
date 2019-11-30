<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Domain extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='domains';

    protected $fillable = [
        'domain_name','users_id','payment_status','register_at','status','expire_at'
    ];


}
