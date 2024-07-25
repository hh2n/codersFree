@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1><i class="fas fa-dollar-sign mr-2"></i> Lista de Precios</h1>
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
            <a href="{{route('admin.prices.create')}}" class="btn btn-primary btn-sm float-right">
                <i class="fas fa-plus-square mr-1"></i>
                Agregar Precio
            </a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Precio $</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prices as $price)
                        <tr>
                            <td>{{$price->id}}</td>
                            <td>{{$price->name}}</td>
                            <td width="20px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.prices.edit', $price)}}">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td width="20px">
                                <form action="{{route('admin.prices.destroy', $price)}}" method="post">
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
