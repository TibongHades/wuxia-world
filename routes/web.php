<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function() {
    return Inertia('Home');
});

Route::get('/book-list', [BookController::class, 'index'])->name('BookList');
Route::get('/pages/csv-all', [BookController::class, 'generateCSV']);
Route::get('/books/pdf', [BookController::class, 'pdf']);
Route::get('/books/{id}', [BookController::class, 'show'])->name('BookDetail');


Route::post('/upload-csv', [BookController::class, 'uploadCSV'])->name('upload-csv');

Route::get('/list', function() {
    return Inertia('List');
});

Route::get('/qrbooks', [BookController::class, 'allQrBooks'])->name('allQrBooks');
Route::get('/qrscanner', [BookController::class, 'scan']);
Route::get('/upload-csv-form', [BookController::class, 'showUploadForm'])->name('upload-csv-form');
require __DIR__.'/auth.php';
