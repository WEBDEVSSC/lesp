@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Areas</strong><small class="text-muted"> Nuevo registro</small></h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('areasIndex') }}" class="btn btn-info btn-sm">
                <i class="fa-solid fa-list"></i> PANEL DE CONTROL
            </a>
        </div>
        <div class="card-body">

            <form action="{{route('areasStore')}}" method="POST">

            @csrf

            <div class="row">
                <div class="col-md-3">
                    <p><strong>Siglas</strong></p>
                    <input type="text" name="siglas" class="form-control @error('siglas') is-invalid @enderror" value="{{ old('siglas') }}">

                    @error('siglas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <p><strong>Nombre</strong></p>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">

                    @error('nombre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <p><strong>Responsable</strong></p>
                    <input type="text" name="responsable" class="form-control @error('responsable') is-invalid @enderror" value="{{ old('responsable') }}">

                    @error('responsable')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <p><strong>Contacto</strong></p>
                    <input type="text" name="contacto" class="form-control @error('contacto') is-invalid @enderror" value="{{ old('contacto') }}">

                    @error('contacto')
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