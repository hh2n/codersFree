<x-app-layout>

    <section class="bg-cover bg-bottom shadow-2xl" style="background-image: url({{asset('img/home/pexels-expressivestanley-1454360.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">

            <div class="w-full md:w-3/4 lg:w-1/2">
                <div class="backdrop-blur-md bg-white/30 rounded-3xl shadow p-4">
                    <h1 class="text-slate-800 font-bold text-3xl ">Domina la tecnología web</h1>
                    <p class="text-slate-800 text-lg mt-2 mb-4">Descubre los mejores cursos de programación, manuales y artículos que te ayudarán a convertirte en un profesional del desarrollo web.</p>
                </div>
                
                @livewire('search')
            </div>

        </div>
    </section>

    <section class="bg-gray-100 shadow-inner ">
        <h1 class="text-gray-600 text-center text-3xl mb-6 py-6 shadow">CONTENIDO</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 pb-6">
            <article class="shadow-xl">
                <figure>
                    <img class="rounded-t-xl h-36 w-full object-cover" src="{{asset('img/home/pexels-divinetechygirl-1181271.jpg')}}" alt="" />
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-600">Cursos y Proyectos</h1>
                </header>
                <p class="text-xs text-center text-gray-500 py-2 px-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et rem quam quae autem quidem excepturi fugit magnam aperiam nam placeat id minus.</p>
            </article>
            <article class="shadow-xl">
                <figure>
                    <img class="rounded-t-xl h-36 w-full object-cover" src="{{asset('img/home/pexels-alxs-919734.jpg')}}" alt="" />
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-600">Manual de Laravel</h1>
                </header>
                <p class="text-xs text-gray-500 py-2 px-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et rem quam quae autem quidem excepturi fugit magnam aperiam nam placeat id minus.</p>
            </article>
            <article class="shadow-xl">
                <figure>
                    <img class="rounded-t-xl h-36 w-full object-cover" src="{{asset('img/home/pexels-luis-gomes-166706-546819.jpg')}}" alt="" />
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-600">Blog</h1>
                </header>
                <p class="text-xs text-gray-500 py-2 px-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et rem quam quae autem quidem excepturi fugit magnam aperiam nam placeat id minus.</p>
            </article>
            <article class="shadow-xl">
                <figure>
                    <img class="rounded-t-xl h-36 w-full object-cover" src="{{asset('img/home/pexels-pixabay-356056.jpg')}}" alt="" />
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-600">Desarrollo Web</h1>
                </header>
                <p class="text-xs text-gray-500 py-2 px-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et rem quam quae autem quidem excepturi fugit magnam aperiam nam placeat id minus.</p>
            </article>
        </div>
    </section>

    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">
            ¿No sabes que curso llevar?
        </h1>
        <p class="text-center text-white p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <div class="flex justify-center mt-4">
            <a href="{{ route('courses.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Catálogo de Cursos
            </a>
        </div>
    </section>

    <section class="my-12">
        <h1 class="text-center text-3xl text-gray-500">ÚLTIMOS CURSOS</h1>
        <p class="text-center text-gray-500 text-sm mb-6 w-auto mx-36">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem labore dolore, sed rem commodi ad consequatur, voluptatum earum delectus minima debitis quae sapiente hic repudiandae laboriosam consectetur laudantium, reiciendis tempora.
        </p>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $item)
                <x-course-card :course="$item" />
            @endforeach
        </div>
    </section>

</x-app-layout>
