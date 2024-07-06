
<div class="form-group">
    <label for="name">Nombre</label>
    <input 
        class="form-control {{$errors->has('name')?' is-invalid':''}}" 
        placeholder="Escribe un nombre para el rol" 
        type="text" 
        name="name" 
        id="name"
        value="{{ $role?$role->name:'' }}"
    >
    @error('name')    
        <span class="invalid-feedback"><strong>{{$message}}</strong></span>
    @enderror
</div>

<strong>Permisos</strong>
@error('permissions')   
    <br>
    <span class="text-danger text-sm"><strong>{{$message}}</strong></span>
@enderror
@foreach ($permissions as $permission)
    <div class="form-check">
        <input 
            class="form-check-input" 
            @if (in_array($permission->id, $perm)) checked @endif
            type="checkbox" 
            value="{{$permission->id}}" 
            id="flexCheckDefault{{$permission->id}}" 
            name="permissions[]"
        />
        <label class="form-check-label" for="flexCheckDefault{{$permission->id}}" style="cursor: pointer">
            {{$permission->name}}
        </label>
    </div>
@endforeach