<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexContoller;
use App\Http\Controllers\DaftarContoller;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowsController;

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

Route::get('/', [IndexContoller::class, 'index']);

Route::get('/daftar', [DaftarContoller::class, 'daftar']);

Route::post('/welcome', [DaftarContoller::class, 'kirim']);

Route::get('/data-table', function () {
    return view('halaman.data-table');
});

Route::get('/table', function () {
    return view('halaman.table');
});

// Route::get('/category', function () {
//     return view('halaman.category');
// });

Route::middleware(['auth'])->group(function () {
//CRUD
//create data
Route::get('/category/create', [CategoriesController::class, 'create']);
Route::post('category', [CategoriesController::class, 'store']);

//read data
Route::get('/category', [CategoriesController::class, 'index']);
Route::get('/category/{id}', [CategoriesController::class, 'show']); 

//update data
Route::get('/category/{id}/edit', [CategoriesController::class, 'edit']);
Route::put('/category/{id}', [CategoriesController::class, 'update']);

//delete data
Route::delete('/category/{id}', [CategoriesController::class, 'destroy']);

});
//CRUD Books
Route::resource("books", BooksController::class);

Auth::routes();

