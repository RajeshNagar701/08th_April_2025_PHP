<?php

namespace App\Http\Controllers;

use App\Mail\forgotmail;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|unique:customers',
            'pass' => 'required|min:3|max:12',
            //'gender' => 'required|in:Male,Female',
            //'hobby' => 'integer|boolean|min:0|max:2',
            //'mobile' => 'required|digits:10',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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
        Alert::success('Congrats', 'You\'ve Logout Successfully');
        return redirect('/');
    }

    public function profile(customer $customer)
    {
        $data = customer::where('id', Session()->get('cid'))->first();
        return view('website.profile', ["customer" => $data]);
    }

    public function forgot(customer $customer)
    {
        return view('website.forgot');
    }

    public function auth_forgot(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|email'
        ]);
        $data = customer::where('email', $request->email)->first();
        if ($data) {
             $email=$data->email;
             $otp=rand('100000','999999');
             
             Session()->put('otp', $otp);  
             Session()->put('forgot_id', $data->id);

             $data=array("name"=>$data->name,"otp"=>Session()->get('otp'));
             Mail::to($email)->send(new forgotmail($data));
             Alert::success('Congrats', 'Your OTP sent Successfully');
             return redirect('/enter_otp');
        }
        else {
            Alert::error('Failed', 'Email Does not Exist !');
            return redirect('/forgot');
        }
    }
    

    public function enter_otp(customer $customer)
    {
        if(Session()->get('otp'))
        {
            return view('website.enter_otp');
        }
        else
        {
            return redirect('/');
        }
        
    }

    public function auth_enter_otp(Request $request)
    {
        $validation = $request->validate([
            'otp' => 'required'
        ]);
        if ($request->otp==Session()->get('otp')) {
             Alert::success('Congrats', 'Your OTP Match Successfully');
             Session()->pull('otp');

             Session()->put('reset', 'reset');   // reset passs session
             return redirect('/reset_password');
        }
        else {
            Alert::error('Failed', 'OTP Not Match !');
            return redirect('/enter_otp');
        }
    }

    public function reset_password(customer $customer)
    {
        if(Session()->get('reset'))
        {
            return view('website.reset_password');
        }
        else
        {
            return redirect('/');
        }
        
    }

    public function auth_reset_password(Request $request)
    {
        $validation = $request->validate([
            'pass' => 'required'
        ]); 

        $data=customer::where('id',Session()->get('forgot_id'))->first();
        $data->pass=Hash::make($request->pass);
        $data->update();
        Alert::success('Congrats', 'Your Password Reset Successfully');

        Session()->pull('forgot_id');
        Session()->pull('reset');
        return redirect('/login');
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
    public function edit(customer $customer, $id)
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
    public function update(Request $request, customer $customer, $id)
    {
        // create validation Rule 
        $validation = $request->validate([
            'name' => 'required|alpha:ascii |max:255',
            'email' => 'required',
            'mobile' => 'required|digits:10',
        ]);

        $data = customer::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->hobby = implode(",", $request->hobby);
        $data->mobile = $request->mobile;

        if ($request->hasFile('image')) {
            unlink('upload/customers/' . $data->image);

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

    public function status_customers(customer $customer, $id)
    {
        $data = customer::find($id);
        $status = $data->status;
        if ($status == "Block") {
            $data->status = "Unblock";
            $data->update();
            Alert::success('Success', 'You\'ve Status Unblock Successfully');
            return back();
        } else {
            
            Session()->pull('cid');
            Session()->pull('cname');
            Session()->pull('cemail');

            $data->status = "Block";
            $data->update();
            Alert::success('Success', 'You\'ve Status Block Successfully');
            return back();
        }
    }
}
