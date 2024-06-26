@props(['course'])

<article class="bg-white shadow-lg rounded overflow-hidden">
    <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="{{$course->title}}" />
    <div class="px-6 py-4">
        <h1 class="text-xl text-gray-600 mb-2 leading-6">{{ Str::limit($course->title, 40) }}</h1>
        <p class="text-xs text-gray-500 mb-2">Prof: {{ $course->teacher->name }}</p>
        
        <div class="flex items-baseline">
            <ul class="flex text-xs">
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
            <p class="text-xs text-gray-400 ml-auto">
                <i class="fas fa-users"></i>
                ({{ $course->students_count }})
            </p>
        </div>

        <a href="{{route('courses.show', $course)}}" class="block text-center w-full mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Más información.
        </a>
    </div>
</article>