<x-app-layout>
    <section class="bg-cover bg-bottom shadow-2xl" style="background-image: url({{asset('img/courses/pexels-nemuel-6424583.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">

            <div class="w-full md:w-3/4 lg:w-1/2">
                <div class="backdrop-blur-md bg-white/30 rounded-3xl shadow p-4">
                    <h1 class="text-slate-800 font-bold text-3xl ">Los mejores cursos de programación ¡GRATIS! y en español</h1>
                    <p class="text-slate-800 text-lg mt-2 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore dignissimos quos saepe illum hic rerum obcaecati nostrum sapiente veritatis quia facere, iusto ullam doloribus.</p>
                </div>
                
                @livewire('search')
            </div>

        </div>
    </section>

    @livewire('course-index')

</x-app-layout>