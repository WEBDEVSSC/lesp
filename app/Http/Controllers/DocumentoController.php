<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Documento;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    //
    public function documentosIndex()
    {
        $documentos = Documento::all();

        return view('documentos.index', compact('documentos'));
    }

    public function documentosCreate()
    {
        $areas = Area::all();

        $tipos = TipoDocumento::all();

        return view('documentos.create', compact('areas', 'tipos'));
    }

    public function documentosStore(Request $request)
    {
        $request->validate([
            'nombre'          => 'required|string|max:100',
            'area_id'         => 'required|integer',
            'tipo_id'         => 'required|integer',
            'clave'           => 'required|string|max:100',
            'revision'        => 'required|string|max:100',
            'vigencia'        => 'required|date',
            'fecha_revision'  => 'required|date',
            'sustituye'       => 'required|string|max:100',
            'privacidad'      => 'required|integer',
            'documento'       => ['required','file','mimes:pdf,mp4,mov,avi,mkv,xls,xlsx,doc,docx,ppt,pptx,jpg,jpeg,png','max:51200'],
        ],[
             // nombre
            'nombre.required' => 'El nombre del documento es obligatorio.',
            'nombre.string'   => 'El nombre debe ser un texto válido.',
            'nombre.max'      => 'El nombre no debe exceder los 100 caracteres.',

            // área
            'area_id.required' => 'Debe seleccionar un área.',
            'area_id.integer'  => 'El área seleccionada no es válida.',

            // tipo
            'tipo_id.required' => 'Debe seleccionar un tipo de documento.',
            'tipo_id.integer'  => 'El tipo de documento no es válido.',

            // clave
            'clave.required' => 'La clave del documento es obligatoria.',
            'clave.string'   => 'La clave debe ser un texto válido.',
            'clave.max'      => 'La clave no debe exceder los 100 caracteres.',

            // revisión
            'revision.required' => 'La revisión es obligatoria.',
            'revision.string'   => 'La revisión debe ser un texto válido.',
            'revision.max'      => 'La revisión no debe exceder los 100 caracteres.',

            // vigencia
            'vigencia.required' => 'La fecha de vigencia es obligatoria.',
            'vigencia.date'     => 'La fecha de vigencia no es válida.',

            // fecha de revisión
            'fecha_revision.required' => 'La fecha de revisión es obligatoria.',
            'fecha_revision.date'     => 'La fecha de revisión no es válida.',

            // sustituye
            'sustituye.required' => 'El campo sustituye es obligatorio.',
            'sustituye.string'   => 'El campo sustituye debe ser texto.',
            'sustituye.max'      => 'El campo sustituye no debe exceder los 100 caracteres.',

            // privacidad
            'privacidad.required' => 'Debe indicar el nivel de privacidad.',
            'privacidad.integer'  => 'La privacidad seleccionada no es válida.',

            // documento
            'documento.required' => 'Debe adjuntar un documento.',
            'documento.file'     => 'El archivo adjunto no es válido.',
            'documento.mimes'    => 'El archivo debe ser PDF, video, Excel, Word, PowerPoint o imagen.',
            'documento.max'      => 'El archivo no debe superar los 50 MB.',
        ]);

        $rutaArchivo = null;

        if ($request->hasFile('documento')) 
        {
            $archivo = $request->file('documento');

            $nombreOriginal = pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $archivo->getClientOriginalExtension();

            $fecha = now()->format('Ymd_His');

            $nombreArchivo = Str::slug($nombreOriginal) . '_' . $fecha . '.' . $extension;

            $rutaArchivo = $archivo->storeAs('documentos', $nombreArchivo, 'public');
        }

        $documento = new Documento();

        $documento->nombre = $request->nombre;
        $documento->departamento = $request->area_id;
        $documento->tipo = $request->tipo_id;
        $documento->clave = $request->clave;
        $documento->revision = $request->revision;
        $documento->vigencia = $request->vigencia;
        $documento->fecha_revision = $request->fecha_revision;
        $documento->sustituye = $request->sustituye;
        $documento->documento = $rutaArchivo;
        $documento->status = $request->privacidad;

        $documento->save();

        return redirect()->route('documentosIndex')->with('success', 'Documento publicado correctamente');
    }

    public function documentosShow($id)
    {
        $documento = Documento::findOrFail($id);

        return view('documentos.show', compact('documento'));
    }

    public function documentosEdit($id)
    {
        $documento = Documento::findOrFail($id);

        $areas = Area::all();

        $tipos = TipoDocumento::all();

        return view('documentos.edit', compact('documento', 'areas', 'tipos'));
    }

    public function documentosUpdate(Request $request, $id)
    {
        $request->validate([
            'nombre'          => 'required|string|max:100',
            'area_id'         => 'required|integer',
            'tipo_id'         => 'required|integer',
            'clave'           => 'required|string|max:100',
            'revision'        => 'required|string|max:100',
            'vigencia'        => 'required|date',
            'fecha_revision'  => 'required|date',
            'sustituye'       => 'required|string|max:100',
            'privacidad'      => 'required|integer',
            'documento'       => ['nullable','file','mimes:pdf,mp4,mov,avi,mkv,xls,xlsx,doc,docx,ppt,pptx,jpg,jpeg,png','max:51200'],
        ],[
             // nombre
            'nombre.required' => 'El nombre del documento es obligatorio.',
            'nombre.string'   => 'El nombre debe ser un texto válido.',
            'nombre.max'      => 'El nombre no debe exceder los 100 caracteres.',

            // área
            'area_id.required' => 'Debe seleccionar un área.',
            'area_id.integer'  => 'El área seleccionada no es válida.',

            // tipo
            'tipo_id.required' => 'Debe seleccionar un tipo de documento.',
            'tipo_id.integer'  => 'El tipo de documento no es válido.',

            // clave
            'clave.required' => 'La clave del documento es obligatoria.',
            'clave.string'   => 'La clave debe ser un texto válido.',
            'clave.max'      => 'La clave no debe exceder los 100 caracteres.',

            // revisión
            'revision.required' => 'La revisión es obligatoria.',
            'revision.string'   => 'La revisión debe ser un texto válido.',
            'revision.max'      => 'La revisión no debe exceder los 100 caracteres.',

            // vigencia
            'vigencia.required' => 'La fecha de vigencia es obligatoria.',
            'vigencia.date'     => 'La fecha de vigencia no es válida.',

            // fecha de revisión
            'fecha_revision.required' => 'La fecha de revisión es obligatoria.',
            'fecha_revision.date'     => 'La fecha de revisión no es válida.',

            // sustituye
            'sustituye.required' => 'El campo sustituye es obligatorio.',
            'sustituye.string'   => 'El campo sustituye debe ser texto.',
            'sustituye.max'      => 'El campo sustituye no debe exceder los 100 caracteres.',

            // privacidad
            'privacidad.required' => 'Debe indicar el nivel de privacidad.',
            'privacidad.integer'  => 'La privacidad seleccionada no es válida.',

            // documento
            'documento.required' => 'Debe adjuntar un documento.',
            'documento.file'     => 'El archivo adjunto no es válido.',
            'documento.mimes'    => 'El archivo debe ser PDF, video, Excel, Word, PowerPoint o imagen.',
            'documento.max'      => 'El archivo no debe superar los 50 MB.',
        ]);

        $documento = Documento::findOrFail($id);

        if ($request->hasFile('documento')) 
        {
            if ($documento->documento && Storage::disk('public')->exists($documento->documento)) 
            {
                Storage::disk('public')->delete($documento->documento);
            }    
        
            $archivo = $request->file('documento');

            $nombreOriginal = pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $archivo->getClientOriginalExtension();
            $fecha = now()->format('Ymd_His');

            $nombreArchivo = Str::slug($nombreOriginal) . '_' . $fecha . '.' . $extension;

            $documento->documento = $archivo->storeAs('documentos', $nombreArchivo, 'public');
        }

        $documento->nombre = $request->nombre;
        $documento->departamento = $request->area_id;
        $documento->tipo = $request->tipo_id;
        $documento->clave = $request->clave;
        $documento->revision = $request->revision;
        $documento->vigencia = $request->vigencia;
        $documento->fecha_revision = $request->fecha_revision;
        $documento->sustituye = $request->sustituye;
        $documento->status = $request->privacidad;

        $documento->save();

        return redirect()->route('documentosIndex')->with('success', 'Documento publicado correctamente');
    }

    public function documentosDelete($id)
    {
        $documento = Documento::findOrFail($id);

        if ($documento->documento && Storage::disk('public')->exists($documento->documento)) 
        {
            Storage::disk('public')->delete($documento->documento);
        }

        $documento->delete();

        return redirect()->route('documentosIndex')->with('success', 'Documento eliminado correctamente');
    }
}
