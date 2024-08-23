<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('/', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register/user', [RegisterController::class, 'register'])->name('user_register');

Route::get('/home', [NoteController::class, 'index'])->name('home');
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('/notes/{id}/edit', [NoteController::class, 'edit'])->name('notes.edit');
Route::put('/notes/{id}', [NoteController::class, 'update'])->name('notes.update');
Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');
