<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" />

        @livewireStyles

    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <div class="container py-8 grid grid-cols-5 gap-6">

                <aside>
                    <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
                    <ul class="text-sm text-gray-500 mb-4">
                        <li class="leading-7 mb-1 border-l-4 pl-2 @routeIs('instructor.courses.edit', $course) border-indigo-400 @else border-transparent @endif">
                            <a href="{{route('instructor.courses.edit', $course)}}">Información del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 pl-2 @routeIs('instructor.courses.curriculum', $course) border-indigo-400 @else border-transparent @endif">
                            <a href="{{route('instructor.courses.curriculum', $course)}}">Lecciones del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 pl-2 @routeIs('instructor.courses.goals', $course) border-indigo-400 @else border-transparent @endif">
                            <a href="{{route('instructor.courses.goals', $course)}}">Metas del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 pl-2 @routeIs('instructor.courses.students', $course) border-indigo-400 @else border-transparent @endif">
                            <a href="{{route('instructor.courses.students', $course)}}">Estudiantes</a>
                        </li>
                    </ul>
                    
                    @switch($course->status)
                        @case(1)
                            <form action="{{route('instructor.courses.status', $course)}}" method="POST">
                                @csrf
                                <button
                                    class="rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 ml-2"
                                >
                                    <i class="fas fa-file-import mr-1"></i>
                                    Solicitar revisión
                                </button>
                            </form>
                            @break
                        @case(2)
                            <div class="text-gray-600 bg-gray-100 card">
                                <div class="flex flex-center justify-between card-body">
                                    <i class="mr-2 text-2xl fas fa-info-circle text-sky-500"></i>
                                    <p class="text-sm">El curso se encuentra en revisión</p>
                                </div>
                            </div>
                            @break
                        @case(3)
                            <div class="text-gray-500 bg-gray-100 card">
                                <div class="flex flex-center justify-between card-body">
                                    <i class="mr-2 text-xl fas fa-check-double text-green-500"></i>
                                    <p class="text-sm">El curso esta publicado</p>
                                </div>
                            </div>
                            @break
                        @default
                    @endswitch
                    
                </aside>
        
                <div class="col-span-4 card">
                    <main class="card-body text-gray-600">
                       {{$slot}}
                    </main>
                </div>
        
            </div>
            
            <x-footer/>
        </div>


        @stack('modals')

        @livewireScripts

        @isset($js)
            {{$js}}
        @endisset
    </body>
</html>
