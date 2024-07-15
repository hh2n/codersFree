@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')
    @if (session('info'))    
        <div class="callout callout-success">
            <h5>
                <i class="fas fa-check-double mr-2 text-success"></i>
                {{session('info')}}.
            </h5>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btn-sm" href="{{route('admin.roles.create')}}">
                <i class="fas fa-plus-circle fa-sm mr-1"></i>
                Crear Role
            </a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>#{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="50px">
                                <a 
                                    class="btn btn-secondary btn-sm"
                                    href="{{route('admin.roles.edit', $role)}}"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td width="50px">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button 
                                        class="btn btn-danger btn-sm"
                                    >
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay ningún rol registrado</td>
                        </tr>
                    @endforelse
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