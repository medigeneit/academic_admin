<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\University;
use App\Models\Locations;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;

class UniversityController extends Controller
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

        $university = University::orderBy('id','DESC')
            ->get();

        foreach($university as $row){
            $row->city = Locations::where('id',$row->city_id)->value('title');
            $row->state = Locations::where('id',$row->state_id)->value('title');
            $row->country = Locations::where('id',$row->country_id)->value('title');
        }

        return view('university.list',['iinstitution'=>$university]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country =  Locations::where('parent_id',0)->pluck('title','id');
        return view('university.create',(['country'=>$country]));
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
            University::create($allData);

            Session::flash('message', 'Record added successfully');

            return redirect()->action('UniversityController@index');

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
        return view('university.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $university = University::find($id);
        $country =  Locations::where('parent_id',0)->pluck('title','id');
        $state =  Locations::where('parent_id',$university->country_id)->pluck('title','id');
        $city =  Locations::where('parent_id',$university->state_id)->pluck('title','id');

        return view('university.edit',['university'=>$university,'country'=>$country,'state'=>$state,'city'=>$city]);
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
        $university=University::find($id);
        $university->country_id=$request->country_id;
        $university->state_id=$request->state_id;
        $university->city_id=$request->city_id;

        $university->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('UniversityController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        University::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('UniversityController@index');
    }
}
