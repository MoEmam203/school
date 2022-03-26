<?php

use App\Http\Controllers\ClassroomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware'=>'guest'],function(){
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth']
    ], function(){
        // Dashboard
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

        // Grades
        Route::resource('grades',GradeController::class)->except(['create','show','edit']);

        // Classrooms
        Route::post('/deleteAll',[ClassroomController::class,'deleteAll'])->name('classrooms.deleteAll');
        Route::post('/classrooms/filter',[ClassroomController::class,'filter'])->name('classrooms.filter');
        Route::resource('classrooms',ClassroomController::class)->except(['create','show','edit']);

        // Sections
        Route::resource('sections',SectionController::class)->except(['create','show','edit']);
        Route::post('/sections/getClassrooms/{id}',[SectionController::class,'getClassrooms'])->name('getClassrooms');

        // Parents
        Route::view('/parents','livewire.parents.show_form')->name('parents');

        // Teachers
        Route::resource('teachers',TeacherController::class)->except('show');

        // Students
        Route::resource('students',StudentController::class)->except('show');
        Route::post('/student/getClassrooms/{id}',[StudentController::class,'getClassrooms']);
        Route::post('/student/getSections/{id}',[StudentController::class,'getSections']);
    }
);