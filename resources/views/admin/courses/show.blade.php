<x-app-layout>
    
    <section class="bg-gray-700 py-12 mb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @if ($course->image)
                    <img 
                        src="{{Storage::url($course->image->url)}}" 
                        alt="{{$course->title}}" />
                @else
                    <img 
                        src="{{asset('/img/notfound_5408094.png')}}"
                        class="w-full h-64 object-contain object-center border-double border-4 border-slate-500" 
                        id="picture"
                    />
                @endif
            </figure>

            <div class="text-white">
                <h1 class="text-4xl">{{$course->title}}</h1>
                <h2 class="text-xl mb-3">{{$course->subtitle}}</h2>
                <p class="mb-2"><i class="fas fa-chart-line mr-2"></i> {{$course->level->name}}</p>
                <p class="mb-2"><i class="fas fa-tags mr-2"></i>Categoria: {{$course->category->name}}</p>
                <p class="mb-2"><i class="fas fa-users mr-2"></i>Matriculados: {{$course->students_count}}</p>
                <p class=""><i class="far fa-star mr-2 animate-bounce"></i>Calificación: {{$course->rating}}</p>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-6">

        @if (session('info'))
            <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">
                        <i class="fas fa-exclamation-triangle mr-1"></i>
                        Ocurrio un error!
                    </strong>
                    <span class="block sm:inline">{{session('info')}}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <span x-on:click="open=false" class="fill-current h-6 w-6 text-red-500" role="button"><i class="fas fa-times"></i></span>
                    </span>
                </div>
            </div>
        @endif

        <div class="order-2 lg:col-span-2 lg:order-1">  
            {{-- Metas --}}
            <section class="bg-white shadow-lg rounded overflow-hidden mb-12">
                <div class="px-6 py-4 mb-12">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderás</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base">
                                <i class="fas fa-check text-gray-600 mr-2"></i>
                                {{ $goal->name }}
                            </li>
                        @empty
                            <li class="text-gray-700 text-base">
                                <i class="fas fa-battery-empty text-red-600 mr-1"></i>
                                <span class="text-gray-400">Este curso no tiene asignado ninguna meta.</span>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </section>
            {{-- Temario --}}
            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2">Temario</h1>
                @forelse ($course->sections as $section)
                    <article class="mb-4 shadow" 
                        @if ($loop->first)
                            x-data="{open: true}"
                        @else
                            x-data="{open: false}"
                        @endif
                    >
                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="open = !open">
                            <h1 class="font-bold text-lg text-gray-600">{{$section->name}}</h1>
                        </header>
                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base">
                                        <i class="fas fa-play-circle mr-2 text-blue-400"></i>
                                        {{$lesson->name}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </article>   
                @empty 
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-puzzle-piece mr-1"></i>
                            <span class="text-gray-400">Este curso no tiene ninguna sección asignada.</span>
                        </div>
                    </div>
                @endforelse
            </section>
             {{-- Requesitos --}}
            <section class="mb-8">
                <h1 class="text-gray-800 font-bold text-3xl">Requesitos</h1>
                <ul class="list-disc list-inside p-2">
                    @forelse ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                    @empty 
                        <li class="text-gray-400 text-base">Este curso no tiene ningun requerimiento.</li>
                    @endforelse
                </ul>

            </section>
            {{-- Descripcion --}}
            <section>
                <h1 class="text-gray-800 font-bold text-3xl mb-2">Descripción</h1>
                <div class="text-gray-700 text-base">
                    {!! $course->description !!}
                </div>
            </section>
        </div>

        <div class="order-1 col-span-1 lg:order-2">
            <section class="bg-white shadow-lg rounded overflow-hidden mb-4">
                <div class="px-6 py-4">
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}" />
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">Prof. {{$course->teacher->name}}</h1>
                            <a class="text-blue-400 text-sm font-bold" href="">{{'@'.Str::slug($course->teacher->name, '')}}</a>
                        </div>
                    </div>
                    <hr class="border border-double shadow-lg mt-4 mb-6">
                    <form action="{{route('admin.courses.approved', $course)}}" class="mt-4" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-700 w-full block text-white font-bold py-2 px-4 rounded text-center mt-4">
                            <i class="fas fa-check-double mr-1"></i>
                            Aprovar curso
                        </button>
                    </form>

                </div>
            </section>
            <aside class="hidden lg:block">
                
            </aside>
        </div>
    </div>

</x-app-layout>