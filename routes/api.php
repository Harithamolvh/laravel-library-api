<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;


Route::post('/authors', [LibraryController::class, 'createAuthor']);
Route::post('/books', [LibraryController::class, 'addBook']);
Route::post('/members', [LibraryController::class, 'registerMember']);
Route::post('/borrow', [LibraryController::class, 'borrowBook']);
Route::post('/return', [LibraryController::class, 'returnBook']);
Route::get('/members/{id}/borrowed-books', [LibraryController::class, 'listBorrowedBooks']);
