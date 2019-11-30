<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Contents;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class JobController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $job = Contents::select('contents.id','contents.content_name','job_exam.title as job_exam','job_exam_subject.title as job_exam_subject','higher_job_material_type.title as material_type')
            ->join('job_exam','job_exam.id','contents.tests_id')
            ->join('job_exam_subject','job_exam_subject.id','contents.subject_id')
            ->join('higher_job_material_type','higher_job_material_type.id','contents.material_type_id')
            ->orderBy('id','DESC')
            ->where('content_section_id',12)
            ->get();
        return view('job.list',['job'=>$job]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job_exam = DB::table('job_exam')->orderBy('id', 'DESC')->pluck('title', 'id');
        $material_type = DB::table('higher_job_material_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('job.create',['material_type'=>$material_type,'content_type'=>$content_type,'job_exam'=>$job_exam]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $allData=$request->all();
            $allData['user_id'] = Auth::id();
            $allData['content_section_id'] = 12;

            Contents::create($allData);
            Session::flash('message', 'Record added successfully');
            return redirect()->action('JobController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user=User::select('users.*','role.title as role_title','designation.title as designation_title')
                   ->join('role', 'role.id', '=', 'users.role_id')
                    ->join('designation', 'designation.id', '=', 'users.designation_id')
                   ->find($id);
        return view('job.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job=Contents::find($id);

        $job_exam = DB::table('job_exam')->orderBy('id', 'DESC')->pluck('title', 'id');
        $job_exam_has_subject = DB::table('job_exam_subject')->join('job_exam_has_subject','job_exam_has_subject.job_exam_subject_id','job_exam_subject.id')->orderBy('id', 'DESC')->pluck('title', 'id');
        $material_type = DB::table('higher_job_material_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('job.edit',['job'=>$job,'material_type'=>$material_type,'content_type'=>$content_type,'job_exam'=>$job_exam,'job_exam_has_subject'=>$job_exam_has_subject]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job=Contents::find($id);
        $job->tests_id=$request->tests_id;
        $job->subject_id=$request->subject_id;
        $job->material_type_id=$request->material_type_id;
        $job->content_type_id=$request->content_type_id;
        $job->content_name=$request->content_name;
        $job->file_content=$request->file_content;

        $job->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('JobController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contents::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('JobController@index');
    }
}
