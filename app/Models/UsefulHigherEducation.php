<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class UsefulHigherEducation extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='useful_higher_education';

    protected $fillable = [
        'title','short_desc','link','country_id'
    ];


}
