<div class="border-double border-4 rounded-lg p-2">
    {{-- The Master doesn't talk, he acts. --}}
    @foreach ($section->lessons as $item)
        <div class="card mt-2">
            <div class="card-body">

                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="flex items-center">
                            <label class="w-32">Nombre:</label>
                            <input 
                                type="text" 
                                wire:model.live="name" 
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="Ingrese el nombre de la lección"
                            >
                        </div>
                        @error('name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex items-center mt-4">
                            <label class="w-28">Plataforma: </label>
                            <select wire:model.live="platform_id"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center mt-4">
                            <label class="w-32">URL: </label>
                            <input 
                                type="text" 
                                wire:model.live="url" 
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="Ingrese el nombre de la lección"
                            >
                        </div>
                        @error('url')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="mt-4 flex justify-end items-center gap-x-2">
                            <button 
                                type="button"
                                wire:click="cancel"
                                class="rounded-md bg-gray-200 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"
                            >
                                <i class="fas fa-power-off mr-1"></i>
                                Cancel
                            </button>
                            <button 
                                type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            >
                                <i class="far fa-paper-plane mr-1"></i>
                                Actualizar
                            </button>
                        </div>
                    </form>
                @else    
                    <header>
                        <h1> <i class="far fa-play-circle text-blue-400 mr-1"></i> Lección: {{$item->name}}</h1>
                    </header>

                    <div>
                        <p class="text-sm">Plataforma: {{$item->platform->name}}</p>
                        <p class="text-sm">Enlace: <a class="text-blue-600" href="{{$item->url}}" target="_blank">{{$item->url}}</a></p>
                        <hr class="shadow mt-4 mb-2">
                        <div class="flex justify-end">
                            
                            <button 
                                wire:click="edit({{$item}})"
                                class="rounded-md bg-sky-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 mr-2"
                            ><i class="fas fa-edit mr-1"></i>Editar</button>
                            <button 
                                wire:click="destroy({{$item}})"
                                class="rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                            ><i class="fas fa-trash mr-1"></i> Eliminar</button>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    @endforeach

    {{-- Formulario para agregar lecciones  --}}
    <div class="mt-4" x-data="{open: false}">
        <a x-show="!open" x-on:click="open=true" class="flex items-center cursor-pointer mb-2 border rounded-lg p-2">
            <i class="fas fa-plus text-slate-800 mr-2"></i>
            Agregar nueva lección
        </a>

        <article class="card border" x-show="open">
            <div class="card-body">
                <h1 class="text-xl font-bold mb-4">Agregar nueva lección</h1>

                <hr class="shadow mt-4 mb-2">
    
                <div class="flex items-center">
                    <label class="w-32">Nombre:</label>
                    <input 
                        type="text" 
                        wire:model.live="name" 
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Ingrese el nombre de la lección"
                    >
                </div>
                @error('name')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror

                <div class="flex items-center mt-4">
                    <label class="w-28">Plataforma: </label>
                    <select wire:model.live="platform_id"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        @foreach ($platforms as $platform)
                            <option value="{{$platform->id}}">{{$platform->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center mt-4">
                    <label class="w-32">URL: </label>
                    <input 
                        type="text" 
                        wire:model.live="url" 
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Ingrese el nombre de la lección"
                    >
                </div>
                @error('url')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror

                <hr class="shadow mt-4 mb-2">

                <div class="flex justify-end">
                    <button 
                        x-on:click="open=false"
                        class="rounded-md bg-gray-200 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 mr-2"
                    ><i class="fas fa-ban"></i> Cancelar</button>
                    <button 
                        wire:click="store"
                        class="rounded-md bg-sky-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-500"
                    ><i class="fas fa-plus-circle"></i> Agregar lección</button>
                </div>
            </div>
        </article>
    </div>

</div>
