<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Contents;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class ApproveController extends Controller
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
        $approve = Contents::select('contents.id','contents.content_name','contents.created_at','content_section.title as content_section')
        ->join('content_section','content_section.id','contents.content_section_id')
        ->orderBy('contents.id','DESC')
        ->get();
        return view('approve.list',['approve'=>$approve]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = DB::table('classes')->where('institution_type_id',11)->orderBy('id', 'DESC')->pluck('title', 'id');
        $institutions = DB::table('institution')->where('institution_type_id',11)->orderBy('id', 'DESC')->pluck('name', 'id');
        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('approve.create',['classes'=>$classes,'institutions'=>$institutions,'content_type'=>$content_type]);
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
            $allData['content_section_id'] = 1;

            if ($request->file('image')){
                $file=$request->file('image');
                $fileName = md5(uniqid(rand(), true)).'.'.strtolower(pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION)) ;
                $destinationPath = 'images/' ;
                $file->move($destinationPath,$fileName);
                $allData['image'] = $destinationPath.$fileName;
            }

            Contents::create($allData);
            Session::flash('message', 'Record added successfully');
            return redirect()->action('ApproveController@index');

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
        return view('approve.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $approve=Contents::find($id);

        $classes = DB::table('classes')->where('institution_type_id',11)->orderBy('id', 'DESC')->pluck('title', 'id');
        $subject = DB::table('subject')->where('class_id',$approve->class_id)->pluck('title','id');
        $institutions = DB::table('institution')->where('institution_type_id',11)->orderBy('id', 'DESC')->pluck('name', 'id');
        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');


        return view('approve.edit',['approve'=>$approve,'classes'=>$classes,'subject'=>$subject,'institutions'=>$institutions,'content_type'=>$content_type]);
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
        $approve=Contents::find($id);
        $approve->institution_id=$request->institution_id;
        $approve->class_id=$request->class_id;
        $approve->subject_id=$request->subject_id;
        $approve->content_type_id=$request->content_type_id;
        $approve->content_name=$request->content_name;
        $approve->file_content=$request->file_content;

        if ($request->file('image')){
            if (File::exists(public_path().'/'.$approve->image)){
                File::delete(public_path().'/'.$approve->image);
            }
            $file=$request->file('image');
            $fileName = md5(uniqid(rand(), true)).'.'.strtolower(pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION)) ;
            $destinationPath = 'images/' ;
            $file->move($destinationPath,$fileName);
            $approve->image = $destinationPath.$fileName;
        }
        $approve->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('ApproveController@index');
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
        return redirect()->action('ApproveController@index');
    }
}
