<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Models\category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=category::all();  // select * from categories
        return view('website.service',["category"=>$data]);
    }

    public function view_service($id)
    {
        $data=service::where('cate_id',$id)->get();  // select * from services
        return view('website.view_service',["service"=>$data]);
    }

    public function details_service($id)
    {
        //$users = service::join('categories', 'services.cate_id','=','categories.id')->get(['services.*','categories.cate_name']);
        $data=service::join('categories', 'services.cate_id','=','categories.id')->where('services.id',$id)->first(['services.*','categories.cate_name']);
        return view('website.details_service',["service"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data=category::all();  // select * from categories
         return view('admin.add_service',["category"=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $data = new service();
        $data->cate_id = $request->cate_id;
        $data->ser_name = $request->ser_name;
        $data->ser_description = $request->ser_description;
        $data->main_price = $request->main_price;
        $data->dis_price = $request->dis_price;
       

        $ser_img = $request->file('ser_img');  // image get
        $filename = time() . '_img.' . $request->file('ser_img')->getClientOriginalExtension(); // name set
        $ser_img->move('upload/services', $filename); // move in public folder
        $data->ser_img = $filename; // store in name in database

         $data->save();

        Alert::success('Success', 'You\'ve service added  Successfully');
        return redirect('/add_services');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {

         $data=service::join('categories', 'services.cate_id','=','categories.id')->get(['services.*','categories.cate_name']);
         return view('admin.manage_services',["service"=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $service,$id)
    {
        $data=service::find($id);
        $del_data=$data->ser_name;
        $data->delete();
        return back()->with('delete', $del_data);
    }
}
