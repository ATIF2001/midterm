<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

Route::get('/admins', [AdminController::class, 'index']);
Route::get('/admins/{id}', [AdminController::class, 'show']);
Route::post('/admins', [AdminController::class, 'store']);
Route::put('/admins/{id}', [AdminController::class, 'update']);
Route::delete('/admins/{id}', [AdminController::class, 'destroy']);
















// Route::get('/', function () {
//     $name = 'Atif';
//     $skills = ['HTML', 'CSS', 'PHP', 'Laravel'];
//     $isLoggedIn = true;

//     return view('welcome', 
//     compact('name', 'skills', 'isLoggedIn'));
// });

use app\Http\controllers\pageController;

Route::get('/', [pageController::class, 'home']);


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

Route::redirect("old-home","new-home");


 Route::view('/home', 'home');

 Route::view('/head', 'head');

// Route::view('/', 'index');
Route::view('/login', 'login', ['company' => 'LuxeReply AI']);

// Route::get('/login', function () {
//     return view('login');
// });
