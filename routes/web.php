<?php

use App\Http\Controllers\addController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\delController;
use App\Http\Controllers\editController;
use App\Http\Controllers\viewController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});
Route::controller(Controller::class)->group(function () {
    Route::GET('/', 'welcome')->name('welcome');
    Route::GET('/logout', 'logout')->name('logout');

    Route::POST('/login', 'login')->name('login');
});
Route::controller(viewController::class)->group(function () {
    Route::GET('/index', 'index')->name('index');
    Route::GET('/lecturer', 'lecturer')->name('lecturer');
    Route::GET('/student', 'student')->name('student');
    Route::GET('/officer', 'officer')->name('officer');
    Route::GET('/officer_add', 'officer_add')->name('officer_add');
    Route::GET('/officer_edit/{id}', 'officer_edit')->name('officer_edit');
    Route::GET('/building', 'building')->name('building');
    Route::GET('/ed_type', 'ed_type')->name('ed_type');
    Route::GET('/ed', 'ed')->name('ed');
    Route::GET('/room', 'room')->name('room');
    Route::GET('/room_add', 'room_add')->name('room_add');
    Route::GET('/at_title', 'at_title')->name('at_title');
    Route::GET('/at', 'at')->name('at');
    Route::GET('/at_record', 'at_record')->name('at_record');
    Route::GET('/report', 'report')->name('report');
    Route::GET('/report/search', 'report_search')->name('report_search');
    Route::GET('/at_record/search', 'at_record_search')->name('at_record_search');

    Route::GET('/room_edit/{id}', 'room_edit')->name('room_edit');
    Route::GET('/at_form/{id}', 'at_form')->name('at_form');
    Route::GET('/at_view/{id}', 'at_view')->name('at_view');
});
Route::controller(addController::class)->group(function () {
    Route::POST('/add_lecturer', 'add_lecturer')->name('add_lecturer');
    Route::POST('/add_student', 'add_student')->name('add_student');
    Route::POST('/add_officer', 'add_officer')->name('add_officer');
    Route::POST('/add_building', 'add_building')->name('add_building');
    Route::POST('/add_ed_type', 'add_ed_type')->name('add_ed_type');
    Route::POST('/add_ed', 'add_ed')->name('add_ed');
    Route::POST('/add_room', 'add_room')->name('add_room');
    Route::POST('/add_at', 'add_at')->name('add_at');
    Route::POST('/up_student', 'up_student')->name('up_student');
    Route::POST('/up_lecturer', 'up_lecturer')->name('up_lecturer');
    Route::POST('/up_officer', 'up_officer')->name('up_officer');
});
Route::controller(editController::class)->group(function () {
    Route::POST('/edit_lecturer', 'edit_lecturer')->name('edit_lecturer');
    Route::POST('/edit_student', 'edit_student')->name('edit_student');
    Route::POST('/edit_officer', 'edit_officer')->name('edit_officer');
    Route::POST('/edit_building', 'edit_building')->name('edit_building');
    Route::POST('/edit_ed_type', 'edit_ed_type')->name('edit_ed_type');
    Route::POST('/edit_ed', 'edit_ed')->name('edit_ed');
    Route::POST('/edit_room', 'edit_room')->name('edit_room');
    Route::POST('/edit_at_title', 'edit_at_title')->name('edit_at_title');

});
Route::controller(delController::class)->group(function () {
    Route::GET('/del_lecturer/{id}', 'del_lecturer')->name('del_lecturer');
    Route::GET('/del_student/{id}', 'del_student')->name('del_student');
    Route::GET('/del_building/{id}', 'del_building')->name('del_building');
    Route::GET('/del_officer/{id}', 'del_officer')->name('del_officer');
    Route::GET('/del_ed_type/{id}', 'del_ed_type')->name('del_ed_type');
    Route::GET('/del_ed/{id}', 'del_ed')->name('del_ed');
    Route::GET('/del_room/{id}', 'del_room')->name('del_room');
    Route::GET('/del_at/{id}', 'del_at')->name('del_at');
});
