@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Documentos</strong><small class="text-muted"> Nuevo registro</small></h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('documentosIndex') }}" class="btn btn-info btn-sm">
                <i class="fa-solid fa-list"></i> PANEL DE CONTROL
            </a>
        </div>
        <div class="card-body">

            <form action="{{route('documentosStore')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">
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
                    <p><strong>Departamento</strong></p>
                    <select name="area_id" class="form-control @error('area_id') is-invalid @enderror">
                        <option value="">-- Seleccione una opción --</option>

                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}"
                                {{ old('area_id') == $area->id ? 'selected' : '' }}>
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

                <div class="col-md-3">
                    <p><strong>Tipo de Documento</strong></p>
                    <select name="tipo_id" class="form-control @error('tipo_id') is-invalid @enderror">
                        <option value="">-- Seleccione una opción --</option>

                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->id }}"
                                {{ old('tipo_id') == $tipo->id ? 'selected' : '' }}>
                                {{ $tipo->tipo }}
                            </option>
                        @endforeach
                    </select>

                    @error('tipo_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <p><strong>Clave</strong></p>
                    <input type="text" name="clave" class="form-control @error('clave') is-invalid @enderror" value="{{ old('clave') }}">

                    @error('clave')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <p><strong>Revisión</strong></p>
                    <input type="text" name="revision" class="form-control @error('revision') is-invalid @enderror" value="{{ old('revision') }}">

                    @error('revision')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <p><strong>Vigencia</strong></p>
                    <input type="date" name="vigencia" class="form-control @error('vigencia') is-invalid @enderror" value="{{ old('vigencia') }}">

                    @error('vigencia')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <p><strong>Fecha de revisión</strong></p>
                    <input type="date" name="fecha_revision" class="form-control @error('fecha_revision') is-invalid @enderror" value="{{ old('fecha_revision') }}">

                    @error('fecha_revision')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <p><strong>Sustituye</strong></p>
                    <input type="text" name="sustituye" class="form-control @error('sustituye') is-invalid @enderror" value="{{ old('sustituye') }}">

                    @error('sustituye')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <p><strong>Privacidad</strong></p>
                    <select name="privacidad" id="privacidad" class="form-control @error('privacidad') is-invalid @enderror">
                        <option value="">-- Seleccione una opción --</option>
                        <option value="0" {{ old('privacidad') === '0' ? 'selected' : '' }}>Público</option>
                        <option value="1" {{ old('privacidad') === '1' ? 'selected' : '' }}>Privado</option>
                    </select>

                    @error('privacidad')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <p><strong>Documento</strong></p>
                    <input type="file" name="documento" class="form-control-file @error('documento') is-invalid @enderror" value="{{ old('documento') }}">

                    @error('documento')
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