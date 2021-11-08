<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
   public function index(Procedure $tramite){
        $documentos=DB::table('documents')
        ->where('id_procedure','=',$tramite->id)
        ->get();

        return view('procurador.gestionar_documentos.index',compact('documentos','tramite'));
   }

   public function create(Procedure $tramite){
       return view('procurador.gestionar_documentos.create',compact('tramite'));
   }

   public function store(Request $request, Procedure $tramite){
    
        $data=$request->validate([
            'nombre' => ['required'],
            'descripcion' => ['required'],
        ]);

        $data['id_procedure']=$tramite->id;

        if(is_null($request->url_imagen) && is_null($request->url_archivo)){
            return back()->withErrors(['error' => 'Introduce o una imagen o un archivo']);
        }

        if($request->hasFile('url_imagen')){
            $data['url_imagen']=Storage::disk('public')->put('imagenes',$request->url_imagen);
        }

        if($request->hasFile('url_archivo')){
            $data['url_archivo']=Storage::disk('public')->put('archivos',$request->url_archivo);
        }

        $documento=Document::create($data);
        return redirect()->route('procurador.documentos',compact('tramite'));
   }

   public function edit(Document $documento,Procedure $tramite){
        return view('procurador.gestionar_documentos.edit',compact('documento','tramite'));
   }

   public function update(Request $request,Document $documento,Procedure $tramite){
    $data = $request->validate([
        'nombre' => ['required'],
        'descripcion' => ['required'],
    ]);

    if ($request->hasFile('url_imagen')) {
        if (!is_null($documento->imagen)) {
            Storage::disk('public')->delete($documento->url_imagen);
        }

        $data['url_imagen'] = Storage::disk('public')->put('imagenes', $request->url_imagen);
    }

    if ($request->hasFile('url_archivo')) {
        if (!is_null($documento->url_archivo)) {
            Storage::disk('public')->delete($documento->url_archivo);
        }
        $data['url_archivo'] = Storage::disk('public')->put('archivos', $request->url_archivo);
    }

    $documento->update($data);
    
    return redirect()->route('procurador.documentos',compact('documento','tramite'));
   }

   public function destroy(Document $documento, Procedure $tramite){
    
    if (!is_null($documento->url_imagen)) {
        Storage::disk('public')->delete($documento->url_imagen);
    }

    if (!is_null($documento->url_archivo)) {
        Storage::disk('public')->delete($documento->url_archivo);
    }

    $documento->delete();
    return redirect()->route('procurador.documentos',compact('documento','tramite'));
   }

   //------------------------------------------------------------------------------ABOGADO

   public function index2(Procedure $tramite){
    $documentos=DB::table('documents')
    ->where('id_procedure','=',$tramite->id)
    ->get();

    return view('usuario.documentos',compact('documentos','tramite'));
}
}
