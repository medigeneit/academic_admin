<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function downloadPDF()

    {
        $pdf = PDF::loadView('pdfView');
        return $pdf->download('invoice.pdf');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_users = DB::table('users')->select('roles.name',DB::raw('count(*) as total'))
                           ->join('model_has_roles','model_has_roles.model_id','users.id')
                           ->join('roles','roles.id','model_has_roles.role_id')
                           ->groupBy('roles.name')
                           ->get();
        //dd($total_users);
        /*$total_users =  DB::table('users')->select(DB::raw("SUM(IF(role_id = 5, 1, 0)) as clients"),DB::raw("SUM(IF(role_id = 6, 1, 0)) as employees"),DB::raw("count(id) as users"))
                              ->where('user_status',2)
                              ->first();*/


        return view('home',['total_users'=>$total_users]);
    }
}
