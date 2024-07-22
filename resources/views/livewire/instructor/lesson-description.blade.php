<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <hr class="shadow border-dashed my-4">

    <article class="card border" x-data="{open: false}">
        <div class="card-body bg-gray-200/50">
            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer">Descripción de la lección</h1>
            </header>
            <div x-show="open">
                <hr class="my-2">

                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea 
                            wire:model.live="desname"
                            rows="5"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        ></textarea>
                        
                        @error('desname')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="mt-6 flex items-center justify-end gap-x-3">

                            <button 
                                wire:click="destroy({{$lesson}})"
                                type="button" 
                                class="text-sm font-semibold leading-6 text-red-500"
                            >
                                <i class="fas fa-ban"></i> 
                                Eliminar
                            </button>
                            <button 
                                type="submit" 
                                class="rounded-md bg-purple-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600"
                            >
                                <i class="fas fa-pencil-alt"></i> 
                                Actualización
                            </button>

                        </div>
                    </form>
                @else 
                    <div>
                        <textarea 
                            wire:model.live="desname"
                            placeholder="Agregue una descripción ..."
                            rows="5"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        ></textarea>

                        @error('desname')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="mt-6 flex items-center justify-end gap-x-3">

                            <button 
                                wire:click="store"
                                class="rounded-md bg-purple-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600"
                            >
                                <i class="fas fa-comment-medical mr-1"></i>
                                Agregar descripción
                            </button>

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
</div>
