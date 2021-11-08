<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index(){
        $id=Auth::user()->id;
        $clientes = DB::table('clients')
        ->where('id_lawyer', '=', $id)
        ->get();

        return view('usuario.gestionar_cliente.index',compact('clientes'));
    }

    public function create(){
        return view('usuario.gestionar_cliente.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'ci' =>['required'],
            'nombre'=> ['required', 'max:120'],
            'telefono' =>['required'],
        ]);

        $data['id_lawyer']=Auth::user()->id;
        $cliente=Client::create($data);

        return redirect()->route('usuario.clientes');
    }

    public function edit(Client $cliente){
        return view('usuario.gestionar_cliente.edit',compact('cliente'));
    }

    public function update(Request $request,Client $cliente){
        $data=$request->validate([
            'ci' =>['required'],
            'nombre'=> ['required', 'max:120'],
            'telefono' =>['required'],
        ]);
        
        $cliente->update($data);

        return redirect()->route('usuario.clientes');
    }

    public function destroy(Client $cliente){
        $cliente->delete();
        return redirect()->route('usuario.clientes');
    }
}
