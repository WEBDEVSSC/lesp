@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Tipos de Documentos</strong> <small class="text-muted">Detalles</small></h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('tiposDocumentosIndex') }}" class="btn btn-info btn-sm">
                <i class="fa-solid fa-list"></i> PANEL DE CONTROL
            </a>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-3">
                    <p><strong>Tipo</strong></p>
                    {{ $tipoDocumento->tipo }}
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