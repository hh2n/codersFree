<x-app-layout>

    <div class="container py-8 grid grid-cols-5">

        <aside>
            <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
            <ul class="text-sm text-gray-500">
                <li class="leading-7 mb-1 border-l-4 pl-2 border-indigo-400">
                    <a href="">Información del curso</a>
                </li>
                <li class="leading-7 mb-1 border-l-4 pl-2 border-transparent">
                    <a href="">Lecciones del curso</a>
                </li>
                <li class="leading-7 mb-1 border-l-4 pl-2 border-transparent">
                    <a href="">Metas del curso</a>
                </li>
                <li class="leading-7 mb-1 border-l-4 pl-2 border-transparent">
                    <a href="">Estudiantes</a>
                </li>
            </ul>
        </aside>

        <div class="col-span-4 card">
            <div class="card-body text-gray-600">
                <h1 class="text-2xl font-bold">INFORMACIÓN DEL CURSO</h1>
                <hr class="mt-2 mb-6">
                <form action="{{route('instructor.courses.update', $course)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-4">
                        <label for="title_course" class="block text-gray-700">Título del curso</label>
                        <input 
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2"
                            type="text" 
                            id="title_course"
                            name="title_course"
                            placeholder="Introduce un título"
                            value="{{$course->title}}"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="slug_course" class="block text-gray-700">Slug del curso</label>
                        <input 
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2"
                            type="text" 
                            id="slug_course"
                            name="slug_course"
                            placeholder="Slug del curso"
                            value="{{$course->slug}}"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="subtitle_course" class="block text-gray-700">Subtítulo del curso</label>
                        <input 
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2"
                            type="text" 
                            id="subtitle_course"
                            name="subtitle_course"
                            placeholder="Introduce un subtítulo"
                            value="{{$course->subtitle}}"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="description_course" class="block text-gray-700">Descripción del curso</label>
                        <textarea
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-4"
                            id="description_course"
                            name="description_course"
                            placeholder="Descripción del curso"
                        >{{$course->description}}</textarea>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-4">
                            <label for="cmb_category" class="block text-gray-700">Categoría del curso</label>
                            <select 
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2"
                                name="cmb_category" 
                                id="cmb_category"
                            >
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" @if ($category->id == $course->category->id) @selected(true)
                                    
                                @endif >{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="cmb_level" class="block text-gray-700">Nivel del curso</label>
                            <select 
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2"
                                name="cmb_level" 
                                id="cmb_level"
                            >
                                @foreach ($levels as $level)
                                <option value="{{$level->id}}" @if ($level->id == $course->level->id) @selected(true)
                                    
                                @endif >{{$level->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="cmb_price" class="block text-gray-700">Precios del curso</label>
                            <select 
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2"
                                name="cmb_price" 
                                id="cmb_price"
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
                            <img 
                                src="{{Storage::url($course->image->url)}}"
                                class="w-full h-64 object-cover object-center border-double border-4 border-slate-500" 
                                id="picture"
                            />
                        </figure>

                        <div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat ducimus exercitationem inventore laudantium! Recusandae quo, odit sequi aspernatur sapiente aperiam officia consequatur officiis ratione et quam, quaerat quidem, voluptatem expedita?
                            </p>
                            <input
                                class="border-gray-600 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2"
                                type="file" 
                                name="image_curso" 
                                id="image_curso"
                                multiple
                                accept="image/*"
                            />

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
            </div>
        </div>

    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('/js/instructor/courses/form.js')}}"></script>
    </x-slot>

</x-app-layout>