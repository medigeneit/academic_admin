<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\User;
use App\Models\AssignServices;
use App\Models\Service;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;


class AssignServicesController extends Controller
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
        // return view('assignservices.pdfView');
        $assignservices = AssignServices::select('assignservices.*','services.service_name as service','users.name')
                    ->join('services','services.id','assignservices.service')
                    ->join('users','users.id','assignservices.users_id')
                    ->orderBy('id', 'desc')
                    ->get();
        return view('assignservices.list',['assignservices'=>$assignservices]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::orderBy('id', 'DESC')->where('role_id', 5)->pluck('name', 'id');
        $services = Service::orderBy('id', 'DESC')->where('status', 'Active')->pluck('service_name', 'id');
        return view('assignservices.create',['users'=>$users,'services'=>$services]);
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


        $hostimg = AssignServices::create($allData);


        Session::flash('message', 'Record added successfully');
        return redirect()->action('AssignServicesController@index');

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
        return view('assignservices.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignservices = AssignServices::find($id);
        $users = User::orderBy('id', 'DESC')->where('role_id', 5)->pluck('name', 'id');
        $services = Service::orderBy('id', 'DESC')->where('status', 'Active')->pluck('service_name', 'id');
        return view('assignservices.edit',['users'=>$users,'assignservices'=>$assignservices,'services'=>$services]);
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
        $assignservices=AssignServices::find($id);
        $assignservices->title=$request->title;
        $assignservices->budget=$request->budget;
        $assignservices->service=$request->service;
        $assignservices->users_id=$request->users_id;
        $assignservices->description=$request->description;
        $assignservices->starting_date=$request->starting_date;
        $assignservices->ending_date=$request->ending_date;
        $assignservices->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('AssignServicesController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AssignServices::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('AssignServicesController@index');
    }
}
