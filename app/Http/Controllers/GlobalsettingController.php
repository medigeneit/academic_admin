<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;

class GlobalsettingController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getForm()
    {
        $global_setting = DB::table('global_setting')->where('id',1)->first();
        return view('settings.global_setting',['global_setting'=>$global_setting]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postForm(Request $request)
    {

            $allData=$request->all();



            if ($request->file('company_logo')){
                $file=$request->file('company_logo');
                $fileName = md5(uniqid(rand(), true)).'.'.strtolower(pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION)) ;
                $destinationPath = 'images/' ;
                $file->move($destinationPath,$fileName);
                $allData['company_logo'] = $destinationPath.$fileName;
            }

            if ($request->file('favicon')){
                $file=$request->file('favicon');
                $fileName = md5(uniqid(rand(), true)).'.'.strtolower(pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION)) ;
                $destinationPath = 'images/' ;
                $file->move($destinationPath,$fileName);
                $allData['favicon'] = $destinationPath.$fileName;
            }




        DB::table('global_setting')
            ->where('id', 1)
            ->update($allData);

            Session::flash('message', '✔ Record has been updated successfully');

             return redirect('global-setting');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function expense()
    {
        $bazar_unit = DB::table('bazar_unit')->get();
        $utility_title = DB::table('utility_title')->get();
        $team = DB::table('team')->get();
        return view('settings.expense',['bazar_unit'=>$bazar_unit,'utility_title'=>$utility_title,'team'=>$team]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function expense_update(Request $request)
    {

        if($request->unit_name){
            DB::table('bazar_unit')->truncate();
            foreach($request->unit_name as $k=>$value){
                DB::table('bazar_unit')->insert(['unit_name'=>$value]);
            }
        }elseif($request->title){
            DB::table('utility_title')->truncate();
            foreach($request->title as $k=>$value){
                DB::table('utility_title')->insert(['title'=>$value]);
            }
        }elseif($request->team){
            DB::table('team')->truncate();
            foreach($request->team as $k=>$value){
                DB::table('team')->insert(['team'=>$value]);
            }
        }


        Session::flash('message', '✔ Record has been updated successfully');

        return redirect('expense');
    }






}
