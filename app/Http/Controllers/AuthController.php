<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function registerform(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:6|max:12'
            ]
        );

        // echo "<pre>";
        // print_r($request->all());
        // exit;

        $profileName = time().'-vadavision.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('uploads',$profileName);

        $user = new User;
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->profile=$profileName;
        $user->password=Hash::make($request['password']);
        $res = $user->save();
        if($res){
            return back()->with('success','You have been successfully registered with us.');
        }else{
            return back()->with('failed','Something went wrong try again');
        }
        
    }

    public function loginUser(Request $request){
        $request->validate(
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:12'
            ]
        );
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('/');
            }else{
                return back()->with('failed','Password is not correct.'); 
            }
 
        }else{
            return back()->with('failed','This email is not registered with us.'); 
        }
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/');
        }
    }
}
