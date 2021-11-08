<?php

namespace App\Http\Controllers;

use App\Models\TypeOfProcedure;
use Illuminate\Http\Request;

class TypeOfProcedureController extends Controller
{
 
    public function index()
    {
        $tipos=TypeOfProcedure::all();
        return view('admin.gestionar_tipo_tramite.index',compact('tipos'));
    }

    public function create(){
        return view('admin.gestionar_tipo_tramite.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'nombre'=> ['required', 'max:120'],
        ]);

        $tipo=TypeOfProcedure::create($data);

        return redirect()->route('admin.tiposTTs');
    }

    public function edit(TypeOfProcedure $tipo){
        return view('admin.gestionar_tipo_tramite.edit',compact('tipo'));
    }

    public function update(Request $request,TypeOfProcedure $tipo){
        $data=$request->validate([
            'nombre'=> ['required', 'max:120'],
        ]);

        $tipo->update($data);

        return redirect()->route('admin.tiposTTs');
    }
    
    public function destroy(TypeOfProcedure $tipo){
        $tipo->delete();
        return redirect()->route('admin.tiposTTs');
    }

}
