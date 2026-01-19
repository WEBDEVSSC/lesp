<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    //
    public function tiposDocumentosIndex()
    {
        $tiposDocumentos = TipoDocumento::all();

        return view('tipos-documentos.index', compact('tiposDocumentos'));
    }

    public function tiposDocumentosCreate()
    {
        return view('tipos-documentos.create');
    }

    public function tiposDocumentosStore(Request $request)
    {
        $request->validate([
            'tipo' => 'required|max:30|string',
        ],[
            'tipo.required' => 'El campo tipo de documento es obligatorio.',
            'tipo.max'      => 'El tipo de documento no debe exceder los 30 caracteres.',
            'tipo.string'   => 'El tipo de documento debe ser un texto válido.',
        ]);

        $tipoDocumento = new TipoDocumento();

        $tipoDocumento->tipo = $request->tipo;

        $tipoDocumento->save();

        return redirect()->route('tiposDocumentosIndex')->with('success', 'Tipo de documento registrado correctamente');
    }   

    public function tiposDocumentosShow($id)
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);

        return view('tipos-documentos.show', compact('tipoDocumento'));
    }

    public function tiposDocumentosEdit($id)
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);

        return view('tipos-documentos.edit', compact('tipoDocumento'));
    }

    public function tiposDocumentosUpdate(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required|max:30|string',
        ],[
            'tipo.required' => 'El campo tipo de documento es obligatorio.',
            'tipo.max'      => 'El tipo de documento no debe exceder los 30 caracteres.',
            'tipo.string'   => 'El tipo de documento debe ser un texto válido.',
        ]);

        $tipoDocumento = TipoDocumento::findOrFail($id);

        $tipoDocumento->tipo = $request->tipo;

        $tipoDocumento->save();

        return redirect()->route('tiposDocumentosIndex')->with('success', 'Tipo de documento actualizado correctamente');
    }

    public function tiposDocumentosDelete($id)
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);

        $tipoDocumento->delete();

        return redirect()->route('tiposDocumentosIndex')->with('success', 'Tipo de documento eliminado correctamente');
    }
}
