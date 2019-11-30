<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Contents;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class HigherStudyController extends Controller
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

        $higher_study = Contents::select('contents.id','contents.content_name','standarized_tests.title as standarized_tests','material_type.title as material_type')
            ->join('standarized_tests','standarized_tests.id','contents.tests_id')
            ->join('material_type','material_type.id','contents.material_type_id')
            ->orderBy('id','DESC')
            ->where('content_section_id',11)
            ->get();
        return view('higher_study.list',['higher_study'=>$higher_study]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $standarized_tests = DB::table('standarized_tests')->orderBy('id', 'DESC')->pluck('title', 'id');
        $material_type = DB::table('higher_job_material_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('higher_study.create',['material_type'=>$material_type,'content_type'=>$content_type,'standarized_tests'=>$standarized_tests]);
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
            $allData['content_section_id'] = 11;


            Contents::create($allData);
            Session::flash('message', 'Record added successfully');
            return redirect()->action('HigherStudyController@index');

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
        return view('higher_study.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $higher_study=Contents::find($id);
        $standarized_tests = DB::table('standarized_tests')->orderBy('id', 'DESC')->pluck('title', 'id');
        $material_type = DB::table('higher_job_material_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('higher_study.edit',['higher_study'=>$higher_study,'material_type'=>$material_type,'content_type'=>$content_type,'standarized_tests'=>$standarized_tests]);
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
        $higher_study=Contents::find($id);
        $higher_study->tests_id=$request->tests_id;
        $higher_study->material_type_id=$request->material_type_id;
        $higher_study->content_type_id=$request->content_type_id;
        $higher_study->content_name=$request->content_name;
        $higher_study->file_content=$request->file_content;


        $higher_study->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('HigherStudyController@index');
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
        return redirect()->action('HigherStudyController@index');
    }
}
