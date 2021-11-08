<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ExpedientController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\TypeOfCaseController;
use App\Http\Controllers\TypeOfProcedureController;
use App\Http\Controllers\UserController;
use App\Models\Administrator;
use App\Models\TypeOfCase;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::prefix('admin')->group(function () {
    
    Route::get('/login',[AdministratorController::class,'loginView'])->name('admin.login.view')->middleware('guest:admin');
    Route::post('/login',[AdministratorController::class,'login'])->name('admin.login')->middleware('guest:admin');
    
    Route::middleware(['auth:admin'])->group(function(){
        Route::post('/logout',[AdministratorController::class,'logout'])->name('admin.logout');

        Route::get('/menu',[AdministratorController::class,'menu'])->name('admin.menu');

        Route::get('/usuarios',[UserController::class,'index'])->name('admin.usuarios');
        Route::get('/usuario/create', [UserController::class,'create'])->name('admin.usuario.create');
        Route::post('/usuario/store', [UserController::class,'store'])->name('admin.usuario.store'); 
        Route::get('/usuario/edit/{usuario}', [UserController::class,'edit'])->name('admin.usuario.edit'); 
        Route::post('/usuario/update/{usuario}', [UserController::class,'update'])->name('admin.usuario.update');
        Route::post('/usuario/delete/{usuario}', [UserController::class,'destroy'])->name('admin.usuario.delete');

        Route::get('/tiposTs',[TypeOfCaseController::class,'index'])->name('admin.tiposTs');
        Route::get('/tiposT/create', [TypeOfCaseController::class,'create'])->name('admin.tiposT.create');
        Route::post('/tiposT/store', [TypeOfCaseController::class,'store'])->name('admin.tiposT.store'); 
        Route::get('/tiposT/edit/{tipo}', [TypeOfCaseController::class,'edit'])->name('admin.tiposT.edit'); 
        Route::post('/tiposT/update/{tipo}', [TypeOfCaseController::class,'update'])->name('admin.tiposT.update');
        Route::post('/tiposT/delete/{tipo}', [TypeOfCaseController::class,'destroy'])->name('admin.tiposT.delete');

        Route::get('/tiposTTs',[TypeOfProcedureController::class,'index'])->name('admin.tiposTTs');
        Route::get('/tiposTT/create', [TypeOfProcedureController::class,'create'])->name('admin.tiposTT.create');
        Route::post('/tiposTT/store', [TypeOfProcedureController::class,'store'])->name('admin.tiposTT.store'); 
        Route::get('/tiposTT/edit/{tipo}', [TypeOfProcedureController::class,'edit'])->name('admin.tiposTT.edit'); 
        Route::post('/tiposTT/update/{tipo}', [TypeOfProcedureController::class,'update'])->name('admin.tiposTT.update');
        Route::post('/tiposTT/delete/{tipo}', [TypeOfProcedureController::class,'destroy'])->name('admin.tiposTT.delete');
   });

});

Route::prefix('usuario')->group(function(){

    Route::get('/login',[UserController::class,'loginView'])->name('usuario.login.view')->middleware('guest:usuario');
    Route::post('/login',[UserController::class,'login'])->name('usuario.login')->middleware('guest:usuario');

    Route::middleware(['auth:usuario'])->group(function(){

        Route::post('/logout',[UserController::class,'logout'])->name('usuario.logout');

        Route::get('/menu',[UserController::class,'menu'])->name('usuario.menu');

        Route::get('/clientes',[ClientController::class,'index'])->name('usuario.clientes');
        Route::get('/clientes/create', [ClientController::class,'create'])->name('usuario.cliente.create');
        Route::post('/clientes/store', [ClientController::class,'store'])->name('usuario.cliente.store'); 
        Route::get('/clientes/edit/{cliente}', [ClientController::class,'edit'])->name('usuario.cliente.edit'); 
        Route::post('/clientes/update/{cliente}', [ClientController::class,'update'])->name('usuario.cliente.update');
        Route::post('/clientes/delete/{cliente}', [ClientController::class,'destroy'])->name('usuario.cliente.delete');

        Route::get('/expedientes/{cliente}',[ExpedientController::class,'index'])->name('usuario.expedientes');
        Route::get('/expedientes/create/{cliente}', [ExpedientController::class,'create'])->name('usuario.expediente.create');
        Route::post('/expedientes/store/{cliente}', [ExpedientController::class,'store'])->name('usuario.expediente.store'); 
        Route::get('/expedientes/edit/{expediente}/{cliente}', [ExpedientController::class,'edit'])->name('usuario.expediente.edit'); 
        Route::post('/expedientes/update/{expediente}/{cliente}', [ExpedientController::class,'update'])->name('usuario.expediente.update');
        Route::post('/expedientes/delete/{expediente}/{cliente}', [ExpedientController::class,'destroy'])->name('usuario.expediente.delete');

        Route::get('/tramites/{expediente}',[ProcedureController::class,'index'])->name('usuario.tramites');
        Route::get('/tramites/create/{expediente}', [ProcedureController::class,'create'])->name('usuario.tramite.create');
        Route::post('/tramites/store/{expediente}', [ProcedureController::class,'store'])->name('usuario.tramite.store'); 
        Route::get('/tramites/edit/{tramite}/{expediente}', [ProcedureController::class,'edit'])->name('usuario.tramite.edit'); 
        Route::post('/tramites/update/{tramite}/{expediente}', [ProcedureController::class,'update'])->name('usuario.tramite.update');
        Route::post('/tramites/delete/{tramite}/{expediente}', [ProcedureController::class,'destroy'])->name('usuario.tramite.delete');

        Route::get('/documentos/{tramite}',[DocumentController::class,'index2'])->name('usuario.documentos');        
    });

});

Route::prefix('procurador')->group(function(){
    
    Route::get('/login',[UserController::class,'loginView2'])->name('procurador.login.view')->middleware('guest:procurador');
    Route::post('/login',[UserController::class,'login2'])->name('procurador.login')->middleware('guest:procurador');

    Route::middleware(['auth:procurador'])->group(function(){

        Route::post('/logout',[UserController::class,'logout2'])->name('procurador.logout');

        Route::get('/menu',[UserController::class,'menu2'])->name('procurador.menu');

        Route::get('/tramites/{expediente}',[ProcedureController::class,'index2'])->name('procurador.tramites');

        Route::get('/documentos/{tramite}',[DocumentController::class,'index'])->name('procurador.documentos');
        Route::get('/documentos/create/{tramite}', [DocumentController::class,'create'])->name('procurador.documento.create');
        Route::post('/documentos/store/{tramite}', [DocumentController::class,'store'])->name('procurador.documento.store'); 
        Route::get('/documentos/edit/{documento}/{tramite}', [DocumentController::class,'edit'])->name('procurador.documento.edit'); 
        Route::post('/documentos/update/{documento}/{tramite}', [DocumentController::class,'update'])->name('procurador.documento.update');
        Route::post('/documentos/delete/{documento}/{tramite}', [DocumentController::class,'destroy'])->name('procurador.documento.delete');

    });
});