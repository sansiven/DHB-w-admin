<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
//here session is also needed in middleware approach because we are accessing the flash messages in views through Session.
use Session;
use Illuminate\Support\Facades\Hash; //add this to check hash password
use App\User; //ass user model

class AdminController extends Controller
{
    //check if login form is submitted.
    //And then use Auth:attempt to check if admin email, password is correct.
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'], 'admin'=>'1'])){
                /* echo "Success"; die; */
                return redirect('/admin/dashboard');
            }else{
                /* echo "Failed"; die; */
                return redirect('/admin')->with('flash_message_error', 'Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }    

    public function settings(){
        return view('admin.settings');
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin' => '1'])->first();
        if(Hash::check($current_password, $check_password->password)){
            echo "true"; die;
        }else{
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password, $check_password->password)){
                $password = bcrypt($data['new_pwd']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success', 'Password Updated Successfully');
            }else{
                return redirect('/admin/settings')->with('flash_message_error', 'Incorrect Current Password');
            }
        }
        
    }

    public function logout(){
        /* cler off all sessions as logout will be done at end , we do not want to keep anything related to admin accessible,
        Then redirect to login page with logout suceess message
        */
        Session::flush();
        return redirect('admin')->with('flash_message_success','Logged out sucessfully.');
    }

} 

/* Protection through Session */

/*  class AdminController extends Controller
{
    //check if login form is submitted.
    //And then use Auth:attempt to check if admin email, password is correct.
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'], 'admin'=>'1'])){
                /* echo "Success"; die; close comment here
                //add adminSession variable at the time of login
                Session::put('adminSession', $data['email']);
                return redirect('/admin/dashboard');
            }else{
                /* echo "Failed"; die; close comment here
                return redirect('/admin')->with('flash_message_error', 'Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard(){
        if(Session::has('adminSession')){
            //Perform all dashboard tasks
            return view('admin.dashboard');
        }else{
            //redirect to login page
            return redirect('/admin')->with('flash_message_error', 'Please login to acess dashboard।');
        }
        
    }    

    public function logout(){
        /* cler off all sessions as logout will be done at end , we do not want to keep anything related to admin accessible,
        Then redirect to login page with logout suceess message
        close comment here
        Session::flush();
        return redirect('admin')->with('flash_message_success','Logged out sucessfully.');
    }

} */
