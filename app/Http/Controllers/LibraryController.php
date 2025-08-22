<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Member;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function createAuthor(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
        ]);
        $author = Author::create($request->all());
        return response()->json($author, 201);
    }

    public function addBook(Request $request) {
        $request->validate([
            'author_id' => 'required|exists:authors,id',
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn',
        ]);
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    public function registerMember(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
        ]);
        $member = Member::create($request->all());
        return response()->json($member, 201);
    }

    public function borrowBook(Request $request) {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
        ]);

        $book = Book::findOrFail($request->book_id);
        $member = Member::findOrFail($request->member_id);

        if ($book->stock < 1) {
            return response()->json(['message' => 'This book is not available for borrowing.'], 400);
        }

        $activeBorrowsCount = $member->borrows()->whereNull('returned_at')->count();
        if ($activeBorrowsCount >= 3) {
            return response()->json(['message' => 'Member has reached the maximum borrow limit (3 books).'], 400);
        }

        $book->decrement('stock');
        $borrow = $member->borrows()->create([
            'book_id' => $book->id,
            'borrowed_at' => now(),
        ]);

        return response()->json(['message' => 'Book borrowed successfully.', 'borrow' => $borrow], 201);
    }

    public function returnBook(Request $request) {
        $request->validate([
            'borrow_id' => 'required|exists:borrows,id',
        ]);

        $borrow = Borrow::with('book')->findOrFail($request->borrow_id);

        if ($borrow->returned_at) {
            return response()->json(['message' => 'This book has already been returned.'], 400);
        }

        $borrow->update(['returned_at' => now()]);
        $borrow->book->increment('stock');

        return response()->json(['message' => 'Book returned successfully.'], 200);
    }
    
    public function listBorrowedBooks($id) {
        $member = Member::with(['borrows' => function($query) {
                    $query->whereNull('returned_at');
                }, 'borrows.book.author'])->findOrFail($id);

        $borrowedBooks = $member->borrows->map(function ($borrow) {
            return [
                'borrow_id' => $borrow->id,
                'book_title' => $borrow->book->title,
                'book_isbn' => $borrow->book->isbn,
                'author_name' => $borrow->book->author->name,
                'borrowed_at' => $borrow->borrowed_at,
            ];
        });

        return response()->json($borrowedBooks, 200);
    }
}
