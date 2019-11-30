<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Contents extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='contents';

    protected $fillable = [
        'content_section_id','institution_category_id','institution_type_id','institution_id','class_id','department_id','level_year_id','options_id','tests_id','skill_development_category_id','material_type_id','subject_id','content_type_id','content_name','writer_id','user_id','file_content','file_location'
    ];


}
