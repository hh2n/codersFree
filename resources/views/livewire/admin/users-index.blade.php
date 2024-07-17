<div>
    <div class="card">
        <div class="card-header">
            <input 
                wire:keydown="limpiar_page"
                wire:model.live="search"
                class="form-control form-control-sm w-full" 
                type="text" 
                name="txt_search" 
                id="txt_search" 
                placeholder="Escribe nombre de usuario"
            >
        </div>

        @if ($users->count())    
            <div class="card-body">
                <table class="table table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td width="110px">
                                    <a href="{{route('admin.users.edit', $user)}}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$users->links()}}
            </div>    
        @else
            <div class="card-body">
                <div class="callout callout-warning">
                    <h5><i class="fas fa-frown-open mr-2"></i> No se encontraron resultados.</h5>
                    <p>Por favor intenta con otro nombre de usuario o correo electronico.</p>
                </div>
            </div>        
        @endif

    </div>
</div>
