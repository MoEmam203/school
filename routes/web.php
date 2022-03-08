<?php

use App\Http\Controllers\ClassroomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SectionController;

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
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::resource('grades',GradeController::class)->except(['create','show','edit']);
        Route::post('/deleteAll',[ClassroomController::class,'deleteAll'])->name('classrooms.deleteAll');
        Route::post('/classrooms/filter',[ClassroomController::class,'filter'])->name('classrooms.filter');
        Route::resource('classrooms',ClassroomController::class)->except(['create','show','edit']);
        Route::resource('sections',SectionController::class)->except(['create','show','edit']);
        Route::post('/sections/getClassrooms/{id}',[SectionController::class,'getClassrooms'])->name('getClassrooms');
    }
);