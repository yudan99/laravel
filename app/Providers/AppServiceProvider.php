<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Section::observe(\App\Observers\SectionObserver::class);
		\App\Models\Course::observe(\App\Observers\CourseObserver::class);
		\App\Models\Fiel::observe(\App\Observers\FielObserver::class);
        \App\Models\FileShare::observe(\App\Observers\FileShareObserver::class);
        \App\Models\Chapter::observe(\App\Observers\ChapterObserver::class);
        \App\Models\Edition::observe(\App\Observers\EditionObserver::class);

        //
    }
}
