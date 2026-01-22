@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Documentos</strong> <small class="text-muted">Detalles</small></h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('documentosIndex') }}" class="btn btn-info btn-sm">
                <i class="fa-solid fa-list"></i> PANEL DE CONTROL
            </a>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-3">
                    <p><strong>Nombre</strong></p>
                    {{ $documento->nombre }}
                </div>
                <div class="col-md-3">
                    <p><strong>Departamento</strong></p>
                    {{ $documento->area->nombre }}
                </div>
                <div class="col-md-3">
                    <p><strong>Tipo de documento</strong></p>
                    {{ $documento->tipoDocumento->tipo }}
                </div>
                <div class="col-md-3">
                    <p><strong>Clave</strong></p>
                    {{ $documento->clave }}
                </div>
            </div>

            <!-- ------------------------------------------------------------ -->

            <div class="row mt-3">
                <div class="col-md-3">
                    <p><strong>Revisión</strong></p>
                    {{ $documento->revision }}
                </div>
                <div class="col-md-3">
                    <p><strong>Vigencia</strong></p>
                    {{ $documento->vigencia }}
                </div>
                <div class="col-md-3">
                    <p><strong>Fecha de revisión</strong></p>
                    {{ $documento->fecha_revision }}
                </div>
                <div class="col-md-3">
                    <p><strong>Sustituye</strong></p>
                    {{ $documento->sustituye }}
                </div>
            </div>

            <!-- ------------------------------------------------------------ -->

            <div class="row mt-3">
                <div class="col-md-3">
                    <p><strong>Privacidad</strong></p>
                    <td>
                        @if ($documento->status == 0)
                            PUBLICO
                        @else
                            PRIVADO
                        @endif
                    </td>
                </div>
            </div>

            <!-- ------------------------------------------------------------ -->

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ asset('storage/'.$documento->documento) }}" download class="btn btn-info btn-block"><i class="fa-solid fa-download"></i> Descargar Archivo</a>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop