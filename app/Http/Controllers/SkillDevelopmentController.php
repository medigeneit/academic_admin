<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Contents;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class SkillDevelopmentController extends Controller
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

        $skill_development = Contents::select('contents.id','contents.content_name','skill_development_category.title as skill_development_category','material_type.title as material_type')
            ->join('skill_development_category','skill_development_category.id','contents.skill_development_category_id')
            ->join('material_type','material_type.id','contents.material_type_id')
            ->orderBy('id','DESC')
            ->where('content_section_id',10)
            ->get();
        return view('skill_development.list',['skill_development'=>$skill_development]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $skill_development_category = DB::table('skill_development_category')->where('parent_id',0)->get();
        foreach($skill_development_category as $row){
            $row->child = DB::table('skill_development_category')->where('parent_id',$row->id)->get();
        }
        $material_type = DB::table('material_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('skill_development.create',['material_type'=>$material_type,'content_type'=>$content_type,'skill_development_category'=>$skill_development_category]);
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
            $allData['content_section_id'] = 10;

            Contents::create($allData);
            Session::flash('message', 'Record added successfully');
            return redirect()->action('SkillDevelopmentController@index');

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
        return view('skill_development.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill_development=Contents::find($id);
        $skill_development_category = DB::table('skill_development_category')->where('parent_id',0)->get();
        foreach($skill_development_category as $row){
            $row->child = DB::table('skill_development_category')->where('parent_id',$row->id)->get();
        }
        $material_type = DB::table('material_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('skill_development.edit',['skill_development'=>$skill_development,'material_type'=>$material_type,'content_type'=>$content_type,'skill_development_category'=>$skill_development_category]);
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
        $skill_development=Contents::find($id);
        $skill_development->skill_development_category_id=$request->skill_development_category_id;
        $skill_development->material_type_id=$request->material_type_id;
        $skill_development->content_type_id=$request->content_type_id;
        $skill_development->content_name=$request->content_name;
        $skill_development->file_content=$request->file_content;

        $skill_development->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('SkillDevelopmentController@index');
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
        return redirect()->action('SkillDevelopmentController@index');
    }
}
