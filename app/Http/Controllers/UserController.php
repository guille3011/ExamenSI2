<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function index(){
        $usuarios=User::all();
        return view('admin.gestionar_usuario.index', compact('usuarios'));
    }

    public function create(){
        return view('admin.gestionar_usuario.create');
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=> ['required', 'max:120'],
            'email'=> ['required', 'unique:users,email'],
            'password'=>['required' ,'min:6'],
            'cargo' => ['required'],
        ]);

        $data['password']=Hash::make($request->password);

        $usuario=User::create($data);

        return redirect()->route('admin.usuarios');
    }

    public function edit(User $usuario){
        return view('admin.gestionar_usuario.edit',compact('usuario'));
    }

    public function update(Request $request,User $usuario){
        $data=$request->validate([
            'name'=> ['required', 'max:120'],
            'email'=> ['required'],
            'cargo'=> ['required'],
        ]);

        if(!is_null($request->password)){
            $data['password']=Hash::make($request->password);
        }

        $usuario_email=User::where('email',$request->email)->where('id','!=',$usuario->id)->first();

        if(!is_null($usuario_email)){
            return back()->withErrors(['error' => 'El email ya pertenece a otro usuario']);  
        }
        $usuario->update($data);

        return redirect()->route('admin.usuarios');
    }

    public function destroy(User $usuario){
        $usuario->delete();
        return redirect()->route('admin.usuarios');
    }

    //-------------------------------------------------------------------------------------------------------------------//

    public function loginView(){
        return view('usuario.login');
    }

    public function login(Request $request){
        $validacion=$request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $usuario=User::where('email',$request->email)->first(); 

        if(is_null($usuario)){
            return back()->withErrors(['error' => 'El Usuario no existe']);
        }

        if(Auth::guard('usuario')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('usuario.menu');
        }

        return back()->withErrors(['error' => 'El password es incorrecto']);    

    }

    public function menu(){
        $id=Auth::user()->id;
        $clientes = DB::table('clients')
        ->where('id_lawyer', '=', $id)
        ->get();

        return view('usuario.menu',compact('clientes'));
    }

    public function logout(){
        Auth::guard('usuario')->logout();
        return redirect()->route('index');
    }


//----------------------------------------------------------------------------------------------------------


public function loginView2(){
    return view('procurador.login');
}

    public function login2(Request $request){
        $validacion=$request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $usuario=User::where('email',$request->email)->first(); 

        if(is_null($usuario)){
            return back()->withErrors(['error' => 'El Usuario no existe']);
        }

        if(Auth::guard('procurador')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('procurador.menu');
        }

        return back()->withErrors(['error' => 'El password es incorrecto']);    

    }

    public function menu2(){
        $id=Auth::user()->id;
        $expedientes = DB::table('expedients')
        ->where('id_procurator', '=', $id)
        ->orderBy('fecha_creacion', 'desc')
        ->get();

        return view('procurador.menu',compact('expedientes'));
    }

    public function logout2(){
        Auth::guard('procurador')->logout();
        return redirect()->route('index');
    }

}