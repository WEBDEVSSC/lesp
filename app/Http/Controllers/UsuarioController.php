<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    //
    public function usuariosIndex()
    {
        $usuarios = User::all();

        return view('usuarios.index', compact('usuarios'));
    }

    public function usuariosCreate()
    {
        $areas = Area::All();

        return view('usuarios.create', compact('areas'));
    }

    public function usuariosStore(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:60|string',
            'curp' => 'required|max:18|string',
            'email'=> 'required|max:30|email',
            'area_id' => 'required|integer',
            'rol' => 'required|string',
        ],[
            'nombre.required'  => 'El nombre es obligatorio.',
            'nombre.string'    => 'El nombre debe ser texto.',
            'nombre.max'       => 'El nombre no debe exceder 60 caracteres.',

            'curp.required'    => 'La CURP es obligatoria.',
            'curp.string'      => 'La CURP debe ser texto.',
            'curp.size'        => 'La CURP debe contener exactamente 18 caracteres.',

            'email.required'   => 'El correo electrónico es obligatorio.',
            'email.email'      => 'Ingrese un correo electrónico válido.',
            'email.max'        => 'El correo electrónico no debe exceder 30 caracteres.',

            'area_id.required' => 'Debe seleccionar un área.',
            'area_id.integer'  => 'El área seleccionada no es válida.',
            'area_id.exists'   => 'El área seleccionada no existe.',

            'rol.required'     => 'Debe seleccionar un rol.',
            'rol.string'       => 'El rol no es válido.',
            'rol.in'           => 'El rol seleccionado no es válido.',
        ]);

        $usuario = new User();

        $usuario->id_area = $request->area_id;
        $usuario->rol = $request->rol;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->curp = $request->curp;
        $usuario->password = Hash::make($request->curp);

        $usuario->save();

        return redirect()->route('usuariosIndex')->with('success', 'Usuario registrado correctamente');
    }

    public function usuariosShow($id)
    {
        $usuario = User::findOrFail($id);

        return view('usuarios.show', compact('usuario'));
    }

    public function usuariosEdit($id)
    {
        $usuario = User::findOrFail($id);

        $areas = Area::all();

        return view('usuarios.edit', compact('usuario', 'areas'));
    }

    public function usuariosUpdate(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:60|string',
            'curp' => 'required|max:18|string',
            'email'=> 'required|max:30|email',
            'area_id' => 'required|integer',
            'rol' => 'required|string',
        ],[
            'nombre.required'  => 'El nombre es obligatorio.',
            'nombre.string'    => 'El nombre debe ser texto.',
            'nombre.max'       => 'El nombre no debe exceder 60 caracteres.',

            'curp.required'    => 'La CURP es obligatoria.',
            'curp.string'      => 'La CURP debe ser texto.',
            'curp.size'        => 'La CURP debe contener exactamente 18 caracteres.',

            'email.required'   => 'El correo electrónico es obligatorio.',
            'email.email'      => 'Ingrese un correo electrónico válido.',
            'email.max'        => 'El correo electrónico no debe exceder 30 caracteres.',

            'area_id.required' => 'Debe seleccionar un área.',
            'area_id.integer'  => 'El área seleccionada no es válida.',
            'area_id.exists'   => 'El área seleccionada no existe.',

            'rol.required'     => 'Debe seleccionar un rol.',
            'rol.string'       => 'El rol no es válido.',
            'rol.in'           => 'El rol seleccionado no es válido.',
        ]);

        $usuario = User::findOrFail($id);

        $usuario->id_area = $request->area_id;
        $usuario->rol = $request->rol;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->curp = $request->curp;
        $usuario->password = Hash::make($request->curp);

        $usuario->save();

        return redirect()->route('usuariosIndex')->with('success', 'Usuario actualizado correctamente');
    }

    public function usuariosDelete($id)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect()->route('usuariosIndex')->with('success', 'Usuario eliminado correctamente');
    }
}
