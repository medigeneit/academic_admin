<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Webaccount;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use App\Models\Bazars;
use App\Models\Utilities;

class AjaxController extends Controller
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


    public function class_subject(Request $request)
    {
        $class_id = $request->class_id;
        $institution_type_id = $request->institution_type_id;

        $subjects = DB::table('subject')
            ->join('subject_has_class','subject_has_class.subject_id','subject.id')
            ->join('subject_has_type','subject_has_type.subject_id','subject.id')
            ->where('type_id',$institution_type_id)
            ->where('class_id',$class_id)
            ->pluck('title','id');

        echo view('ajax.subject',(['subject'=>$subjects]));
    }

    public function country_state(Request $request)
    {
        $country_id = $request->country_id;

        $country_state = DB::table('locations')
            ->where('parent_id',$country_id)
            ->pluck('title','id');
        echo view('ajax.country_state',(['country_state'=>$country_state]));
    }

    public function state_city(Request $request)
    {
        $state_id = $request->state_id;

        $state_city = DB::table('locations')
            ->where('parent_id',$state_id)
            ->pluck('title','id');

        echo view('ajax.state_city',(['state_city'=>$state_city]));
    }

                    /* job exam to subject*/
    public function job_exam_subject(Request $request)
    {
        $job_exam_id = $request->job_exam_id;

        $job_exam_subject = DB::table('job_exam_subject')
            ->join('job_exam_has_subject','job_exam_has_subject.job_exam_subject_id','job_exam_subject.id')
            ->where('job_exam_id',$job_exam_id)
            ->pluck('title','id');

        echo view('ajax.job_exam_subject',(['job_exam_subject'=>$job_exam_subject]));
    }








    public function content_type_content(Request $request)
    {
        $content_type_id = $request->content_type_id;
        echo view('ajax.content_type_content',(['content_type_id'=>$content_type_id]));
    }




    public function institute_type_class(Request $request)
    {
        $institution_type_id = $request->institution_type_id;
        $classes = DB::table('classes')->where('institution_type_id',$institution_type_id)->pluck('title','id');
        echo view('ajax.classes',(['classes'=>$classes]));
    }


    public function institute_category_institute(Request $request)
    {
        $institution_category_id = $request->institution_category_id;
        $institutions = DB::table('institution')->where('institution_category_id',$institution_category_id)->pluck('name','id');

        echo view('ajax.institutions',(['institutions'=>$institutions]));
    }

    public function institute_category_institute_subject(Request $request)
    {
        $institution_category_id = $request->institution_category_id;
        $institution_type_id = $request->institution_type_id;
        $institutions = DB::table('institution')
            ->join('institution_has_type','institution_has_type.institution_id','institution.id')
            ->where('institution_has_type.institution_type_id',$institution_type_id)
            ->where('institution_category_id',$institution_category_id)->pluck('name','id');

        $subjects = DB::table('subject')
            ->join('subject_has_type','subject_has_type.subject_id','subject.id')
            ->where('subject_has_type.type_id',$institution_type_id)
            ->where('institution_category_id',$institution_category_id)->pluck('title','id');

        echo view('ajax.institute_category_institute_subject',(['institutions'=>$institutions,'subjects'=>$subjects]));
    }

    public function institute_department_level(Request $request)
    {
        $institution_id = $request->institution_id;

        $departments = DB::table('department')
            ->join('institution_has_department','institution_has_department.department_id','department.id')
            ->where('institution_id',$institution_id)
            ->pluck('title','id');

        $classes = DB::table('classes')
            ->join('institution_has_class','institution_has_class.class_id','classes.id')
            ->where('institution_id',$institution_id)
            ->pluck('title','id');

        echo view('ajax.institute_department_level',(['departments'=>$departments,'classes'=>$classes]));
    }







    public function institute_subject(Request $request)
    {
        $institution_category_id = $request->institution_id;

        echo $institution_category_id;exit;
        $subject = DB::table('subject')->where('institution_category_id',$institution_category_id)->pluck('title','id');

        echo view('ajax.subject',(['subject'=>$subject]));
    }



}
