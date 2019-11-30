<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\SkillDevelopmentCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;

class SkillDevelopmentCategoryController extends Controller
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

        $skill_development_category = SkillDevelopmentCategory::orderBy('id','DESC')
            ->get();

        foreach($skill_development_category as $row){
            $row->parent = SkillDevelopmentCategory::where('id',$row->parent_id)->value('title');
        }

        return view('skill_development_category.list',['iinstitution'=>$skill_development_category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent =  SkillDevelopmentCategory::pluck('title','id');
        return view('skill_development_category.create',(['parent'=>$parent]));
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
            SkillDevelopmentCategory::create($allData);

            Session::flash('message', 'Record added successfully');

            return redirect()->action('SkillDevelopmentCategoryController@index');

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
        return view('skill_development_category.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill_development_category=SkillDevelopmentCategory::find($id);
        $parent =  SkillDevelopmentCategory::pluck('title','id');

        return view('skill_development_category.edit',['skill_development_category'=>$skill_development_category,'parent'=>$parent]);
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
        $skill_development_category=SkillDevelopmentCategory::find($id);
        $skill_development_category->name=$request->name;


        $skill_development_category->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('SkillDevelopmentCategoryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SkillDevelopmentCategory::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('SkillDevelopmentCategoryController@index');
    }
}
