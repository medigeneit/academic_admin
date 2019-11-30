<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\UsefulHigherEducation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;

class UsefulHigherEducationController extends Controller
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

        $useful_higher_education = UsefulHigherEducation::select('useful_higher_education.*','locations.title as country')->join('locations','locations.id','useful_higher_education.country_id')->orderBy('id','DESC')
            ->get();
        return view('useful_higher_education.list',['useful_higher_education'=>$useful_higher_education]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country =  DB::table('locations')->where('parent_id',0)->pluck('title','id');
        return view('useful_higher_education.create',(['country'=>$country]));
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
            UsefulHigherEducation::create($allData);

            Session::flash('message', 'Record added successfully');

            return redirect()->action('UsefulHigherEducationController@index');

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
        return view('useful_higher_education.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $useful_higher_education=UsefulHigherEducation::find($id);
        $country =  DB::table('locations')->where('parent_id',0)->pluck('title','id');
        return view('useful_higher_education.edit',['useful_higher_education'=>$useful_higher_education,'country'=>$country]);
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
        $useful_higher_education=UsefulHigherEducation::find($id);
        $useful_higher_education->title=$request->title;
        $useful_higher_education->short_desc=$request->short_desc;
        $useful_higher_education->link=$request->link;
        $useful_higher_education->country_id=$request->country_id;

        $useful_higher_education->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('UsefulHigherEducationController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UsefulHigherEducation::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('UsefulHigherEducationController@index');
    }
}
