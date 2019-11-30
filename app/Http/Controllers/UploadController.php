<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\User;
use App\Models\Tickets;
use App\Models\Service;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
use PDF;
use App\Product;
use App\ProductPhoto;
use Storage;

class UploadController extends Controller
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


    public function uploadForm()
    {
        return view('upload_form');
    }


    public function uploadSubmit(Request $request)
    {
        $photos = [];
        foreach ($request->photos as $photo) {
            $filename = $photo->store('photos');
            $product_photo = ProductPhoto::create([
                'filename' => $filename
            ]);

            $photo_object = new \stdClass();
            $photo_object->name = str_replace('photos/', '',$photo->getClientOriginalName());
            $photo_object->size = round(Storage::size($filename) / 1024, 2);
            $photo_object->fileID = $product_photo->id;
            $photos[] = $photo_object;
        }

        return response()->json(array('files' => $photos), 200);

    }


    public function postProduct(Request $request)
    {
        $product = Product::create($request->all());
        ProductPhoto::whereIn('id', explode(",", $request->file_ids))
            ->update(['product_id' => $product->id]);
        return 'Product saved successfully';
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // return view('tickets.pdfView');
        if(Auth::user()->role_id==1){
            $matchThese = ['tickets.id' => 0];
        }else{
            $matchThese = ['creator_id' => Auth::id()];
        }


        $tickets = Tickets::select('tickets.*','services.service_name as service')
                    ->join('services','services.id','tickets.service')
                    ->orderBy('id', 'desc')
                    ->where(function ($query) {
                       if(Auth::user()->role_id==1){
                           /////
                       }elseif(Auth::user()->role_id==5){
                           $query->where('creator_id', '=', Auth::id());
                       }elseif(Auth::user()->role_id==6){
                           $query->where('assign_id', '=', Auth::id());
                       }
                    })
                    ->get();
        return view('tickets.list',['tickets'=>$tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::orderBy('id', 'DESC')->where('role_id', 5)->pluck('name', 'id');
        $services = Service::orderBy('id', 'DESC')->where('status', 'Active')->pluck('service_name', 'id');
        return view('tickets.create',['users'=>$users,'services'=>$services]);
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
        $allData['creator_id'] = Auth::id();
        $ticket = Tickets::create($allData);

        DB::table('messages')->insert(['sender_id'=>Auth::id(),'message'=>$ticket->description,'ticket_id'=>$ticket->id]);
        Session::flash('message', 'Record added successfully');
        return redirect()->action('TicketsController@index');
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
        return view('tickets.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tickets = Tickets::find($id);
        $users = User::orderBy('id', 'DESC')->where('role_id', 5)->pluck('name', 'id');
        $services = Service::orderBy('id', 'DESC')->where('status', 'Active')->pluck('service_name', 'id');
        return view('tickets.edit',['users'=>$users,'tickets'=>$tickets,'services'=>$services]);
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
        $tickets=Tickets::find($id);
        $tickets->title=$request->title;
        $tickets->subject=$request->subject;
        $tickets->service=$request->service;
        $tickets->description=$request->description;
        $tickets->status=$request->status;
        $tickets->push();
        Session::flash('message', 'Record uddated successfully');
        return redirect()->action('TicketsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tickets::destroy($id); // 1 way
        Session::flash('message', 'Record deleted successfully');
        return redirect()->action('TicketsController@index');
    }
}
