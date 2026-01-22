<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\UsuarioController;
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

/*******************************************************************************************
 * 
 * 
 * RUTA PARA LOS TIPOS DE DOCUENTOS
 * 
 * 
 ******************************************************************************************/

Route::get('admin/tipos-documentos/tipo-documento-index',[TipoDocumentoController::class,'tiposDocumentosIndex'])->name('tiposDocumentosIndex');

Route::get('admin/tipos-documentos/tipo-documento-show/{id}',[TipoDocumentoController::class,'tiposDocumentosShow'])->name('tiposDocumentosShow');

Route::get('admin/tipos-documentos/tipo-documento-create',[TipoDocumentoController::class,'tiposDocumentosCreate'])->name('tiposDocumentosCreate');

Route::post('admin/tipos-documentos/tipo-documento-store',[TipoDocumentoController::class,'tiposDocumentosStore'])->name('tiposDocumentosStore');

Route::get('admin/tipos-documentos/tipo-documento-edit/{id}',[TipoDocumentoController::class,'tiposDocumentosEdit'])->name('tiposDocumentosEdit');

Route::put('admin/tipos-documentos/tipo-documento-update/{id}',[TipoDocumentoController::class,'tiposDocumentosUpdate'])->name('tiposDocumentosUpdate');

Route::delete('admin/tipos-documentos/tipo-documento-delete/{id}',[TipoDocumentoController::class,'tiposDocumentosDelete'])->name('tiposDocumentosDelete');

/*******************************************************************************************
 * 
 * 
 * RUTA PARA LOS USUARIOS
 * 
 * 
 ******************************************************************************************/

Route::get('admin/usuarios/usuarios-index',[UsuarioController::class,'usuariosIndex'])->name('usuariosIndex');

Route::get('admin/usuarios/usuarios-show/{id}',[UsuarioController::class,'usuariosShow'])->name('usuariosShow');

Route::get('admin/usuarios/usuarios-create',[UsuarioController::class,'usuariosCreate'])->name('usuariosCreate');

Route::post('admin/usuarios/usuarios-store',[UsuarioController::class,'usuariosStore'])->name('usuariosStore');

Route::get('admin/usuarios/usuarios-edit/{id}',[UsuarioController::class,'usuariosEdit'])->name('usuariosEdit');

Route::put('admin/usuarios/usuarios-update/{id}',[UsuarioController::class,'usuariosUpdate'])->name('usuariosUpdate');

Route::delete('admin/usuarios/usuarios-delete/{id}',[UsuarioController::class,'usuariosDelete'])->name('usuariosDelete');

/*******************************************************************************************
 * 
 * 
 * RUTA PARA LOS DOCUMENTOS
 * 
 * 
 ******************************************************************************************/

Route::get('admin/documentos/documentos-index',[DocumentoController::class,'documentosIndex'])->name('documentosIndex');

Route::get('admin/documentos/documentos-show/{id}',[DocumentoController::class,'documentosShow'])->name('documentosShow');

Route::get('admin/documentos/documentos-create',[DocumentoController::class,'documentosCreate'])->name('documentosCreate');

Route::post('admin/documentos/documentos-store',[DocumentoController::class,'documentosStore'])->name('documentosStore');

Route::get('admin/documentos/documentos-edit/{id}',[DocumentoController::class,'documentosEdit'])->name('documentosEdit');

Route::put('admin/documentos/documentos-update/{id}',[DocumentoController::class,'documentosUpdate'])->name('documentosUpdate');

Route::delete('admin/documentos/documentos-delete/{id}',[DocumentoController::class,'documentosDelete'])->name('documentosDelete');


});


