<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\JobExam;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;

class JobExamController extends Controller
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

        $job_exam = JobExam::orderBy('id','DESC')
            ->get();
        foreach($job_exam as $row){
            $row->subjects  = DB::table('job_exam_subject')
                ->join('job_exam_has_subject','job_exam_has_subject.job_exam_subject_id','job_exam_subject.id')
                ->where('job_exam_id',$row->id)->get();
        }

        return view('job_exam.list',['job_exam'=>$job_exam]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job_exam_subject = DB::table('job_exam_subject')->pluck('title','id');
        return view('job_exam.create',['job_exam_subject'=>$job_exam_subject]);
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

            $job_exam = JobExam::create($allData);

            if($request->job_exam_subject_id){
                foreach($request->job_exam_subject_id as $k=>$value){
                    DB::table('job_exam_has_subject')->insert(['job_exam_subject_id'=>$value,'job_exam_id'=>$job_exam->id]);
                }
            }


            Session::flash('message', 'Record added successfully');

            return redirect()->action('JobExamController@index');

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
        return view('job_exam.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job_exam=JobExam::find($id);
        $job_exam_subject = DB::table('job_exam_subject')->pluck('title','id');
        $job_exam_has_subject = DB::table('job_exam_has_subject')->where('job_exam_id',$id)->pluck('job_exam_subject_id','job_exam_subject_id');
        return view('job_exam.edit',['job_exam'=>$job_exam,'job_exam_subject'=>$job_exam_subject,'job_exam_has_subject'=>$job_exam_has_subject]);
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
        $job_exam=JobExam::find($id);
        $job_exam->title=$request->title;

        $job_exam->push();

        if($request->job_exam_subject_id){
            DB::table('job_exam_has_subject')->where('job_exam_id',$job_exam->id)->delete();
            foreach($request->job_exam_subject_id as $k=>$value){
                DB::table('job_exam_has_subject')->insert(['job_exam_subject_id'=>$value,'job_exam_id'=>$job_exam->id]);
            }
        }


        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('JobExamController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobExam::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('JobExamController@index');
    }
}
