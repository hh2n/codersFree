@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.roles.store')}}" method="POST">
                @csrf
                @method('post')
                @include('admin.roles.partials.form')
                <hr>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-save fa-sm mr-1"></i>
                    Crear role
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