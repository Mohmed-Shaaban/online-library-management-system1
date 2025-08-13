<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\User;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index', [
            'books' => Book::paginate(5)
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'  => ['required', 'unique:books', 'max:255'],
            'author' => ['required'],
        ]);

        Book::create($request->only([
            'title',
            'author',
            'description',
            'publication_date'
        ]));

        return redirect()->to('/books');
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (is_null($book)) {
            return redirect()
                ->route('books.index')
                ->with('error', 'Book not found.');
        }

        return view('books.show')->with('book', $book);
    }

    public function edit($id)
    {
        return view('books.edit', [
            'book' => Book::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'  => ['required', 'max:255'],
            'author' => ['required'],
        ]);

        $book = Book::findOrFail($id);
        $book->fill($request->only([
            'title',
            'author',
            'description',
            'publication_date'
        ]));

        $book->save();

        return redirect()->to('/books');
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->to('/books');
    }

    public function borrow(Book $book)
    {
        $user = Auth::user();

        if ($user->usertype !== 'student') {
            return back()->withErrors('Only students can borrow books.');
        }

        if ($book->is_borrowed) {
            return back()->withErrors('This book is already borrowed.');
        }

        $currentCount = Book::where('borrowed_by', $user->id)->count();

        if ($currentCount >= User::MAX_BORROW_LIMIT) {
            return back()->withErrors('You have reached your borrowing limit.');
        }

        $book->update([
            'borrowed_by' => $user->id,
            'borrowed_at' => now(),
            'due_date'    => now()->addDays(7),
            'is_borrowed' => true,
        ]);

        return back()->withSuccess('You have successfully borrowed the book.');
    }

    public function returnBook(Book $book)
    {
        if ($book->borrowed_by !== Auth::id()) {
            return back()->with('error', 'You cannot return a book you didn\'t borrow.');
        }

        $book->update([
            'returned_at' => now(),
            'borrowed_by' => null,
            'is_borrowed' => false,
            'borrowed_at' => null
        ]);

        return redirect()
            ->route('books.index')
            ->with('success', 'You have successfully returned the book.');
    }

    public function borrowed_Books()
    {
        return view('books.borrowed', [
            'borrowed_Books'     => Book::whereNotNull('borrowed_by')->get(),
            'countBorrowedBook'  => Book::whereNotNull('borrowed_by')->count(),
        ]);
    }
}
