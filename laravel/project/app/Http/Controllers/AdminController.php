<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->cookie('c_email'))
        {
            $c_email=$request->cookie('c_email');
            $c_pass=$request->cookie('c_pass');
            $cookie=array("c_email"=>$c_email,"c_pass"=>$c_pass);
        }
        $cookie[]="";
        return view('admin.admin-login',["cookie"=> $cookie]);
    }

    public function admin_auth_login(Request $request)
    {

        $data = admin::where('email', $request->email)->first();
        if ($data) {
            if (Hash::check($request->pass, $data->pass)) {
                
                // session create
                Session()->put('aname', $data->name);  // $_SESSION['cname']=$data->name
                Session()->put('aid', $data->id);
               if(isset($request->rem))
               {
                Cookie::queue('c_email',  $request->email, 10);
                Cookie::queue('c_pass',  $request->pass, 10);
               }
                echo "<script>
                    alert('Login success');
                    window.location='/dashboard';
                    </script>";
            } else {
                echo "<script>
                    alert('Login Failed due to wrong password');
                    window.location='/admin-login';
                    </script>";
            }
        } else {
            echo "<script>
           alert('Login Failed due wrong email');
           window.location='/admin-login';
           </script>";
        }
    }


    public function admin_logout()
    {

        Session()->pull('aid');
        Session()->pull('aname');
        return redirect('/admin-login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
