<div>
    
    <h1 class="text-2xl font-bold mb-4">Estudiantes del Curso</h1>

    <x-table-responsive>
        
        <div class="px-6 py-4">
            <input 
                wire:model.live="search"
                class="form-control form-control-sm w-full shadow-sm focus:outline-none rounded-lg" 
                placeholder="Ingresa nombre de curso"
            />
        </div>
        
        @if ($students->count())
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-normal">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-normal">
                            Email
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Acción</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($students as $student)    
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover object-center border-double border-2 border-slate-500" src="{{$student->profile_photo_url}}">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $student->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $student->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                    href=""
                                    class="inline-flex items-center rounded-md bg-gray-50 px-2 py-2 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10 cursor-pointer"
                                >
                                    <i class="fas fa-eye"></i>
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
            {{ $students->links() }}
        </div>

    </x-table-responsive>
   
</div>
