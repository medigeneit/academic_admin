<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Contents;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class AdmissionTestController extends Controller
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

        $admission_test = Contents::select('contents.id','contents.content_name','institution_category.title as institution_category','institution.name as institution_name','subject.title as subject','material_type.title as material_type')
            ->join('institution_category','institution_category.id','contents.institution_category_id')
            ->join('institution','institution.id','contents.institution_id')
            ->join('subject','subject.id','contents.subject_id')
            ->join('material_type','material_type.id','contents.material_type_id')
            ->orderBy('id','DESC')
            ->where('content_section_id',7)
            ->get();
        return view('admission_test.list',['admission_test'=>$admission_test]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutions_category = DB::table('institution_category')->orderBy('id', 'DESC')->pluck('title', 'id');
        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $material_type = DB::table('material_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('admission_test.create',['institutions_category'=>$institutions_category,'material_type'=>$material_type,'content_type'=>$content_type]);
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
            $allData['content_section_id'] = 7;


            Contents::create($allData);
            Session::flash('message', 'Record added successfully');
            return redirect()->action('AdmissionTestController@index');

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
        return view('admission_test.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admission_test=Contents::find($id);

        $institutions_category = DB::table('institution_category')->orderBy('id', 'DESC')->pluck('title', 'id');

        $institutions = DB::table('institution')
            ->join('institution_has_type','institution_has_type.institution_id','institution.id')
            ->where('institution_has_type.institution_type_id',7)
            ->where('institution_category_id',$admission_test->institution_category_id)
            ->orderBy('id', 'DESC')
            ->pluck('name', 'id');


        $subject = DB::table('subject')
            ->join('subject_has_type','subject_has_type.subject_id','subject.id')
            ->where('subject_has_type.type_id',7)
            ->where('institution_category_id',$admission_test->institution_category_id)
            ->orderBy('id', 'DESC')
            ->pluck('title', 'id');

        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $material_type = DB::table('material_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        return view('admission_test.edit',['admission_test'=>$admission_test,'institutions'=>$institutions,'material_type'=>$material_type,'institutions_category'=>$institutions_category,'subject'=>$subject,'content_type'=>$content_type]);
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
        $admission_test=Contents::find($id);
        $admission_test->institution_id=$request->institution_id;
        $admission_test->institution_category_id=$request->institution_category_id;
        $admission_test->subject_id=$request->subject_id;
        $admission_test->material_type_id=$request->material_type_id;
        $admission_test->content_type_id=$request->content_type_id;
        $admission_test->content_name=$request->content_name;
        $admission_test->file_content=$request->file_content;
        $admission_test->file_location=$request->file_location;

        $admission_test->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('AdmissionTestController@index');
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
        return redirect()->action('AdmissionTestController@index');
    }
}
