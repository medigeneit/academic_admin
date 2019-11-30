<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Contents;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class ContentsController extends Controller
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

        $contents = Contents::orderBy('id','DESC')
            ->get();
        return view('contents.list',['contents'=>$contents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutions = DB::table('institution')->orderBy('id', 'DESC')->pluck('name', 'id');
        $content_section = DB::table('content_section')->orderBy('id', 'DESC')->pluck('title', 'id');
        $classes = DB::table('classes')->orderBy('id', 'DESC')->pluck('title', 'id');
        $subject = DB::table('subject')->orderBy('id', 'DESC')->pluck('title', 'id');
        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('contents.create',['institutions'=>$institutions,'content_section'=>$content_section,'classes'=>$classes,'subject'=>$subject,'content_type'=>$content_type]);
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

            if ($request->file('image')){
                $file=$request->file('image');
                $fileName = md5(uniqid(rand(), true)).'.'.strtolower(pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION)) ;
                $destinationPath = 'images/' ;
                $file->move($destinationPath,$fileName);
                $allData['image'] = $destinationPath.$fileName;
            }

            Contents::create($allData);
            Session::flash('message', 'Record added successfully');
            return redirect()->action('ContentsController@index');

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
        return view('contents.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contents=Contents::find($id);

        $institutions = DB::table('institution')->orderBy('id', 'DESC')->pluck('name', 'id');
        $content_section = DB::table('content_section')->orderBy('id', 'DESC')->pluck('title', 'id');
        $classes = DB::table('classes')->orderBy('id', 'DESC')->pluck('title', 'id');
        $subject = DB::table('subject')->orderBy('id', 'DESC')->pluck('title', 'id');
        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        return view('contents.edit',['contents'=>$contents,'institutions'=>$institutions,'content_section'=>$content_section,'classes'=>$classes,'subject'=>$subject,'content_type'=>$content_type]);
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
        $contents=Contents::find($id);
        $contents->institution_id=$request->institution_id;
        $contents->class_id=$request->class_id;
        $contents->subject_id=$request->subject_id;
        $contents->content_section_id=$request->content_section_id;
        $contents->content_type_id=$request->content_type_id;
        $contents->content_name=$request->content_name;
        $contents->file_content=$request->file_content;

        if ($request->file('image')){
            if (File::exists(public_path().'/'.$contents->image)){
                File::delete(public_path().'/'.$contents->image);
            }
            $file=$request->file('image');
            $fileName = md5(uniqid(rand(), true)).'.'.strtolower(pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION)) ;
            $destinationPath = 'images/' ;
            $file->move($destinationPath,$fileName);
            $contents->image = $destinationPath.$fileName;
        }
        $contents->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('ContentsController@index');
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
        return redirect()->action('ContentsController@index');
    }
}
