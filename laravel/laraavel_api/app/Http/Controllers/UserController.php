<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	// fetch all data api get method 
    public function allshow()
    {
       $data=user::all();
	   return response()->json([
	   'status'=>200,
	   'users'=>$data
	   ]);
    }
	
	// fetch single id data api get method 
    public function single_show($id)
    {
         $data=user::find($id);
		 return response()->json([
		 'status'=>200,
		 'users'=>$data
		 ]);
    }
	
	function search($key) 	
    {
         $data=user::where('name','LIKE',"%$key%")->orWhere('email','LIKE','%'.$key.'%')->get();
		 return response()->json([
		 'status'=>200,
		 'users'=>$data
		 ]);
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

		$validate=Validator::make($request->all(),[
            'name'=>'Required',
            'email'=>'Required|email',
            'password'=>'Required',
			'img'=>'Required'
        ]);
		
		if($validate->fails())
		{
			return [
				'success' => 0, 
				'message' => $validate->messages(),
			];
		}
		else
		{
			$data=new user;
			$data->name=$request->name;
			$data->email=$request->email;
			$data->password=Hash::make($request->password);	
			$data->gender=$request->gender;
            $data->lag=$request->lag;
        
			if($request->hasFile('img'))
			{
				$img=$request->file('img');		
				$filename=time().'_img.'.$request->file('img')->getClientOriginalExtension();
				$img->move('upload/customer/',$filename);  // use move for move image in public/images
				$data->img=$filename;
			}
			$data->save();
			return response()->json([
			'status'=>200,
			'message'=>"Regioster Success"
			]);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	//put http://127.0.0.1:8000/api/updateuser/2 
    
	public function update(Request $request, $id)
    {
       	$validate=Validator::make($request->all(),[
            'name'=>'Required',
            'email'=>'Required|email',
        ]);
		
		if($validate->fails())
		{
			return [
				'success' => 0, 
				'message' => $validate->messages(),
			];
		}
		else
		{
			$data=user::find($id);
			$data->name=$request->name;
			$data->email=$request->email;
			
			$data->update();
			return response()->json([
			'status'=>200,
			'message'=>"Update Success"
			]);
		}
    }
	
	public function updatestatus(Request $request,$id)
    {
        $data=user::find($id);
		$status=$data->status;
		if($status === "Block")
		{	
			$data->status="Unblock";
			$data->save();
			return response()->json([
			'status'=>200,
			'msg'=>"Unblock Success"
			]);
		}
		else
		{
			$data->status="Block";
			$data->save();
			return response()->json([
			'status'=>200,
			'msg'=>"Block Success"
			]);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::find($id)->delete();
		return response()->json([
		'status'=>200,
		'msg'=>"Delete Success"
		]);
    }
	
	
	public function login(Request $request)
	{
		$validate=Validator::make($request->all(),[
            'email'=>'Required|email',
            'password'=>'Required'
        ]);
		
		if($validate->fails())
		{
			return [
				'success' => 0, 
				'message' => $validate->messages(),
			];
		}
		else
		{
			//$user=user::where('email',$request->email)->first();
			$user=user::where('email' , '=' , $request->email)->first();	
			if(! $user || ! Hash::check($request->password,$user->password))
			{
				return response()->json([
					'status'=>201,
					'msg'=>"user Login Failed due to Wrong Creadantial"
					]);
			}
			else
			{
				
				if($user->status=="Unblock")
				{
					return response()->json([
					'status'=>200,
					'msg'=>"user Login Success",
					'name'=>$user->name,
					'id'=>$user->id,
					]);
				}
				else
				{
					return response()->json([
					'status'=>201,
					'msg'=>"user Blocked so Login Failed"
					]);
				}	
			}
		}
	
	}
	
	
	
}
