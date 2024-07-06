@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1> Asignar un Rol de Usuario </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="h5">Nombre:</h1>
            <p class="form-control">
                <i class="fas fa-user-lock mr-2"></i>
                {{$user->name}}
                <span class="text-info ml-2">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v mr-2"></i>
                    {{$user->email}}
                </span>
            </p>

            <h1 class="h4">Lista de roles</h1>
            <form action="{{route('admin.users.update', $user)}}" method="POST">
                @csrf
                @method('put')
                <div class="border rounded-lg p-2">
                    @foreach ($roles as $role)
                        <div>
                            <label for="">
                                <div class="form-check">
                                    <input 
                                        class="form-check-input" 
                                        @if (in_array($role->id, $user_role)) checked @endif
                                        type="checkbox" 
                                        value="{{$role->id}}" 
                                        id="flexCheckDefault{{$role->id}}" 
                                        name="roles[]"
                                    />
                                    <label class="form-check-label" for="flexCheckDefault{{$role->id}}" style="cursor: pointer">
                                        {{$role->name}}
                                    </label>
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
                <hr>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-paper-plane fa-sm mr-1"></i>
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
