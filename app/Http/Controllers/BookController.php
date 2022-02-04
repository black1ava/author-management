<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\BookFormRequest;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(BookFormRequest $request)
    {
        $req = $request->except('_token');

        $book = new Book();
        $book->title = $req['title'];
        $book->page = $req['page'];
        $book->description = $req['description'];

        $author = Author::findOrFail($req['author_id']);
        $author->books()->save($book);

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(BookFormRequest $request, Book $book)
    {
        $req = $request->except('_token');

        $book->title = $req['title'];
        $book->page = $req['page'];
        $book->description = $req['description'];
        $book->author_id = $req['author_id'];
        $book->save();

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
