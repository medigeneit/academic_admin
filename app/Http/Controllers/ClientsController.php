<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Service;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;

class ClientsController extends Controller
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
        $users = DB::table('users')
                    ->select('users.*', 'role.title')
                    ->join('role', 'role.id', '=', 'users.role_id')
                    ->where('role_id', 5)
                    ->where('user_status', 2)
                    ->orderBy('id', 'desc')
                    ->get();
        return view('clients.list',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = DB::table('role')->orderBy('id', 'DESC')->pluck('title', 'id');
        $designation = DB::table('designation')->orderBy('id', 'DESC')->pluck('title', 'id');
        $services = Service::orderBy('id', 'DESC')->where('status', 'Active')->pluck('service_name', 'id');
        return view('clients.create',['role'=>$role,'designation'=>$designation,'services'=>$services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (User::where('email',$request->email)->exists()){
            session()->flash('error','* User Already Exist');
            return redirect()->action('UsersController@create')->withInput();
        }

        else{


            $allData=$request->all();
            $allData['password']=bcrypt($request->password);
            $allData['role_id']=5;

            if ($request->file('profile_image')){
                $file=$request->file('profile_image');
                $fileName = md5(uniqid(rand(), true)).'.'.strtolower(pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION)) ;
                $destinationPath = 'images/' ;
                $file->move($destinationPath,$fileName);
                $allData['profile_image'] = $destinationPath.$fileName;
            }


            $services = implode (", ", $request->services);

            $allData['services'] = $services;

            $user=User::create($allData);


            Session::flash('message', 'Record added successfully');

            return redirect()->action('ClientsController@index');
        }
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
        return view('clients.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $role = DB::table('role')->orderBy('id', 'DESC')->pluck('title', 'id');
        $designation = DB::table('designation')->orderBy('id', 'DESC')->pluck('title', 'id');
        $services = Service::orderBy('id', 'DESC')->where('status', 'Active')->pluck('service_name', 'id');
        return view('clients.edit',['user'=>$user,'role'=>$role,'designation'=>$designation,'services'=>$services]);
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
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->user_status=$request->user_status;

        $services = implode (", ", $request->services);

        $user->services  = $services;

        if ($request->file('profile_image')){
            if (File::exists(public_path().'/'.$user->profile_image)){
                File::delete(public_path().'/'.$user->profile_image);
            }
            $file=$request->file('profile_image');
            $fileName = md5(uniqid(rand(), true)).'.'.strtolower(pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION)) ;
            $destinationPath = 'images/' ;
            $file->move($destinationPath,$fileName);
            $user->profile_image = $destinationPath.$fileName;
        }
        $user->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('ClientsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('ClientsController@index');
    }
}
