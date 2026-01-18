@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('plugins.Datatables', true)

@section('content_header')
    <h1><strong>Areas</strong> <small class="text-muted">Panel de Control</small></h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('areasCreate') }}" class="btn btn-info btn-sm">
                <i class="fa-solid fa-plus"></i> NUEVO REGISTRO
            </a>
        </div>
        <div class="card-body">

            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Siglas</th>
                        <th>Nombre</th>
                        <th>Responsable</th>
                        <th>Contacto</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($areas as $area)
                        <tr>
                            <td>{{ $area->id }}</td>
                            <td>{{ $area->siglas }}</td>
                            <td>{{ $area->nombre }}</td>
                            <td>{{ $area->responsable }}</td>
                            <td>{{ $area->contacto }}</td>
                            <td>
                                <center>
                                    <a href="{{ route('areasShow', $area->id) }}" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="VER">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                    
                                    <a href="{{ route('areasEdit', $area->id) }}" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="EDITAR">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <button type="button" class="btn btn-sm btn-dark" data-toggle="tooltip" title="ELIMINAR" onclick="confirmDelete({{ $area->id }})">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>

                                    <form id="delete-form-{{ $area->id }}"
                                        action="{{ route('areasDelete', $area->id) }}"
                                        method="POST"
                                        style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                </center>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No hay áreas registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

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

    @if(session('success'))
        <script>
            Swal.fire({
            position: "top-end",
            icon: "success",
            title: "¡Éxito!",
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            // Inicializar todos los tooltips de la página
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>$(document).ready( function () {
        $(document).ready(function() {
        $('#table').DataTable({
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
    } );
    </script>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@stop