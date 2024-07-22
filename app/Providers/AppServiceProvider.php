<?php

namespace App\Providers;

use App\Models\Lesson;
use App\Models\Section;
use App\Observers\LessonObserver;
use App\Observers\SectionObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {

        Lesson::observe(LessonObserver::class);
        Section::observe(SectionObserver::class);

        Blade::directive('routeIs', function ($expression) {
            return "<?php if(Request::url() == route($expression)): ?>";
        });
    }
}
