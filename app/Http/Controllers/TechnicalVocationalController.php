<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Contents;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class TechnicalVocationalController extends Controller
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
        $technical_vocational = Contents::select('contents.id','contents.content_name','contents.created_at','institution_type.title as institution_type','institution.name as institution_name','classes.title','subject.title as subject_name','material_type.title as material_type')
        ->leftjoin('institution_type','institution_type.id','contents.institution_type_id')
        ->leftjoin('institution','institution.id','contents.institution_id')->join('classes','classes.id','contents.class_id')
        ->leftjoin('subject','subject.id','contents.subject_id')
        ->leftjoin('material_type','material_type.id','contents.material_type_id')
        ->where('content_section_id',6)
        ->orderBy('contents.id','DESC')
        ->get();
        return view('technical_vocational.list',['technical_vocational'=>$technical_vocational]);
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
            ->where('institution_type_has_class.institution_type_id',6)
            ->pluck('title', 'id');

        $institutions = DB::table('institution')
            ->join('institution_has_type','institution_has_type.institution_id','institution.id')
            ->where('institution_type_id',6)->pluck('name', 'id');

        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $material_type = DB::table('material_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('technical_vocational.create',['classes'=>$classes,'institutions'=>$institutions,'content_type'=>$content_type,'material_type'=>$material_type]);
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
            $allData['content_section_id'] = 6;


            Contents::create($allData);
            Session::flash('message', 'Record added successfully');
            return redirect()->action('TechnicalVocationalController@index');

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
        return view('technical_vocational.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $technical_vocational=Contents::find($id);

        $classes = DB::table('classes')
            ->join('institution_type_has_class','institution_type_has_class.class_id','classes.id')
            ->where('institution_type_has_class.institution_type_id',6)
            ->pluck('title', 'id');

        $institutions = DB::table('institution')
            ->join('institution_has_type','institution_has_type.institution_id','institution.id')
            ->where('institution_type_id',6)
            ->pluck('name', 'id');

        $subject = DB::table('subject')
            ->join('subject_has_class','subject_has_class.subject_id','subject.id')
            ->join('subject_has_type','subject_has_type.subject_id','subject.id')
            ->where('type_id',6)
            ->where('class_id',$technical_vocational->class_id)
            ->pluck('title','id');

        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $material_type = DB::table('material_type')->orderBy('id', 'DESC')->pluck('title', 'id');


        return view('technical_vocational.edit',['technical_vocational'=>$technical_vocational,'classes'=>$classes,'subject'=>$subject,'institutions'=>$institutions,'content_type'=>$content_type,'material_type'=>$material_type]);
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
        $technical_vocational=Contents::find($id);
        $technical_vocational->institution_id=$request->institution_id;
        $technical_vocational->class_id=$request->class_id;
        $technical_vocational->subject_id=$request->subject_id;
        $technical_vocational->content_type_id=$request->content_type_id;
        $technical_vocational->material_type_id=$request->material_type_id;
        $technical_vocational->content_name=$request->content_name;
        $technical_vocational->file_content=$request->file_content;
        $technical_vocational->file_location=$request->file_location;


        $technical_vocational->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('TechnicalVocationalController@index');
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
        return redirect()->action('TechnicalVocationalController@index');
    }
}
