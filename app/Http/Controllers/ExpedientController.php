<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Expedient;
use App\Models\TypeOfCase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpedientController extends Controller
{
    
    public function index(Client $cliente){

        $id=Auth::user()->id;
       /* $id_cliente = DB::table('clients')
             ->select('id')
             ->where('id_lawyer', '=', $id)
             ->get();
        */

        $expedientes = DB::table('expedients')
        ->where('id_client', '=', $cliente->id)
        ->orderBy('fecha_creacion', 'desc')
        //->orWhere('id_procurator', '=', $id)
        ->get();
        return view('usuario.gestionar_expedientes.index',compact('expedientes','cliente'));  //aqui puede ser error
    }

    public function create(Client $cliente){
        $users=DB::table('users')
        ->where('cargo','=','Procurador')
        ->get();

        $tipos=TypeOfCase::all();
        return view('usuario.gestionar_expedientes.create',compact('users','tipos','cliente'));
    }

    public function store(Request $request, Client $cliente)
    {
        $data=$request->validate([
            'nombre' =>['required'],
            'id_typecase'=> ['required'],
            'fecha_creacion' =>['required'],
            'estado' =>['required'],
            'id_procurator' =>['required'],
        ]);

        $data['id_lawyer']=Auth::user()->id;
        $data['id_client']=$cliente->id;

        $expediente=Expedient::create($data);

        return redirect()->route('usuario.expedientes' ,compact('cliente'));
    }

    public function edit(Expedient $expediente, Client $cliente){
        $users=DB::table('users')
        ->where('cargo','=','Procurador')
        ->get();

        $tipos=TypeOfCase::all();
        return view('usuario.gestionar_expedientes.edit',compact('expediente','users','tipos','cliente'));
    }

    public function update(Request $request, Expedient $expediente,Client $cliente){
        $data=$request->validate([
            'nombre' =>['required'],
            'id_typecase'=> ['required'],
            'fecha_creacion' =>['required'],
            'estado' =>['required'],
            'id_procurator' =>['required'],
        ]);
        
        $expediente->update($data);

        return redirect()->route('usuario.expedientes',compact('cliente'));
    }

    public function destroy(Expedient $expediente,Client $cliente){
        $expediente->delete();
        return redirect()->route('usuario.expedientes',compact('cliente'));
    }
}
