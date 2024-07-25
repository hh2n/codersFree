@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Lista de niveles</h1>
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
            <a href="{{route('admin.levels.create')}}" class="btn btn-primary btn-sm float-right">
                <i class="fas fa-plus-square mr-1"></i>
                Agregar Nivel
            </a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levels as $level)    
                        <tr>
                            <td>{{$level->id}}</td>
                            <td>{{$level->name}}</td>
                            <td width="20px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.levels.edit', $level)}}">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td width="20px">
                                <form action="{{route('admin.levels.destroy', $level)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
