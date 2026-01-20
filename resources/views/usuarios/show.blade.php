@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Usuarios</strong> <small class="text-muted"> Detalles</small></h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('usuariosIndex') }}" class="btn btn-info btn-sm">
                <i class="fa-solid fa-list"></i> PANEL DE CONTROL
            </a>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-3">
                    <p><strong>Nombre</strong></p>
                    {{ $usuario->name }}
                </div>
                <div class="col-md-3">
                    <p><strong>Nombre</strong></p>
                    {{ $usuario->email }}
                </div>
                <div class="col-md-3">
                    <p><strong>Area</strong></p>
                    {{ $usuario->area?->nombre }}
                </div>
                <div class="col-md-3">
                    <p><strong>Rol</strong></p>
                    {{ $usuario->rol }}
                </div>
            </div>

        </div>
        <div class="card-footer"></div>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop