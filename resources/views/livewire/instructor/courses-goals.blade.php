<section>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <h1 class="text-2xl font-bold">Requerimientos del curso</h1>
    <hr class="mt-2 mb-6">

    @if (!$course->goals)
        <div class="bg-blue-100 border-t border rounded-lg border-blue-500 text-blue-700 px-4 py-3 m-2" role="alert">
            <p class="font-bold">Sin requerimientos asignados.</p>
        </div>
    @else
        
        @foreach ($course->goals as $item)
            <article class="card mb-2">
                <div class="card-body bg-gray-100 border-b-2 border-double shadow-inner">

                    @if ($goal->id == $item->id)
                        <form wire:submit.prevent="update">
                            <input 
                                wire:model.live="name" 
                                class="form-control form-control-sm shadow-sm focus:outline-none rounded-lg w-full"
                                placeholder="Ingresa meta para el curso"
                            >
                            @error('name')
                                <span class="text-xs text-red-500">{{$message}}</span>
                            @enderror
                        </form>
                    @else    
                        <header class="flex justify-between">
                            <h1 class="flex-1 border-4 border-double rounded-lg p-1">{{$item->name}}</h1>
                            <div>
                                <button
                                    wire:click="edit({{$item}})"
                                    type="button"
                                    class="rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 ml-2"
                                >
                                    <i class="fas fa-edit cursor-pointer"></i>
                                </button>
                                <button
                                    wire:click="destroy({{$item}})"
                                    type="button"
                                    class="rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                                >
                                    <i class="fas fa-trash cursor-pointer"></i>
                                </button>
                            </div>
                        </header>
                    @endif

                </div>
            </article>
        @endforeach

    @endif

    <article class="card">
        <div class="card-body bg-gray-100">
            <form wire:submit.prevent="store">
                <input 
                    wire:model.live="newname" 
                    class="form-control form-control-sm shadow-sm focus:outline-none rounded-lg w-full"
                    placeholder="Agregar nombre para meta"
                >
                @error('newname')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
                <div class="flex justify-end mt-2">
                    <button
                        type="submit"
                        class="rounded-md bg-sky-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 ml-2"
                    >
                        <i class="fas fa-medal mr-1"></i>
                        Agregar meta
                    </button>
                </div>
            </form>
        </div>
    </article>

</section>

