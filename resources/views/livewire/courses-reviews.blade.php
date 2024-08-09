<section class="mt-6">
    {{-- The Master doesn't talk, he acts. --}}
    <h1 class="text-gray-700 font-bold text-3xl mb-4">Valoración</h1>

    @can('enrolled', $course)
        <article>
            @can('valued', $course)     
                <textarea 
                    wire:model.live="comment"
                    rows="5"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    placeholder="Ingrese una reseña del curso"
                ></textarea>
                <div class="flex items-center my-4">
                    <button 
                        wire:click="store"
                        class="rounded-md bg-purple-800 px-3 py-2 mr-2 text-sm font-semibold text-white shadow-sm hover:bg-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600"
                    >
                        <i class="fas fa-save mr-1"></i>
                        Guardar
                    </button>
                    <ul class="flex">
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)">
                            <i class="fas fa-star text-{{$rating >= 1 ? 'yellow' : 'gray'}}-500"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)">
                            <i class="fas fa-star text-{{$rating >= 2 ? 'yellow' : 'gray'}}-500"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)">
                            <i class="fas fa-star text-{{$rating >= 3 ? 'yellow' : 'gray'}}-500"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)">
                            <i class="fas fa-star text-{{$rating >= 4 ? 'yellow' : 'gray'}}-500"></i>
                        </li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)">
                            <i class="fas fa-star text-{{$rating == 5 ? 'yellow' : 'gray'}}-500"></i>
                        </li>
                    </ul>
                </div>
            @else 
                <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 mb-4" role="alert">
                    <i class="fas fa-info-circle fa-lg mr-2"></i>
                    <p>Usted ya ha valorado este curso.</p>
                </div>
            @endcan
        </article>
    @endcan

    <div class="card">
        <div class="card-body">
            <p class="text-gray-800 text-xl">{{ $course->reviews->count() }} Valoraciones</p>
            <hr class="shadow-lg border border-dotted m-2">
            @foreach ($course->reviews as $review)
                <article class="flex mb-4 text-gray-800">
                    <figure class="mr-4">
                        <img 
                            class="h-12 w-12 object-cover rounded-full shadow-xl border border-dashed" 
                            src="{{$review->user->profile_photo_url}}" 
                            alt="{{$review->user->name}}"
                        >
                    </figure>

                    <div class="card flex-1">
                        <div class="card-body bg-gray-200">
                            <p><b>{{$review->user->name}}</b><i class="fas fa-star text-yellow-400"></i> ({{$review->rating}})</p>
                            {{ $review->comment }}
                        </div>
                    </div>
                </article>
            @endforeach

        </div>
    </div>
</section>
