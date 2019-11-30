<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\InstitutionCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;

class InstitutionCategoryController extends Controller
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

        $institution_category = InstitutionCategory::orderBy('id','DESC')
            ->get();
        return view('institution_category.list',['institution_category'=>$institution_category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('institution_category.create');
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



            InstitutionCategory::create($allData);


            Session::flash('message', 'Record added successfully');

            return redirect()->action('InstitutionCategoryController@index');

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
        return view('institution_category.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institution_category=InstitutionCategory::find($id);
        return view('institution_category.edit',['institution_category'=>$institution_category]);
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
        $institution_category=InstitutionCategory::find($id);
        $institution_category->title=$request->title;


        if ($request->file('image')){
            if (File::exists(public_path().'/'.$institution_category->image)){
                File::delete(public_path().'/'.$institution_category->image);
            }
            $file=$request->file('image');
            $fileName = md5(uniqid(rand(), true)).'.'.strtolower(pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION)) ;
            $destinationPath = 'images/' ;
            $file->move($destinationPath,$fileName);
            $institution_category->image = $destinationPath.$fileName;
        }
        $institution_category->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('InstitutionCategoryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InstitutionCategory::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('InstitutionCategoryController@index');
    }
}
