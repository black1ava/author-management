<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorFormRequest;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(AuthorFormRequest $request)
    {
        $req = $request->except('_token');

        $author = new Author();
        $author->name = $req['name'];
        $author->email = $req['email'];
        $author->address = $req['address'];
        $author->website = $req['website'];

        $author->save();

        return redirect()->route('authors.index');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(AuthorFormRequest $request, Author $author)
    {
        $req = $request->except('_token');

        $author->name = $req['name'];
        $author->email = $req['email'];
        $author->address = $req['address'];
        $author->website = $req['website'];
        $author->save();

        return redirect()->route('authors.index');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index');
    }
}
