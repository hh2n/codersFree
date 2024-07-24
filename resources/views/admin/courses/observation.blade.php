@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Observaciones del curso:</h1>
    <hr class="shadow-sm">
    <h3><i class="fas fa-graduation-cap mr-2"></i><strong>{{$course->title}}</strong></h3>
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
            <form action="{{route('admin.courses.reject', $course)}}" method="POST">
                @csrf
                <div class="group-form mb-3">
                    <label for="body">Observaciones del curso</label>
                    <textarea
                        id="body"
                        name="body"
                        placeholder="Introduce una descripción"
                    ></textarea>
                    
                    @error('body')
                        <strong class="text-xs text-danger">{{$message}}</strong>
                    @enderror
                </div>
                

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-ban mr-1"></i>
                        Rechazar curso
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
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script src="{{asset('/js/instructor/courses/form.js')}}"></script>
    <script>
        ClassicEditor
        .create(document.querySelector('#body'))
        .catch( error => {
            console.error( error )
        })
    </script>
@stop
