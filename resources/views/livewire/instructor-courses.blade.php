<div class="container py-8">
    <x-table-responsive>
        
        <div class="px-6 py-4">
            <input 
                wire:keydown="limpiar_page"
                wire:model.live="search"
                class="form-control form-control-sm w-full shadow-sm focus:outline-none rounded-lg" 
                placeholder="Ingresa nombre de curso">
        </div>
        
        @if ($courses->count())
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-normal">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-normal">
                            Matriculados
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-normal">
                            Calificación
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-normal">
                            Status
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($courses as $course)    
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{Storage::url($course->image->url)}}">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $course->title }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $course->category->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $course->students->count() }}</div>
                                <div class="text-sm text-gray-500">Alumnos matriculados</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center">
                                    {{$course->rating}}
                                    <ul class="flex text-xs ml-2">
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >= 1? 'yellow':'gray'}}-500"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >= 2? 'yellow':'gray'}}-500"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >= 3? 'yellow':'gray'}}-500"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >= 4? 'yellow':'gray'}}-500"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating == 5? 'yellow':'gray'}}-500"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-sm text-gray-500">
                                    Valoración
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($course->status)
                                    @case(1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Borrador
                                        </span>
                                        @break
                                    @case(2)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Revision
                                        </span>
                                        @break
                                    @case(3)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Publicado
                                        </span>
                                        @break
                                    @default
                                @endswitch
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a 
                                    class="inline-flex items-center rounded-md bg-gray-50 px-2 py-2 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10 cursor-pointer"
                                >
                                    <i class="fas fa-edit fa-lg"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div 
                class="flex items-center px-6 py-4 m-4 rounded-lg bg-green-100 border border-green-700 text-green-700 font-semibold"
            >
                <i class="fas fa-sad-tear mr-2"></i>
                Sin registros encontrados ...
            </div>
        @endif

        <div class="px-6 py-4">
            {{ $courses->links() }}
        </div>
    </x-table-responsive>
</div>
