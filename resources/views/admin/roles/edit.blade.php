@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Actualizar curso</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.roles.update', $role)}}" method="POST">
            @csrf
            @method('put')
            @include('admin.roles.partials.form')
            <hr>
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fas fa-pen-square fa-sm mr-1"></i>
                Actualizar role
            </button>
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