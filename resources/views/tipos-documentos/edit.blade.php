@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Tipos de Documentos</strong><small class="text-muted"> Editar registro</small></h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('tiposDocumentosIndex') }}" class="btn btn-info btn-sm">
                <i class="fa-solid fa-list"></i> PANEL DE CONTROL
            </a>
        </div>
        <div class="card-body">

            <form action="{{route('tiposDocumentosUpdate', $tipoDocumento->id)}}" method="POST">

            @csrf

            @method('PUT')

            <div class="row">
                <div class="col-md-3">
                    <p><strong>Tipo</strong></p>
                    <input type="text" name="tipo" class="form-control @error('tipo') is-invalid @enderror" value="{{ old('tipo', $tipoDocumento->tipo) }}">

                    @error('tipo')
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