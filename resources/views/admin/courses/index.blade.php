@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Cursos pendientes de aprobación</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <i class="fas fa-check-double mr-1"></i>
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-sm table-hover table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Titulo</td>
                        <td>Categoría</td>
                        <td>Actualización</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td>{{$course->category->name}}</td>
                            <td>
                                <i>
                                    {{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y H:i:s')}}
                                </i>
                            </td>
                            <td>
                                <a title="Revisar" href="{{route('admin.courses.show', $course)}}" class="btn btn-primary">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$courses->links('vendor.pagination.bootstrap-5')}}
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
