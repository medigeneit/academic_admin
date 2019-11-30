<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Settings;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use Carbon\Carbon;

class SettingsController extends Controller
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



    public function system_settings()
    {
        $job_exam = DB::table('job_exam')->orderBy('id', 'DESC')->pluck('title', 'id');
        return view('settings.system_settings',(['job_exam'=>$job_exam]));
    }


    public function system_settings_update(Request $request)
    {
        foreach($request->data as $k=>$value){
            if (DB::table('settings')->where('key',$k)->exists()){
                DB::table('settings')->where('key',$k)->update(['value'=>$value]);
            }else{
                DB::table('settings')->insert(['key' => $k, 'value' => $value,'type'=>'system']);
            }
        }
        return redirect('system-settings?tab='.$request->tab);
        //return view('admin.settings.system_settings');
    }


}
