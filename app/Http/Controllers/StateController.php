<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Locations;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;

class LocationsController extends Controller
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

        $locations = Locations::orderBy('id','DESC')
            ->get();

        foreach($locations as $row){
            $row->parent = Locations::where('id',$row->parent_id)->value('title');
        }

        return view('locations.list',['iinstitution'=>$locations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent =  Locations::pluck('title','id');
        return view('locations.create',(['parent'=>$parent]));
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
            Locations::create($allData);

            Session::flash('message', 'Record added successfully');

            return redirect()->action('LocationsController@index');

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
        return view('locations.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locations=Locations::find($id);
        $parent =  Locations::pluck('title','id');

        return view('locations.edit',['locations'=>$locations,'parent'=>$parent]);
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
        $locations=Locations::find($id);
        $locations->name=$request->name;


        $locations->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('LocationsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Locations::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('LocationsController@index');
    }
}
