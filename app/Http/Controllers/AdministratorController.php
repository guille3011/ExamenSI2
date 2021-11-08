<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdministratorController extends Controller
{
    public function loginView(){
        return view('admin.login');
    }

    public function login(Request $request){
        $validacion=$request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $admin=Administrator::where('email',$request->email)->first(); 

        if(is_null($admin)){
            return back()->withErrors(['error' => 'El Usuario no existe']);
        }

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin.menu');
        }

        return back()->withErrors(['error' => 'El password es incorrecto']);    

    }

    public function menu(){
        return view('admin.menu');
    }

    public function logout(){

        Auth::guard('admin')->logout();
        return redirect()->route('index');
    }
}
