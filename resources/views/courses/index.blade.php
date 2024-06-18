<x-app-layout>
    <section class="bg-cover bg-bottom shadow-2xl" style="background-image: url({{asset('img/courses/pexels-nemuel-6424583.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">

            <div class="w-full md:w-3/4 lg:w-1/2">
                <div class="backdrop-blur-md bg-white/30 rounded-3xl shadow p-4">
                    <h1 class="text-slate-800 font-bold text-3xl ">Los mejores cursos de programación ¡GRATIS! y en español</h1>
                    <p class="text-slate-800 text-lg mt-2 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore dignissimos quos saepe illum hic rerum obcaecati nostrum sapiente veritatis quia facere, iusto ullam doloribus.</p>
                </div>
                
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input 
                        class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                        type="search" 
                        name="search" 
                        placeholder="Search"
                    />
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-200 font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
                        Buscar
                    </button>
                </div>
            </div>

        </div>
    </section>

    @livewire('course-index')

</x-app-layout>