<x-app-layout>
    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">CREAR NUEVO CURSO</h1>
                <hr class="mt-2 mb-6">
                <form action="{{route('instructor.courses.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Título del curso</label>
                        <input 
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2 {{$errors->has('title')?'border-red-500':''}}"
                            type="text" 
                            id="title"
                            name="title"
                            placeholder="Introduce un título"
                        />
                        @error('title')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="slug" class="block text-gray-700">Slug del curso</label>
                        <input 
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2 {{$errors->has('slug')?'border-red-500':''}}"
                            type="text" 
                            id="slug"
                            name="slug"
                            readonly
                            placeholder="Slug del curso"
                        />

                        @error('slug')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="subtitle" class="block text-gray-700">Subtítulo del curso</label>
                        <input 
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2 {{$errors->has('subtitle')?'border-red-500':''}}"
                            type="text" 
                            id="subtitle"
                            name="subtitle"
                            placeholder="Introduce un subtítulo"
                        />

                        @error('subtitle')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Descripción del curso</label>
                        <textarea
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-4 {{$errors->has('description')?'border-red-500':''}}"
                            id="description"
                            name="description"
                            placeholder="Introduce una descripción"
                        ></textarea>

                        @error('description')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700">Categoría del curso</label>
                            <select 
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-2 {{$errors->has('category_id')?'border-red-500':''}}"
                                name="category_id" 
                                id="category_id"
                            >
                                <option hidden selected value="">-- Selecciona una categoría --</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
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
                                <option hidden selected value="">-- Selecciona un nivel --</option>
                                @foreach ($levels as $level)
                                <option value="{{$level->id}}">{{$level->name}}</option>
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
                                <option hidden selected value="">-- Selecciona un precio --</option>
                                @foreach ($prices as $price)
                                <option value="{{$price->id}}">{{$price->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>    
                    
                    <h1 class="text-2xl font-bold mt-8 mb-2">Imagen del Curso</h1>

                    <div class="grid grid-cols-2 gap-4">
                        <figure>
                            <img 
                                src="https://images.pexels.com/photos/5905709/pexels-photo-5905709.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                class="w-full h-64 object-cover object-center border-double border-4 border-slate-500" 
                                id="picture"
                            />
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
                            <i class="fas fa-save mr-2"></i> Guardar curso
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