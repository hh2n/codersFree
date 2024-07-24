@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Crear Nueva Categoría</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.categories.index')}}" class="btn btn-secondary btn-sm float-right">
                <i class="fas fa-chevron-circle-left mr-1"></i>
                Regresar a lista
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.categories.store')}}" method="POST">
                @csrf
                @method('post')

                <div class="mb-2">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Ingresa el nombre de categoría">
                </div>

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <hr class="mt-2">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3 float-right">
                        <i class="fas fa-save mr-1"></i>
                        :: Guardar ::
                    </button>
                </div>
            </form>
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
