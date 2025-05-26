<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|--------------------------------------------------------------------------
*/


// ✅ Admin CRUD Routes (full resource controller)
Route::get('/admins', [AdminController::class, 'index'])->name('admins.index'); // List all admins
Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create'); // Show create form
Route::post('/admins', [AdminController::class, 'store'])->name('admins.store'); // Save new admin
Route::get('/admins/{id}', [AdminController::class, 'show'])->name('admins.show'); // Show a single admin
Route::get('/admins/{id}/edit', [AdminController::class, 'edit'])->name('admins.edit'); // Edit form
Route::put('/admins/{id}', [AdminController::class, 'update'])->name('admins.update'); // Update admin
Route::delete('/admins/{id}', [AdminController::class, 'destroy'])->name('admins.destroy'); // Delete admin

// 🔁 OR: Use Laravel resource route for all above automatically (optional)
// Route::resource('admins', AdminController::class); 

// ✅ User-Related Routes
Route::get('/create-user-profile', [UserController::class, 'createUserWithProfile']);
Route::get('/user/{id}/posts', [UserController::class, 'addPostsToUser']);
Route::get('/user/{id}/roles', [UserController::class, 'assignRolesToUser']);
Route::get('/user/{id}/details', [UserController::class, 'getUserWithAllRelations']);

// ✅ Basic Test Web View (blade) -> Passing data from routes to views

Route::get('/testView', function () {
    $name = 'Atif';
    $skills = ['HTML', 'CSS', 'PHP', 'Laravel'];
    $isLoggedIn = true;
    return view('welcome', compact('name', 'skills', 'isLoggedIn'));
});

// ✅ Static Page Routes
Route::redirect('/old-home', '/new-home');
Route::view('/home', 'home');
Route::view('/', 'head');
//Route::view('/login', 'login', ['company' => 'LuxeReply AI']);



use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

// Home route: accessible only if session has user_id
Route::view('/', 'head')->name('home');
