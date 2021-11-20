<?php

namespace App\Http\Controllers;

use App\Http\CustomClass\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginPage(){
        $isGuest = true;
        $datas = 'login';
        return view('display.login-display', compact('isGuest', 'datas'));
    }

    public function register(){
        $isGuest = true;
        $datas = 'login';
        return view('display.register-display', compact('isGuest', 'datas'));
    }

    public function doRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'email'             => 'required|email',
            'password'          => 'required',
            'name'              => 'required|max:255',
            'role'              => 'required',

        ]);

        if(!$validator->fails()){
            if($request->role !== 'none'){
                $checkEmailRegistered = DB::table('users')
                        ->where('email', $request->email)
                        ->first();

                        if(!isset($checkEmailRegistered)){
                            
                            $userId   =   DB::table('users')
                                            ->insertGetId([
                                                'name'      =>  $request->name,
                                                'role'      =>  $request->role,
                                                'email'     =>  $request->email,
                                                'password'  =>  bcrypt($request->password),
                                            ]);
                            Record::saveLog($userId, $request->email, $request->name, 'register as '. $request->role);
                            return redirect()->to('login-page');
                        }
            }
        }

        $request->session()->flash('error', 'Terjadi kesalahan');
                return redirect()->to('register');

    }

    public function login(Request $request)
    {
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
      

        if (Auth::attempt($data)) {
            $userId     =   Auth::user()->id;
            $role       =   Auth::user()->role;
            $name       =   Auth::user()->name;
            $email      =   Auth::user()->email;

            Record::saveLog($userId, $email, $name, 'logged as '.$role);
            $request->session()->put('name', $name);
            
            if ($role == "admin") {
                return redirect()->to('home-admin');
            } else if ($role == "staff"){
                return redirect()->to('home-staff');
            }

            
        } else {
            $request->session()->flash('error', 'Email atau password salah');

            return redirect('login-page');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

   
}
