<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\InstitutionType;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;

class InstitutionTypeController extends Controller
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

        $institution_type = InstitutionType::orderBy('id','DESC')
            ->get();
        foreach($institution_type as $row){
            $row->class  = DB::table('classes')
                ->join('institution_type_has_class','institution_type_has_class.class_id','classes.id')
                ->where('institution_type_id',$row->id)->get();
        }

        return view('institution_type.list',['institution_type'=>$institution_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = DB::table('classes')->pluck('title','id');
        return view('institution_type.create',['classes'=>$classes]);
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

            $institution_type = InstitutionType::create($allData);

            if($request->class_id){
                foreach($request->class_id as $k=>$value){
                    DB::table('institution_type_has_class')->insert(['class_id'=>$value,'institution_type_id'=>$institution_type->id]);
                }
            }


            Session::flash('message', 'Record added successfully');

            return redirect()->action('InstitutionTypeController@index');

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
        return view('institution_type.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institution_type=InstitutionType::find($id);
        $classes = DB::table('classes')->pluck('title','id');
        $institution_type_has_class = DB::table('institution_type_has_class')->where('institution_type_id',$id)->pluck('class_id','class_id');
        return view('institution_type.edit',['institution_type'=>$institution_type,'classes'=>$classes,'institution_type_has_class'=>$institution_type_has_class]);
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
        $institution_type=InstitutionType::find($id);
        $institution_type->title=$request->title;
        if ($request->file('image')){
            $file=$request->file('image');
            $fileName = md5(uniqid(rand(), true)).'.'.strtolower(pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION)) ;
            $destinationPath = 'images/' ;
            $file->move($destinationPath,$fileName);
            $institution_type->image = $destinationPath.$fileName;
        }



        $institution_type->push();

        if($request->class_id){
            DB::table('institution_type_has_class')->where('institution_type_id',$institution_type->id)->delete();
            foreach($request->class_id as $k=>$value){
                DB::table('institution_type_has_class')->insert(['class_id'=>$value,'institution_type_id'=>$institution_type->id]);
            }
        }


        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('InstitutionTypeController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InstitutionType::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('InstitutionTypeController@index');
    }
}
