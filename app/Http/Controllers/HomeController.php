<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use App\Models\Todo;

class HomeController extends Controller
{
   public function index(){
      $data = Array();
      $tododata = Array();
      if(Session::has('loginId')){
         $data = User::where('id','=',Session::get('loginId'))->first();
         $tododata = Todo::where('user_id','=',Session::get('loginId'))->get();
      }
     
      return view('home',compact('data','tododata'));
   }
   

   public function todo(){
      $data = Array();
      if(Session::has('loginId')){
         $data = User::where('id','=',Session::get('loginId'))->first();
      }
      return view('todo',compact('data'));
   }

   public function addtodo(Request $request){
      $request->validate(
         [
             'title'=>'required',
             'description'=>'required',
         ]
      );
      $data = new Todo;
      $data->title=$request['title'];
      $data->description=$request['description'];
      $data->status=1;
      $data->user_id=Session::get('loginId');
      $res = $data->save();
        if($res){
            return back()->with('success','Todo created.');
        }else{
            return back()->with('failed','Something went wrong try again');
        }
      
   }
}
