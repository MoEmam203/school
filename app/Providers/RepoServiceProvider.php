<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Teacher
        $this->app->bind(
            'App\Repository\Teacher\TeacherRepositoryInterface',
            'App\Repository\Teacher\TeacherRepository'
        );

        // Student
        $this->app->bind(
            'App\Repository\Student\StudentRepositoryInterface',
            'App\Repository\Student\StudentRepository'
        );

        // Student Promotion
        $this->app->bind(
            'App\Repository\Student\Promotions\StudentPromotionRepositoryInterface',
            'App\Repository\Student\Promotions\StudentPromotionRepository',
        );

        // Student Graduated
        $this->app->bind(
            'App\Repository\Student\Graduated\GraduatedStudentRepositoryInterface',
            'App\Repository\Student\Graduated\GraduatedStudentRepository',
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
