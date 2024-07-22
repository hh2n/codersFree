
<div>
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>
    
    <h1 class="text-2xl font-bold">LECCIONES DEL CURSO</h1>

    <hr class="mt-2 mb-6">
    
    @if(Session::has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 flex mt-2 mb-6" role="alert">
            <p class="font-bold">
                <i class="fas fa-check-double fa-lg mr-2"></i> 
                {!! session('message') !!}
            </p>
        </div>
    @endif

    @foreach ($course->sections as $item)
        <article class="card mb-3 border-2 border-dashed shadow-lg" x-data="{open: false}">
            <div class="card-body bg-gray-100">
                
                @if ($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input 
                            wire:model.live="name"
                            type="text" 
                            name="name"
                            class="form-control form-control-sm shadow-sm focus:outline-none rounded-lg w-full"
                            placeholder="Ingrese el nombre de la sección"
                        />
                        @error('name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center mb-2">
                        <h1 class="cursor-pointer" x-on:click="open = !open">
                            <strong>Sección: </strong> {{$item->name}}
                        </h1>
                        <div>
                            <i 
                                class="fas fa-edit cursor-pointer text-blue-400 m-2"
                                wire:click="edit({{$item}})"
                            ></i>
                            <i 
                                class="fas fa-trash-alt cursor-pointer text-red-600"
                                wire:click="destroy({{$item}})"
                            ></i>
                        </div>
                    </header>
                    <div x-show="open">
                        @livewire('instructor.course-lesson', ['section' => $item], key($item->id))
                    </div>
                @endif

            </div>
        </article>
    @endforeach

    {{-- Formulario para agregar nueva Seccion --}}
    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open=true" class="flex items-center cursor-pointer mb-2 border rounded-lg p-2">
            <i class="far fa-plus-square fa-lg text-red-500 mr-2"></i>
            Agregar nueva sección
        </a>

        <article class="card border" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nueva sección</h1>
    
                <div class="mb-4">
                    <input 
                        wire:model.live="newname"
                        type="text" 
                        class="form-control form-control-sm shadow-sm focus:outline-none rounded-lg w-full"
                        placeholder="Escribe el nombre de la sección"
                    >
                    @error('newname')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button 
                        x-on:click="open=false"
                        class="rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                    ><i class="fas fa-times"></i> Cancelar</button>
                    <button 
                        wire:click="store"
                        class="rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ml-2"
                    ><i class="fas fa-plus-square"></i> Agregar</button>
                </div>
            </div>
        </article>
    </div>


</div>
