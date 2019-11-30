<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Subjects;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;

class SubjectsController extends Controller
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

        $subjects = Subjects::select('subject.*','institution_category.title as institution_category','department.title as department','writer.name as writer_name')
            ->leftjoin('institution_category','institution_category.id','subject.institution_category_id')
            ->leftjoin('department','department.id','subject.department_id')
            ->leftjoin('writer','writer.id','subject.writer_id')
            ->orderBy('id','desc')
            ->get();

        foreach($subjects as $row) {
            $row->class = DB::table('classes')
                ->join('subject_has_class', 'subject_has_class.class_id', 'classes.id')
                ->where('subject_id', $row->id)->get();
        }

        foreach($subjects as $row) {
            $row->type = DB::table('institution_type')
                ->join('subject_has_type', 'subject_has_type.type_id', 'institution_type.id')
                ->where('subject_id', $row->id)->get();
        }


        return view('subjects.list',['subjects'=>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institution_type = DB::table('institution_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $institution_category = DB::table('institution_category')->orderBy('id', 'DESC')->pluck('title', 'id');
        $writer = DB::table('writer')->orderBy('id', 'DESC')->pluck('name', 'id');
        $classes = DB::table('classes')->orderBy('id', 'DESC')->pluck('title', 'id');
        $level_years = DB::table('level_year')->orderBy('id', 'DESC')->pluck('title', 'id');
        $department = DB::table('department')->orderBy('id', 'DESC')->pluck('title', 'id');
        return view('subjects.create',['institution_type'=>$institution_type,'institution_category'=>$institution_category,'classes'=>$classes,'writer'=>$writer,'department'=>$department,'level_years'=>$level_years]);
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

            if ($request->file('image')){
                $file=$request->file('image');
                $fileName = md5(uniqid(rand(), true)).'.'.strtolower(pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION)) ;
                $destinationPath = 'images/' ;
                $file->move($destinationPath,$fileName);
                $allData['image'] = $destinationPath.$fileName;
            }

            $subject = subjects::create($allData);

            if($request->institution_type_id){
                foreach($request->institution_type_id as $k=>$value){
                    DB::table('subject_has_type')->insert(['type_id'=>$value,'subject_id'=>$subject->id]);
                }
            }

            if($request->class_id){
                foreach($request->class_id as $k=>$value){
                    DB::table('subject_has_class')->insert(['class_id'=>$value,'subject_id'=>$subject->id]);
                }
            }


            Session::flash('message', 'Record added successfully');

            return redirect()->action('SubjectsController@index');

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
        return view('subjects.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subjects=subjects::find($id);
        $subject_has_type = DB::table('subject_has_type')->where('subject_id',$id)->pluck('type_id','type_id');
        $institution_type = DB::table('institution_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $institution_category = DB::table('institution_category')->orderBy('id', 'DESC')->pluck('title', 'id');
        $subject_has_class = DB::table('subject_has_class')->where('subject_id',$id)->pluck('class_id','class_id');
        $classes = DB::table('classes')->pluck('title','id');
        $writer = DB::table('writer')->orderBy('id', 'DESC')->pluck('name', 'id');
        $department = DB::table('department')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('subjects.edit',['subjects'=>$subjects,'institution_type'=>$institution_type,'subject_has_type'=>$subject_has_type,'institution_category'=>$institution_category,'classes'=>$classes,'subject_has_class'=>$subject_has_class,'writer'=>$writer,'department'=>$department]);
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
        $subjects=subjects::find($id);
        $subjects->title=$request->title;
        $subjects->institution_category_id=$request->institution_category_id;
        $subjects->department_id=$request->department_id;
        $subjects->writer_id=$request->writer_id;

        if ($request->file('image')){
            if (File::exists(public_path().'/'.$subjects->image)){
                File::delete(public_path().'/'.$subjects->image);
            }
            $file=$request->file('image');
            $fileName = md5(uniqid(rand(), true)).'.'.strtolower(pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION)) ;
            $destinationPath = 'images/' ;
            $file->move($destinationPath,$fileName);
            $subjects->image = $destinationPath.$fileName;
        }
        $subjects->push();


        if($request->institution_type_id){
            DB::table('subject_has_type')->where('subject_id',$subjects->id)->delete();
            foreach($request->institution_type_id as $k=>$value){
                DB::table('subject_has_type')->insert(['type_id'=>$value,'subject_id'=>$subjects->id]);
            }
        }

        if($request->class_id){
            DB::table('subject_has_class')->where('subject_id',$subjects->id)->delete();
            foreach($request->class_id as $k=>$value){
                DB::table('subject_has_class')->insert(['class_id'=>$value,'subject_id'=>$subjects->id]);
            }
        }


        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('SubjectsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        subjects::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('SubjectsController@index');
    }
}
