<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Contents;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class EnglishVersionController extends Controller
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
        $english_version = Contents::select('contents.id','contents.content_name','contents.created_at','institution_type.title as institution_type','institution.name as institution_name','classes.title','subject.title as subject_name','material_type.title as material_type')
        ->leftjoin('institution_type','institution_type.id','contents.institution_type_id')
        ->leftjoin('institution','institution.id','contents.institution_id')->join('classes','classes.id','contents.class_id')
        ->leftjoin('subject','subject.id','contents.subject_id')
        ->leftjoin('material_type','material_type.id','contents.material_type_id')
        ->where('content_section_id',4)
        ->orderBy('contents.id','DESC')
        ->get();
        return view('english_version.list',['english_version'=>$english_version]);
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
            ->where('institution_type_has_class.institution_type_id',4)
            ->pluck('title', 'id');

        $institutions = DB::table('institution')
            ->join('institution_has_type','institution_has_type.institution_id','institution.id')
            ->where('institution_type_id',4)
            ->pluck('name', 'id');

        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $material_type = DB::table('material_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('english_version.create',['classes'=>$classes,'institutions'=>$institutions,'content_type'=>$content_type,'material_type'=>$material_type]);
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
            $allData['content_section_id'] = 4;


            Contents::create($allData);
            Session::flash('message', 'Record added successfully');
            return redirect()->action('EnglishVersionController@index');

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
        return view('english_version.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $english_version=Contents::find($id);

        $classes = DB::table('classes')
            ->join('institution_type_has_class','institution_type_has_class.class_id','classes.id')
            ->where('institution_type_has_class.institution_type_id',4)
            ->pluck('title', 'id');

        $institutions = DB::table('institution')
            ->join('institution_has_type','institution_has_type.institution_id','institution.id')
            ->where('institution_type_id',4)->pluck('name', 'id');

        $subject = DB::table('subject')
            ->join('subject_has_class','subject_has_class.subject_id','subject.id')
            ->join('subject_has_type','subject_has_type.subject_id','subject.id')
            ->where('type_id',4)
            ->where('class_id',$english_version->class_id)
            ->pluck('title','id');

        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $material_type = DB::table('material_type')->orderBy('id', 'DESC')->pluck('title', 'id');


        return view('english_version.edit',['english_version'=>$english_version,'classes'=>$classes,'subject'=>$subject,'institutions'=>$institutions,'content_type'=>$content_type,'material_type'=>$material_type]);
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
        $english_version=Contents::find($id);
        $english_version->institution_id=$request->institution_id;
        $english_version->class_id=$request->class_id;
        $english_version->subject_id=$request->subject_id;
        $english_version->content_type_id=$request->content_type_id;
        $english_version->material_type_id=$request->material_type_id;
        $english_version->content_name=$request->content_name;
        $english_version->file_content=$request->file_content;

        $english_version->file_location=$request->file_location;


        $english_version->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('EnglishVersionController@index');
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
        return redirect()->action('EnglishVersionController@index');
    }
}
