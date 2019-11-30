<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\JobCircular;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;

class JobCircularController extends Controller
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
        $job_circular = JobCircular::orderBy('id','DESC')
            ->get();
        return view('job_circular.list',['job_circular'=>$job_circular]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country =  DB::table('locations')->where('parent_id',0)->pluck('title','id');
        return view('job_circular.create',(['country'=>$country]));
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
            JobCircular::create($allData);

            Session::flash('message', 'Record added successfully');

            return redirect()->action('JobCircularController@index');

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
        return view('job_circular.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job_circular=JobCircular::find($id);
        $country =  DB::table('locations')->where('parent_id',0)->pluck('title','id');
        return view('job_circular.edit',['job_circular'=>$job_circular,'country'=>$country]);
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
        $job_circular=JobCircular::find($id);
        $job_circular->title=$request->title;
        $job_circular->short_desc=$request->short_desc;
        $job_circular->link=$request->link;
        $job_circular->status=$request->status;

        $job_circular->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('JobCircularController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobCircular::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('JobCircularController@index');
    }
}
