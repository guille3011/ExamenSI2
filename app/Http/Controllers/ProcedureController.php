<?php

namespace App\Http\Controllers;

use App\Models\Expedient;
use App\Models\Procedure;
use App\Models\TypeOfProcedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcedureController extends Controller
{
    public function index(Expedient $expediente){
        $tramites=DB::table('procedures')
        ->where('id_expedient','=',$expediente->id)
        ->orderBy('fecha_creacion', 'desc')
        ->get();

        return view('usuario.gestionar_tramites.index',compact('tramites','expediente'));
    }

    public function create(Expedient $expediente){
        $tipos=TypeOfProcedure::all();
        return view('usuario.gestionar_tramites.create',compact('tipos','expediente'));
    }

    public function store(Request $request, Expedient $expediente){
        $data=$request->validate([
            'nombre' =>['required'],
            'id_typeprocedure'=> ['required'],
            'fecha_creacion' =>['required'],
            'estado' =>['required'],
        ]);

        $data['id_expedient']=$expediente->id;

        $tramite=Procedure::create($data);
        return redirect()->route('usuario.tramites' ,compact('expediente'));
    }

    public function edit(Procedure $tramite, Expedient $expediente){

        $tipos=TypeOfProcedure::all();
        return view('usuario.gestionar_tramites.edit',compact('tipos','expediente','tramite'));
    }

    public function update(Request $request,Procedure $tramite,Expedient $expediente){
        $data=$request->validate([
            'nombre' =>['required'],
            'id_typeprocedure'=> ['required'],
            'fecha_creacion' =>['required'],
            'estado' =>['required'],
        ]);

        $tramite->update($data);
        return redirect()->route('usuario.tramites' ,compact('expediente'));
    }

    public function destroy(Procedure $tramite,Expedient $expediente){
        $tramite->delete();
        return redirect()->route('usuario.tramites' ,compact('expediente'));
    }

   //----------------------------------------------------------------------------------------
   
   public function index2(Expedient $expediente){
    $tramites=DB::table('procedures')
    ->where('id_expedient','=',$expediente->id)
    ->get();

    return view('procurador.tramites',compact('tramites','expediente'));
}
}
