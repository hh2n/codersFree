<div>

    <div class="bg-gray-200 py-4 mb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-600 mr-4 focus:outline-none" wire:click="resetFilters">
                <i class="fas fa-archway text-xs mr-2"></i>
                Todos los cursos
            </button>

            <!-- Dropdown -->
            <div class="relative mr-4" x-data="{ open: false }">
                <button 
                     
                    class="block h-12 w-full rounded-lg overflow-hidden px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 shadow-sm focus:outline-none"
                    x-on:click="open = true"
                >
                    <i class="fas fa-tags text-xs mr-2"></i>
                    Cursos
                    <i class="fas fa-angle-down text-xs ml-2"></i>
                </button>
                <div id="dropdown-menu" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" x-show="open" x-on:click.away="open = false">
                    <div class="py-2 p-2" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                        @foreach ($categories as $category)    
                            <a 
                                class="flex items-baseline rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer" 
                                role="menuitem"
                                wire:click="$set('category_id', {{$category->id}})"
                                x-on:click="open=false"
                            >
                                <i class="fas fa-certificate mr-2"></i>
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button 
                     
                    class="block h-12 w-full rounded-lg overflow-hidden px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 shadow-sm focus:outline-none"
                    x-on:click="open = true"
                >
                    <i class="fas fa-tags text-xs mr-2"></i>
                        Niveles
                    <i class="fas fa-angle-down text-xs ml-2"></i>
                </button>
                <div id="dropdown-menu" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" x-show="open" x-on:click.away="open = false">
                    <div class="py-2 p-2" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                        @foreach ($levels as $level)    
                            <a 
                                class="flex items-baseline rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer" 
                                role="menuitem"
                                wire:click="$set('level_id', {{$level->id}})"
                                x-on:click="open=false"
                            >
                                <i class="fas fa-layer-group mr-2"></i>
                                {{ $level->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $item)
            <x-course-card :course="$item" />
        @endforeach
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        {{ $courses->links() }}
    </div>

</div>
