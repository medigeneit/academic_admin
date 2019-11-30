<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Contents;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class MadrashaController extends Controller
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

        $madrasha = Contents::select('contents.id','contents.created_at','contents.content_name','institution.name as institution_name','classes.title','subject.title as subject_name','material_type.title as material_type')
            ->leftjoin('institution','institution.id','contents.institution_id')
            ->leftjoin('classes','classes.id','contents.class_id')
            ->leftjoin('subject','subject.id','contents.subject_id')
            ->leftjoin('material_type','material_type.id','contents.material_type_id')
            ->where('content_section_id',2)
            ->orderBy('contents.id','DESC')
            ->get();
        return view('madrasha.list',['madrasha'=>$madrasha]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = DB::table('classes')
            ->join('institution_type_has_class','institution_type_has_class.class_id','classes.id')
            ->where('institution_type_has_class.institution_type_id',2)
            ->pluck('title', 'id');

        $institutions = DB::table('institution')
            ->join('institution_has_type','institution_has_type.institution_id','institution.id')
            ->where('institution_type_id',2)->pluck('name', 'id');

        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $material_type = DB::table('material_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('madrasha.create',['classes'=>$classes,'institutions'=>$institutions,'content_type'=>$content_type,'material_type'=>$material_type]);
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
            $allData['content_section_id'] = 2;

            if ($request->file('image')){
                $file=$request->file('image');
                $fileName = md5(uniqid(rand(), true)).'.'.strtolower(pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION)) ;
                $destinationPath = 'images/' ;
                $file->move($destinationPath,$fileName);
                $allData['image'] = $destinationPath.$fileName;
            }

            Contents::create($allData);
            Session::flash('message', 'Record added successfully');
            return redirect()->action('MadrashaController@index');

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
        return view('madrasha.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $madrasha=Contents::find($id);

        $classes = DB::table('classes')
            ->join('institution_type_has_class','institution_type_has_class.class_id','classes.id')
            ->where('institution_type_has_class.institution_type_id',2)
            ->pluck('title', 'id');

        $institutions = DB::table('institution')
            ->join('institution_has_type','institution_has_type.institution_id','institution.id')
            ->where('institution_type_id',2)->pluck('name', 'id');

        $subject = DB::table('subject')
            ->join('subject_has_class','subject_has_class.subject_id','subject.id')
            ->join('subject_has_type','subject_has_type.subject_id','subject.id')
            ->where('type_id',2)
            ->where('class_id',$madrasha->class_id)
            ->pluck('title','id');

        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $material_type = DB::table('material_type')->orderBy('id', 'DESC')->pluck('title', 'id');


        return view('madrasha.edit',['madrasha'=>$madrasha,'classes'=>$classes,'subject'=>$subject,'institutions'=>$institutions,'content_type'=>$content_type,'material_type'=>$material_type]);
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
        $madrasha=Contents::find($id);
        $madrasha->institution_id=$request->institution_id;
        $madrasha->class_id=$request->class_id;
        $madrasha->subject_id=$request->subject_id;
        $madrasha->material_type_id=$request->material_type_id;
        $madrasha->content_type_id=$request->content_type_id;
        $madrasha->content_name=$request->content_name;
        $madrasha->file_content=$request->file_content;
        $madrasha->file_location=$request->file_location;


        $madrasha->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('MadrashaController@index');
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
        return redirect()->action('MadrashaController@index');
    }
}
