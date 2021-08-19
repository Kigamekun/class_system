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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/coba',[StudentController::class,'coba']);
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [StudentController::class, 'profile'])->name('profile')->middleware('check_student_register');
Route::get('/learning', [StudentController::class, 'learning'])->name('learning')->middleware('check_student_register');
Route::get('/details_kelas/{classes}', [StudentController::class, 'details_kelas'])->name('details_kelas')->middleware('check_student_register');
Route::get('/task/{classes}/{course}', [StudentController::class, 'task'])->name('task')->middleware('check_student_register');
Route::get('/teachers_data', [StudentController::class, 'teachers_data'])->name('teachers_data')->middleware('check_student_register');
Route::post('/create_task', [StudentController::class, 'create_task'])->name('create_task');
Route::get('/download/{file}/{def}', [StudentController::class, 'download'])->name('download')->middleware('check_student_register');
Route::get('/download_zip/{def}', [StudentController::class, 'download_zip'])->name('download_zip')->middleware('check_student_register');


Route::get('/class_data/{classes}', [StudentController::class, 'class_fill'])->name('class_fill')->middleware('check_student_register');
Route::get('/class_data', [StudentController::class, 'class_data'])->name('class_data')->middleware('check_student_register');
Route::get('/user_data', [StudentController::class, 'user_data'])->name('user_data')->middleware('check_student_register');


Route::get('/task_view', [StudentController::class, 'task_view'])->name('task_view')->middleware('check_student_register');

Route::post('/answer_task', [StudentController::class, 'answer_task'])->name('answer_task')->middleware('check_student_register');
Route::get('/tugas_mapel/{course}', [StudentController::class, 'tugas_mapel'])->name('tugas_mapel')->middleware('check_student_register');

Route::get('/lihat_tugas/{task}', [StudentController::class, 'lihat_tugas'])->name('lihat_tugas')->middleware('check_student_register');

Route::post('/create_student', [StudentController::class, 'create_student'])->name('create_student')->middleware('check_student_register');

Route::get('/register_student', function () {
    return view('register_student');
});


Route::get('/absen',[StudentController::class,'absen']);

Route::post('/absent',[StudentController::class,'absent'])->name('absent');