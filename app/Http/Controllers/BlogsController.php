<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Blogs;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class BlogsController extends Controller
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

        $blogs = Blogs::orderBy('blogs.id','DESC')->get();

        return view('blogs.list',['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
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


            Blogs::create($allData);
            Session::flash('message', 'Record added successfully');
            return redirect()->action('BlogsController@index');

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
        return view('blogs.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs=Blogs::find($id);


        return view('blogs.edit',['blogs'=>$blogs]);
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
        $blogs=Blogs::find($id);


        $blogs->title=$request->title;
        $blogs->short_desc=$request->short_desc;
        $blogs->type=$request->type;
        $blogs->detail=$request->detail;
        $blogs->status=$request->status;


        $blogs->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('BlogsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blogs::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('BlogsController@index');
    }
}
