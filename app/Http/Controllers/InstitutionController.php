<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Institution;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;

class InstitutionController extends Controller
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

        $iinstitution = Institution::select('institution.*','institution_category.title as institution_category')
            ->leftjoin('institution_category','institution_category.id','institution.institution_category_id')
            ->orderBy('id','desc')
            ->get();


        foreach($iinstitution as $row){
            $row->type  = DB::table('institution_type')
                ->join('institution_has_type','institution_has_type.institution_type_id','institution_type.id')
                ->where('institution_id',$row->id)->get();

            $row->class  = DB::table('classes')
                ->join('institution_has_class','institution_has_class.class_id','classes.id')
                ->where('institution_id',$row->id)->get();

            $row->department  = DB::table('department')
                ->join('institution_has_department','institution_has_department.department_id','department.id')
                ->where('institution_id',$row->id)->get();
        }

        return view('institution.list',['iinstitution'=>$iinstitution]);
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
        $classes = DB::table('classes')->pluck('title','id');
        $departments = DB::table('department')->pluck('title','id');
        return view('institution.create',['institution_type'=>$institution_type,'institution_category'=>$institution_category,'classes'=>$classes,'departments'=>$departments]);
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

            $institution = Institution::create($allData);

            if($request->institution_type_id){
                foreach($request->institution_type_id as $k=>$value){
                    DB::table('institution_has_type')->insert(['institution_type_id'=>$value,'institution_id'=>$institution->id]);
                }
            }

            if($request->class_id){
                foreach($request->class_id as $k=>$value){
                    DB::table('institution_has_class')->insert(['class_id'=>$value,'institution_id'=>$institution->id]);
                }
            }

        if($request->department_id){
            foreach($request->department_id as $k=>$value){
                DB::table('institution_has_department')->insert(['department_id'=>$value,'institution_id'=>$institution->id]);
            }
        }

            Session::flash('message', 'Record added successfully');

            return redirect()->action('InstitutionController@index');

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
        return view('institution.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institution=Institution::find($id);
        $institution_type = DB::table('institution_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $institution_category = DB::table('institution_category')->orderBy('id', 'DESC')->pluck('title', 'id');
        $classes = DB::table('classes')->pluck('title','id');
        $departments = DB::table('department')->pluck('title','id');
        $class_institution = DB::table('institution_has_class')->where('institution_id',$id)->pluck('class_id','class_id');
        $department_institution = DB::table('institution_has_department')->where('institution_id',$id)->pluck('department_id','department_id');
        $institution_types = DB::table('institution_has_type')->where('institution_id',$id)->pluck('institution_type_id','institution_type_id');
        return view('institution.edit',['institution'=>$institution,'institution_type'=>$institution_type,'institution_category'=>$institution_category,'classes'=>$classes,'departments'=>$departments,'department_institution'=>$department_institution,'class_institution'=>$class_institution,'institution_types'=>$institution_types]);
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
        $institution=Institution::find($id);
        $institution->name=$request->name;
        $institution->address=$request->address;
        $institution->image=$request->image;
        $institution->institution_category_id=$request->institution_category_id;

        $institution->push();

        if($request->institution_type_id){
            DB::table('institution_has_type')->where('institution_id',$institution->id)->delete();
            foreach($request->institution_type_id as $k=>$value){
                DB::table('institution_has_type')->insert(['institution_type_id'=>$value,'institution_id'=>$institution->id]);
            }
        }

        if($request->class_id){
            DB::table('institution_has_class')->where('institution_id',$institution->id)->delete();
            foreach($request->class_id as $k=>$value){
                DB::table('institution_has_class')->insert(['class_id'=>$value,'institution_id'=>$institution->id]);
            }
        }

        if($request->class_id){
            DB::table('institution_has_class')->where('institution_id',$institution->id)->delete();
            foreach($request->class_id as $k=>$value){
                DB::table('institution_has_class')->insert(['class_id'=>$value,'institution_id'=>$institution->id]);
            }
        }

        if($request->department_id){
            DB::table('institution_has_department')->where('institution_id',$institution->id)->delete();
            foreach($request->department_id as $k=>$value){
                DB::table('institution_has_department')->insert(['department_id'=>$value,'institution_id'=>$institution->id]);
            }
        }


        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('InstitutionController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Institution::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('InstitutionController@index');
    }
}
