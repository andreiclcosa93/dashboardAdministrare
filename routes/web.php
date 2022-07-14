<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;

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

Route::get('/dashboard', function () {
    return view('admin.control-panel');
})->middleware(['auth'])->name('dashboard');

// start routele de administare

Route::prefix('admin')->middleware(['admin'])->group( function(){

    Route::get('/users', [UsersController::class, 'showUsers'])->name('users');

    Route::get('/user-new', [UsersController::class, 'newUser'])->name('users.new');

    Route::post('/user-new', [UsersController::class, 'createUser'])->name('users.create');

    // editare users

    Route::get('/user-edit/{id}', [UsersController::class, 'showEditForm'])->name('users.editForm');

    Route::put('/user-edit/{id}', [UsersController::class, 'updateUserForm'])->name('users.update');
});

// end routele de administare


require __DIR__.'/auth.php';
