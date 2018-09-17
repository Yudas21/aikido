<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function index(){
      return view('admin.login');
    }

    public function checkLogin(Request $request){
      $this->validate($request, [
           'email' => 'required',
           'password' => 'required'
      ]);
      if($request->email == '' || $request->password == ''){
        return redirect('login')->with('message','Email atau Password salah tidak boleh kosong!');
      } else {
        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
          $user_data = User::where('email', $request->email)->first();
          $name = $user_data->name;
          $uid = $user_data->id;
          $level = $user_data->level; 
          $status = $user_data->status;
          if($status == 0){
            return redirect('login')->with('message','Akun anda tidak aktif, silakan hubungi Administrator!');
          } else {
            $data = array(
                          'name' => $name,
                          'level' => $level,
                          'uid' => $uid,
                          'emai' => $request->email,
                          'password' => $request->password
            );
            session($data);
            return redirect('admin/dashboard');  
          }
          
        } else {
          return redirect('login')->with('message','Email atau Password salah!');
        }  
      }
      

    }

    public function forgotPassword(){
      return view('admin.forgot');
    }

    public function pForgotPassword(Request $request){
      $this->validate($request, [
            'username' => 'required'
        ]);
      if(User::where('email', $request->username)->count() == 0){
        return redirect('login/forgotpassword')->with('message', 'Data anda belum ada, silakan untuk menghubungi Administrator!');
      } else {
        return redirect('login/forgotpassword')->with('message', 'Data sedang diproses, Administrator akan segera menghubungi anda!');
      }
      
    }

}
