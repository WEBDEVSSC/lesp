<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    //
    public function areasIndex()
    {
        $areas = Area::all();

        return view('areas.index', compact('areas'));
    }

    public function areasShow($id)
    {
        $area = Area::findOrFail($id);

        return view('areas.show', compact('area'));
    }

    public function areasCreate()
    {
        return view('areas.create');
    }

    public function areasStore(Request $request)
    {
        $request->validate([
            'siglas' => 'max:30|required|string',
            'nombre' => 'max:100|required|string',
            'responsable' => 'max:100|required|string',
            'contacto' => 'max:100|required|string',
        ],[
            'siglas.required'      => 'Las siglas son obligatorias.',
            'siglas.max'           => 'Las siglas no deben superar los 30 caracteres.',

            'nombre.required'      => 'El nombre del área es obligatorio.',
            'nombre.max'           => 'El nombre no debe superar los 100 caracteres.',

            'responsable.required' => 'El responsable es obligatorio.',
            'responsable.max'      => 'El responsable no debe superar los 100 caracteres.',

            'contacto.required'    => 'El contacto es obligatorio.',
            'contacto.max'         => 'El contacto no debe superar los 100 caracteres.',
        ]);

        $area = new Area();

        $area->siglas = $request->siglas;
        $area->nombre = $request->nombre;
        $area->responsable = $request->responsable;
        $area->contacto = $request->contacto;

        $area->save();

        return redirect()->route('areasIndex')->with('success', 'Área registrada correctamente');
    }

    public function areasEdit($id)
    {
        $area = Area::findOrFail($id);

        return view('areas.edit', compact('area'));
    }

    public function areasUpdate(Request $request,$id)
    {
        $request->validate([
            'siglas' => 'max:30|required|string',
            'nombre' => 'max:100|required|string',
            'responsable' => 'max:100|required|string',
            'contacto' => 'max:100|required|string',
        ],[
            'siglas.required'      => 'Las siglas son obligatorias.',
            'siglas.max'           => 'Las siglas no deben superar los 30 caracteres.',

            'nombre.required'      => 'El nombre del área es obligatorio.',
            'nombre.max'           => 'El nombre no debe superar los 100 caracteres.',

            'responsable.required' => 'El responsable es obligatorio.',
            'responsable.max'      => 'El responsable no debe superar los 100 caracteres.',

            'contacto.required'    => 'El contacto es obligatorio.',
            'contacto.max'         => 'El contacto no debe superar los 100 caracteres.',
        ]);

        $area = Area::findOrFail($id);

        $area->siglas = $request->siglas;
        $area->nombre = $request->nombre;
        $area->responsable = $request->responsable;
        $area->contacto = $request->contacto;

        $area->save();

        return redirect()->route('areasIndex')->with('success', 'Área actualizada correctamente');
    }

    public function areasDelete($id)
    {
        $area = Area::findOrFail($id);

        $area->delete();

        return redirect()->route('areasIndex')->with('success', 'Área eliminada correctamente');
    }
}
