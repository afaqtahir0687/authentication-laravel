<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AttributeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpensisController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrincipleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TaskaddController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Contracts\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        // dd(\Auth::user());
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');

});

Route::prefix('role')->name('role.')->group(function () {
    Route::get('index', [App\Http\Controllers\RolesController::class, 'index'])->name('index');
    Route::get('create', [App\Http\Controllers\RolesController::class, 'create'])->name('create');
    Route::get('show/{id}', [App\Http\Controllers\RolesController::class, 'show'])->name('show');
    Route::post('store', [App\Http\Controllers\RolesController::class, 'store'])->name('store');
    Route::get('edit/{id}', [App\Http\Controllers\RolesController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [App\Http\Controllers\RolesController::class, 'update'])->name('update');
    Route::get('delete/{id}', [App\Http\Controllers\RolesController::class, 'destroy'])->name('destroy');
});


Route::controller(BooksController::class)->prefix('books')->group(function () {
    Route::get('', 'index')->name('books');
    Route::get('create', 'create')->name('books.create');
    Route::post('store', 'store')->name('books.store');
    Route::get('show/{id}', 'show')->name('books.show');
    Route::get('edit/{id}', 'edit')->name('books.edit');
    Route::post('edit/{id}', 'update')->name('books.update');
    Route::delete('destroy/{id}', 'destroy')->name('books.destroy');
});

Route::controller(StudentsController::class)->prefix('students')->group(function () {
    Route::get('create', 'create')->name('students.create');
    Route::post('store', 'store')->name('students.store');
    Route::get('show/{id}', 'show')->name('students.show');
    Route::get('', 'index')->name('students');
    Route::get('edit/{id}', 'edit')->name('students.edit');
    Route::post('update/{id}', 'update')->name('students.update');
    Route::get('delete/{id}', 'destroy')->name('students.destroy');
});

Route::controller(PrincipleController::class)->prefix('principle')->group(function () {
    Route::get('create', 'create')->name('principle.create');
    Route::post('store', 'store')->name('principle.store');
    Route::get('show/{id}', 'show')->name('principle.show');
    Route::get('', 'index')->name('principle');
    Route::get('edit/{id}', 'edit')->name('principle.edit');
    Route::post('update/{id}', 'update')->name('principle.update');
    Route::get('delete/{id}', 'destroy')->name('principle.destroy');
});

Route::controller(TeachersController::class)->prefix('teachers')->group(function () {
    Route::get('create', 'create')->name('teachers.create');
    Route::post('store', 'store')->name('teachers.store');
    Route::get('show/{id}', 'show')->name('teachers.show');
    Route::get('', 'index')->name('teachers');
    Route::get('edit/{id}', 'edit')->name('teachers.edit');
    Route::post('update/{id}', 'update')->name('teachers.update');
    Route::get('delete/{id}', 'destroy')->name('teachers.destroy');
});

Route::controller(AccountsController::class)->prefix('accounts')->group(function () {
    Route::get('create', 'create')->name('accounts.create');
    Route::post('store', 'store')->name('accounts.store');
    Route::get('', 'index')->name('accounts');
    Route::get('edit/{id}', 'edit')->name('accounts.edit');
    Route::get('show/{id}', 'show')->name('accounts.show');
    Route::post('update/{id}', 'update')->name('accounts.update');
    Route::get('delete/{id}', 'destroy')->name('accounts.destroy');
});


Route::prefix('permission')->group(function () {
    Route::get('index', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission/index');
    Route::get('create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permission/create');
    Route::post('store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission/store');
});


Route::controller(ExpensisController::class)->prefix('expensis')->group(function () {
    Route::get('create', 'create')->name('expensis.create');
    Route::post('store', 'store')->name('expensis.store');
    Route::get('show/{id}', 'show')->name('expensis.show');
    Route::get('', 'index')->name('expensis');
    Route::get('edit/{id}', 'edit')->name('expensis.edit');
    Route::post('update/{id}', 'update')->name('expensis.update');
    Route::get('delete/{id}', 'destroy')->name('expensis.destroy');
});

Route::controller(UserController::class)->prefix('users')->group(function () {
    Route::get('create', 'create')->name('users.create');
    Route::post('store', 'store')->name('users.store');
    Route::get('index', 'index')->name('users.index');
    Route::get('edit/{id}', 'edit')->name('users.edit');
    Route::get('show/{id}', 'show')->name('users.show');
    Route::post('update-user-status', 'updateStatus')->name('users.updateStatus')->middleware('auth');
    Route::post('update/{id}', 'update')->name('users.update');
    Route::get('delete/{id}', 'destroy')->name('users.destroy');
});


Route::controller(CategoryController::class)->prefix('category')->group(function () {
    Route::get('create', 'create')->name('category.create');
    Route::post('store', 'store')->name('category.store');
    Route::get('index', 'index')->name('category/index');
    Route::get('show/{id}', 'show')->name('category.show');
    Route::get('edit/{id}', 'edit')->name('category.edit');
    Route::post('update/{id}', 'update')->name('category.update');
    Route::get('delete/{id}', 'destroy')->name('category.destroy');

});

Route::controller(AttributeController::class)->prefix('attribute')->group(function (){
    Route::get('create', 'create')->name('attribute.create');
    Route::post('store', 'store')->name('attribute.store');
    Route::get('index', 'index')->name('attribute.index');
    Route::get('edit/{id}', 'edit')->name('attribute.edit');
    Route::get('show/{id}', 'show')->name('attribute.show');
    Route::post('update/{id}', 'update')->name('attribute.update');
    Route::get('delete/{id}', 'destroy')->name('attribute.destroy');
});


Route::controller(TaskController::class)->prefix('task')->group(function () {
    Route::get('', 'index')->name('task');
    Route::get('create', 'create')->name('task.create');
    Route::post('store', 'store')->name('task.store');
    Route::get('show/{id}', 'show')->name('task.show');
    Route::get('edit/{id}', 'edit')->name('task.edit');
    Route::post('edit/{id}', 'update')->name('task.update');
    Route::delete('destroy/{id}', 'destroy')->name('task.destroy');
});
Route::controller(TaskaddController::class)->prefix('taskadd')->group(function () {
    Route::get('', 'index')->name('taskadd');
    Route::get('create', 'create')->name('taskadd.create');
    Route::post('store', 'store')->name('taskadd.store');
});

// Route::get('users/create', [App\Http\Controllers\UserController::class, 'create']);
// Route::post('users/store', [App\Http\Controllers\UserController::class, 'store']);

Route::controller(PostController::class)->prefix('posts')->group(function (){
    Route::get('create', 'create')->name('posts.create');
    Route::post('store', 'store')->name('posts.store');
    Route::get('index', 'index')->name('posts.index');
    Route::get('edit/{id}', 'edit')->name('posts.edit');
    Route::get('show/{id}', 'show')->name('posts.show');
    Route::post('update/{id}', 'update')->name('posts.update');
    Route::get('delete/{id}', 'destroy')->name('posts.destroy');
});