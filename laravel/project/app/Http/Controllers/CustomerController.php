<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new customer();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->pass = Hash::make($request->pass);
        $data->gender = $request->gender;
        $data->hobby = implode(",", $request->hobby);
        $data->mobile = $request->mobile;

        $image = $request->file('image');  // image get
        $filename = time() . '_img.' . $request->file('image')->getClientOriginalExtension(); // name set
        $image->move('upload/customers', $filename); // move in public folder
        $data->image = $filename; // store in name in database

        $data->save();
        return redirect('/signup');
    }

    public function login()
    {
        return view('website.login');
    }

    public function auth_login(Request $request)
    {

        $data = customer::where('email', $request->email)->first();
        if ($data) {
            if (Hash::check($request->pass, $data->pass)) {
                if ($data->status == "Unblock") {

                    // session create
                    Session()->put('cname',$data->name);  // $_SESSION['cname']=$data->name
                    Session()->put('cid',$data->id);
                    Session()->put('cemail',$data->email);

                    // Session()->get('cname')  get session
                    // session()->pull('cname');

                    echo "<script>
                    alert('Login success');
                    window.location='/';
                    </script>";
                } else {
                    echo "<script>
                    alert('Login Failed due to Blocked Account');
                    window.location='/login';
                    </script>";
                }
            } else {
                echo "<script>
                    alert('Login Failed due to wrong password');
                    window.location='/login';
                    </script>";
            }
        } else {
            echo "<script>
                    alert('Login Failed due wrong email');
                    window.location='/login';
                    </script>";
        }
    }

    public function cust_logout()
    {
       
        Session()->pull('cid');
        Session()->pull('cname');
        Session()->pull('cemail');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        $data = customer::all();
        return view('admin.manage_customers', ["customer" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer,$id)
    {
        $data=customer::find($id);
        $del_data=$data->name;
        $data->delete();
        return back()->with('delete', $del_data);
    }
}
