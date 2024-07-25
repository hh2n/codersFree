@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1><i class="fas fa-money-bill-wave mr-2"></i> Nuevo precio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.prices.index')}}" class="btn btn-secondary btn-sm float-right">
                <i class="fas fa-chevron-circle-left mr-1"></i>
                Regresar a lista
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.prices.store')}}" method="post">
                @csrf
                @method('post')
                <div class="mb-2">
                    <label for="name" class="form-label">Nombre $:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Ingresa nombre de este precio">
                </div>

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                
                <div class="mb-2">
                    <label for="value" class="form-label">Valor $:</label>
                    <input type="number" name="value" id="value" class="form-control" placeholder="Ingresa el valor del precio">
                </div>

                @error('value')
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
