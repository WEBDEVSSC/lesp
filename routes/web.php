<?php

use App\Http\Controllers\AreaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*******************************************************************************************
 * 
 * 
 * REDIRIGIMOS AUTOMATICAMNTE AL LOGIN
 * 
 * 
 ******************************************************************************************/

Route::get('/', function () {
    return redirect()->route('login');
});

/*******************************************************************************************
 * 
 * 
 * BLOQUEAMOS RUTAS DE ADMINLTE3 AUTH
 * 
 * 
 ******************************************************************************************/

Auth::routes([
    'register' => false, // Desactiva el registro de nuevos usuarios
    'reset' => false, // Desactiva la recuperación de contraseña
    'verify' => false,   // Desactiva la verificación de email
]);

/*******************************************************************************************
 * 
 * 
 * PROTEGEMOS TODAS LAS RUTAS
 * 
 * 
 ******************************************************************************************/

Route::middleware(['auth'])->group(function () 
{
    
/*******************************************************************************************
 * 
 * 
 * RUTA DE INICIO
 * 
 * 
 ******************************************************************************************/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*******************************************************************************************
 * 
 * 
 * RUTA PARA LAS AREAS
 * 
 * 
 ******************************************************************************************/

Route::get('admin/areas/areas-index',[AreaController::class,'areasIndex'])->name('areasIndex');

Route::get('admin/areas/areas-show/{id}',[AreaController::class,'areasShow'])->name('areasShow');

Route::get('admin/areas/areas-create',[AreaController::class,'areasCreate'])->name('areasCreate');

Route::post('admin/areas/areas-store',[AreaController::class,'areasStore'])->name('areasStore');

Route::get('admin/areas/areas-edit/{id}',[AreaController::class,'areasEdit'])->name('areasEdit');

Route::put('admin/areas/areas-update/{id}',[AreaController::class,'areasUpdate'])->name('areasUpdate');

Route::delete('admin/areas/areas-delete/{id}',[AreaController::class,'areasDelete'])->name('areasDelete');


});


