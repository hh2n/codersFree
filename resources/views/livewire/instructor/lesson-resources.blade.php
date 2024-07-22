<div class="card" x-data="{open: false}">
    {{-- In work, do what you enjoy. --}}
    <div class="card-body bg-gray-200">

        <header>
            <h1 x-on:click="open= !open" class="cursor-pointer">
                Recursos de la lección
            </h1>
        </header>

        <div x-show="open">
            <hr class="my-2">

            @if ($lesson->resource)
                <div class="flex justify-between items-center">
                    <p>
                        <i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i>
                        {{$lesson->resource->url}}
                    </p>
                    <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>
                </div>
            @else    
                <form wire:submit.prevent="save">
                    <div class="flex items-center">
                        <input wire:model.live="file" type="file" class="flex-1 rounded-md bg-gray-200 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 ml-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <i class="fas fa-cloud-upload-alt mr-1"></i>
                            Guardar
                        </button>
                    </div>

                    <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="file">
                        <i class="fas fa-spinner fa-spin mr-1"></i> cargando espere por favor... 
                    </div>

                    @error('file')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                </form>
            @endif

        </div>

    </div>
</div>
