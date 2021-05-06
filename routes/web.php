<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/coba',[StudentController::class,'coba']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
Route::get('/learning', [StudentController::class, 'learning'])->name('learning');
Route::get('/details_kelas/{classes}', [StudentController::class, 'details_kelas'])->name('details_kelas');
Route::get('/task/{classes}/{course}', [StudentController::class, 'task'])->name('task');
Route::get('/teachers_data', [StudentController::class, 'teachers_data'])->name('teachers_data');
Route::post('/create_task', [StudentController::class, 'create_task'])->name('create_task');
Route::get('/download/{file}/{def}', [StudentController::class, 'download'])->name('download');

Route::get('/class_data/{classes}', [StudentController::class, 'class_fill'])->name('class_fill');
Route::get('/class_data', [StudentController::class, 'class_data'])->name('class_data');
Route::get('/user_data', [StudentController::class, 'user_data'])->name('user_data');


Route::get('/task_view', [StudentController::class, 'task_view'])->name('task_view');

Route::post('/answer_task', [StudentController::class, 'answer_task'])->name('answer_task');
Route::get('/tugas_mapel/{course}', [StudentController::class, 'tugas_mapel'])->name('tugas_mapel');

Route::get('/lihat_tugas/{task}', [StudentController::class, 'lihat_tugas'])->name('lihat_tugas');

