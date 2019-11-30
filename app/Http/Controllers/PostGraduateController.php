<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Contents;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class PostGraduateController extends Controller
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

        $post_graduate = Contents::select('contents.id','contents.content_name','institution_category.title as institution_category','institution.name as institution_name','department.title as department','classes.title as class','subject.title as subject','material_type.title as material_type')
            ->join('institution_category','institution_category.id','contents.institution_category_id')
            ->join('institution','institution.id','contents.institution_id')
            ->join('department','department.id','contents.department_id')
            ->join('classes','classes.id','contents.class_id')
            ->join('subject','subject.id','contents.subject_id')
            ->join('material_type','material_type.id','contents.material_type_id')
            ->orderBy('id','DESC')
            ->where('content_section_id',9)
            ->get();
        return view('post_graduate.list',['post_graduate'=>$post_graduate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutions_category = DB::table('institution_category')->orderBy('id', 'DESC')->pluck('title', 'id');
        $department = DB::table('department')->orderBy('id', 'DESC')->pluck('title', 'id');
        $classes = DB::table('classes')
            ->join('institution_type_has_class','institution_type_has_class.class_id','classes.id')
            ->where('institution_type_has_class.institution_type_id',9)
            ->orderBy('id', 'DESC')->pluck('title', 'id');
        $material_type = DB::table('material_type')->orderBy('id', 'DESC')->pluck('title', 'id');
        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('post_graduate.create',['institutions_category'=>$institutions_category,'department'=>$department,'classes'=>$classes,'material_type'=>$material_type,'content_type'=>$content_type]);
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
            $allData['content_section_id'] = 9;

            Contents::create($allData);
            Session::flash('message', 'Record added successfully');
            return redirect()->action('PostGraduateController@index');

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
        return view('post_graduate.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post_graduate=Contents::find($id);


        $institutions_category = DB::table('institution_category')->orderBy('id', 'DESC')->pluck('title', 'id');

        $institutions = DB::table('institution')
            ->join('institution_has_type','institution_has_type.institution_id','institution.id')
            ->where('institution_has_type.institution_type_id',9)
            ->where('institution_category_id',$post_graduate->institution_category_id)
            ->orderBy('id', 'DESC')
            ->pluck('name', 'id');

        $subject = DB::table('subject')
            ->join('subject_has_type','subject_has_type.subject_id','subject.id')
            ->where('subject_has_type.type_id',9)
            ->where('institution_category_id',$post_graduate->institution_category_id)
            ->orderBy('id', 'DESC')
            ->pluck('title', 'id');


        $department = DB::table('department')->orderBy('id', 'DESC')->pluck('title', 'id');

        $classes = DB::table('classes')
            ->join('institution_type_has_class','institution_type_has_class.class_id','classes.id')
            ->where('institution_type_has_class.institution_type_id',9)
            ->orderBy('id', 'DESC')
            ->pluck('title', 'id');

        $material_type = DB::table('material_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        $content_type = DB::table('content_type')->orderBy('id', 'DESC')->pluck('title', 'id');

        return view('post_graduate.edit',['post_graduate'=>$post_graduate,'institutions'=>$institutions,'institutions_category'=>$institutions_category,'department'=>$department,'classes'=>$classes,'material_type'=>$material_type,'subject'=>$subject,'content_type'=>$content_type]);
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
        $post_graduate=Contents::find($id);
        $post_graduate->institution_id=$request->institution_id;
        $post_graduate->institution_category_id=$request->institution_category_id;
        $post_graduate->department_id=$request->department_id;
        $post_graduate->class_id=$request->class_id;
        $post_graduate->subject_id=$request->subject_id;
        $post_graduate->material_type_id=$request->material_type_id;
        $post_graduate->content_type_id=$request->content_type_id;
        $post_graduate->file_content=$request->file_content;
        $post_graduate->file_location=$request->file_location;


        $post_graduate->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('PostGraduateController@index');
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
        return redirect()->action('PostGraduateController@index');
    }
}
