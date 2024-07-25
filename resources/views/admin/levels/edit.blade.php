@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Editar nivel</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle mr-1"></i>
            {{session('info')}}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.levels.create')}}" class="btn btn-primary btn-sm float-right ml-2">
                <i class="fas fa-plus-square mr-1"></i>
                Agregar Nivel
            </a>
            <a href="{{route('admin.levels.index')}}" class="btn btn-secondary btn-sm float-right">
                <i class="fas fa-chevron-circle-left mr-1"></i>
                Regresar a lista
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.levels.update', $level)}}" method="post">
                @csrf
                @method('put')
                <div class="mb-2">
                    <label for="name" class="form-label">Nombre</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control" 
                        placeholder="Ingresa el nombre del nivel"
                        value="{{$level->name}}"
                    >
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
