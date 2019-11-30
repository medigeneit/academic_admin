<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\JobExamSubject;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;

class JobExamSubjectController extends Controller
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

        $job_exam_subject = JobExamSubject::orderBy('id','DESC')
            ->get();
        return view('job_exam_subject.list',['job_exam_subject'=>$job_exam_subject]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job_exam_subject.create');
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
            JobExamSubject::create($allData);

            Session::flash('message', 'Record added successfully');

            return redirect()->action('JobExamSubjectController@index');

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
        return view('job_exam_subject.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job_exam_subject=JobExamSubject::find($id);
        return view('job_exam_subject.edit',['job_exam_subject'=>$job_exam_subject]);
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
        $job_exam_subject=JobExamSubject::find($id);
        $job_exam_subject->title=$request->title;


        $job_exam_subject->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('JobExamSubjectController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobExamSubject::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('JobExamSubjectController@index');
    }
}
