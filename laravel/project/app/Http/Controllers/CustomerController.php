<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

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
        // create validation Rule 
        $validation = $request->validate([
            'name' => 'required|alpha:ascii |max:255',
            'email' => 'required|unique:contacts',
            'pass' => 'required|min:8|max:12',
            'gender' => 'required|in:Male,Female',
            'hobby' => 'integer|boolean|min:0|max:2',
            'mobile' => 'required|digits:10',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
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
        Alert::success('Success', 'You\'ve Signup Successfully');
        return redirect('/signup');
    }

    public function login()
    {
        return view('website.login');
    }

    public function auth_login(Request $request)
    {

        $validation = $request->validate([
            'email' => 'required|email',
            'pass' => 'required|min:4|max:12'
        ]);
        $data = customer::where('email', $request->email)->first();
        if ($data) {
            if (Hash::check($request->pass, $data->pass)) {
                if ($data->status == "Unblock") {

                    // session create
                    Session()->put('cname', $data->name);  // $_SESSION['cname']=$data->name
                    Session()->put('cid', $data->id);
                    Session()->put('cemail', $data->email);

                    // Session()->get('cname')  get session
                    // session()->pull('cname');

                    Alert::success('Congrats', 'You\'ve Login Successfully');
                    return redirect('/index');
                } else {
                    Alert::error('Failed', 'Login Failed due to Blocked Account');
                    return redirect('/login');
                }
            } else {
                Alert::error('Failed', 'Login Failed due to wrong password');
                return redirect('/login');
            }
        } else {
            Alert::error('Failed', 'Login Failed due wrong email');
            return redirect('/login');
        }
    }

    public function cust_logout()
    {

        Session()->pull('cid');
        Session()->pull('cname');
        Session()->pull('cemail');

        return redirect('/');
    }

    public function profile(customer $customer)
    {
        $data = customer::where('id',Session()->get('cid'))->first();
        return view('website.profile', ["customer" => $data]);
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
    public function edit(customer $customer,$id)
    {
        $data = customer::find($id);
        return view('website.edit_profile', ["customer" => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer,$id)
    {
        // create validation Rule 
        $validation = $request->validate([
            'name' => 'required|alpha:ascii |max:255',
            'email' => 'required',
            'mobile' => 'required|digits:10',
        ]);
        
        $data=customer::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->hobby = implode(",", $request->hobby);
        $data->mobile = $request->mobile;

        if($request->hasFile('image'))
        {
            unlink('upload/customers/'.$data->image);

            $image = $request->file('image');  // image get
            $filename = time() . '_img.' . $request->file('image')->getClientOriginalExtension(); // name set
            $image->move('upload/customers', $filename); // move in public folder
            $data->image = $filename; // store in name in database
        }
        $data->update();
        Alert::success('Success', 'You\'ve Profile Update Successfully');
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer, $id)
    {
        $data = customer::find($id);
        $del_data = $data->name;
        $data->delete();
        return back()->with('delete', $del_data);
    }
}
