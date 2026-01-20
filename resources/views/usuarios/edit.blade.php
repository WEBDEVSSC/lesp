@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Usuarios</strong><small class="text-muted"> Editar registro</small></h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('usuariosIndex') }}" class="btn btn-info btn-sm">
                <i class="fa-solid fa-list"></i> PANEL DE CONTROL
            </a>
        </div>
        <div class="card-body">

            <form action="{{route('usuariosUpdate', $usuario->id)}}" method="POST">

            @csrf

            @method('PUT')

            <div class="row">
                <div class="col-md-3">
                    <p><strong>Nombre</strong></p>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $usuario->name) }}">

                    @error('nombre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <p><strong>CURP</strong></p>
                    <input type="text" name="curp" class="form-control @error('curp') is-invalid @enderror" value="{{ old('curp', $usuario->curp) }}">

                    @error('curp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <p><strong>E-mail</strong></p>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $usuario->email) }}">

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <p><strong>Departamento</strong></p>

                    <select name="area_id" class="form-control @error('area_id') is-invalid @enderror">
                        <option value="">-- Seleccione una opción --</option>

                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}"
                                {{ old('area_id', $usuario->id_area) == $area->id ? 'selected' : '' }}>
                                {{ $area->nombre }}
                            </option>
                        @endforeach
                    </select>

                    @error('area_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- ---------------------------------------------------- -->

            <div class="row mt-3">
                <div class="col-md-3">
                    <p><strong>Rol</strong></p>
                    <select name="rol" class="form-control @error('rol') is-invalid @enderror">
                        <option value="">-- Seleccione una opción --</option>

                        <option value="usuario" {{ old('rol', $usuario->rol) == 'usuario' ? 'selected' : '' }}>
                            Usuario
                        </option>

                        <option value="administrador" {{ old('rol', $usuario->rol) == 'administrador' ? 'selected' : '' }}>
                            Administrador
                        </option>
                    </select>

                    @error('rol')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="card-footer d-flex justify-content-end">
            <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-circle-check"></i> ALMACENAR DATOS</button>
        </div>

        </form>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop