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
            <div class="container py-8 grid grid-cols-5">

                <aside>
                    <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
                    <ul class="text-sm text-gray-500">
                        <li class="leading-7 mb-1 border-l-4 pl-2 @routeIs('instructor.courses.edit', $course) border-indigo-400 @else border-transparent @endif">
                            <a href="{{route('instructor.courses.edit', $course)}}">Información del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 pl-2 @routeIs('instructor.courses.curriculum', $course) border-indigo-400 @else border-transparent @endif">
                            <a href="{{route('instructor.courses.curriculum', $course)}}">Lecciones del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 pl-2 @routeIs('instructor.courses.goals', $course) border-indigo-400 @else border-transparent @endif">
                            <a href="{{route('instructor.courses.goals', $course)}}">Metas del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 pl-2 border-transparent">
                            <a href="">Estudiantes</a>
                        </li>
                    </ul>
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
