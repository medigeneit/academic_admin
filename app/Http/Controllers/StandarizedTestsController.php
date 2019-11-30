<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\StandarizedTests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;

class StandarizedTestsController extends Controller
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

        $standarized_tests = StandarizedTests::orderBy('id','DESC')
            ->get();
        return view('standarized_tests.list',['iinstitution'=>$standarized_tests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('standarized_tests.create');
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





            StandarizedTests::create($allData);


            Session::flash('message', 'Record added successfully');

            return redirect()->action('StandarizedTestsController@index');

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
        return view('standarized_tests.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $standarized_tests=StandarizedTests::find($id);
        return view('standarized_tests.edit',['standarized_tests'=>$standarized_tests]);
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
        $standarized_tests=StandarizedTests::find($id);
        $standarized_tests->title=$request->title;


        $standarized_tests->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('StandarizedTestsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StandarizedTests::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('StandarizedTestsController@index');
    }
}
