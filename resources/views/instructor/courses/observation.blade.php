<x-instructor-layout :course="$course">
    <h1 class="text-2xl font-bold">Observaciones del curso</h1>

    <hr class="mt-2 mb-6 shadow-lg border border-double">

    <div class="border border-double px-2 py-4 rounded-lg shadow-lg">
        {!! $course->observation->body !!}
        <hr>
    </div>

</x-instructor-layout>