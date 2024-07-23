<x-instructor-layout :course="$course">


    <h1 class="text-2xl font-bold">INFORMACIÓN DEL CURSO</h1>
    <hr class="mt-2 mb-6">
    <form action="{{route('instructor.courses.update', $course)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Título del curso</label>
            <input 
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2 {{$errors->has('title')?'border-red-500':''}}"
                type="text" 
                id="title"
                name="title"
                placeholder="Introduce un título"
                value="{{$course->title}}"
            />
        </div>
        <div class="mb-4">
            <label for="slug" class="block text-gray-700">Slug del curso</label>
            <input 
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2 {{$errors->has('slug')?'border-red-500':''}}"
                type="text" 
                id="slug"
                name="slug"
                placeholder="Slug del curso"
                readonly
                value="{{$course->slug}}"
            />
        </div>
        <div class="mb-4">
            <label for="subtitle" class="block text-gray-700">Subtítulo del curso</label>
            <input 
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2 {{$errors->has('subtitle')?'border-red-500':''}}"
                type="text" 
                id="subtitle"
                name="subtitle"
                placeholder="Introduce un subtítulo"
                value="{{$course->subtitle}}"
            />
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Descripción del curso</label>
            <textarea
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-4 {{$errors->has('description')?'border-red-500':''}}"
                id="description"
                name="description"
                placeholder="Descripción del curso"
            >{{$course->description}}</textarea>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">Categoría del curso</label>
                <select 
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2 {{$errors->has('category_id')?'border-red-500':''}}"
                    name="category_id" 
                    id="category_id"
                >
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if ($category->id == $course->category->id) @selected(true)
                        
                    @endif >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="level_id" class="block text-gray-700">Nivel del curso</label>
                <select 
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2 {{$errors->has('level_id')?'border-red-500':''}}"
                    name="level_id" 
                    id="level_id"
                >
                    @foreach ($levels as $level)
                    <option value="{{$level->id}}" @if ($level->id == $course->level->id) @selected(true)
                        
                    @endif >{{$level->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="price_id" class="block text-gray-700">Precios del curso</label>
                <select 
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2 {{$errors->has('price_id')?'border-red-500':''}}"
                    name="price_id" 
                    id="price_id"
                >
                    @foreach ($prices as $price)
                    <option value="{{$price->id}}" @if ($price->id == $course->price->id) @selected(true)
                        
                    @endif >{{$price->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>    
        
        <h1 class="text-2xl font-bold mt-8 mb-2">Imagen del Curso</h1>

        <div class="grid grid-cols-2 gap-4">
            <figure>
                @isset($course->image)    
                    <img 
                        src="{{Storage::url($course->image->url)}}"
                        class="w-full h-64 object-cover object-center border-double border-4 border-slate-500" 
                        id="picture"
                    />
                @else
                    <img 
                        src="{{asset('/img/notfound_5408094.png')}}"
                        class="w-full h-64 object-contain object-center border-double border-4 border-slate-500" 
                        id="picture"
                    />
                @endisset
            </figure>

            <div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat ducimus exercitationem inventore laudantium! Recusandae quo, odit sequi aspernatur sapiente aperiam officia consequatur officiis ratione et quam, quaerat quidem, voluptatem expedita?
                </p>
                <input
                    class="border-gray-600 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2 {{$errors->has('image_curso')?'border-red-500':''}}"
                    type="file" 
                    name="image_curso" 
                    id="image_curso"
                    multiple
                    accept="image/*"
                />

                @error('image_curso')
                    <strong class="text-xs text-red-600">{{$message}}</strong>
                @enderror
            </div>
        </div>

        <div class="flex justify-end">
            <button 
                class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150" 
                type="submit"
            >
                <i class="fas fa-paper-plane mr-2"></i> Actualizar información
            </button>
        </div>

    </form>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('/js/instructor/courses/form.js')}}"></script>
    </x-slot>

</x-instructor-layout>