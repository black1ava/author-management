@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-title">
        <div class="d-flex flex-row justify-content-between">
          <h4>Books table</h4>
          <a href="{{ route('books.create') }}" class="card-link">New book</a>
        </div>
        <table class="table table-dark table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Page</th>
              <th>Description</th>
              <th>Author</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($books as $book)
              <td>{{ $book->id }}</td>
              <td>{{ $book->title }}</td>
              <td>{{ $book->page }}</td>
              <td>{{ $book->description }}</td>
              <td>{{ $book->author->name }}</td>
              <td>
                <div class="d-flex flex-row justify-content-between">
                  <a href="{{ route('books.edit', $book) }}" class="card-link">Edit</a>
                  <a href="{{ route('books.show', $book) }}" class="card-link">Show</a>
                  <a href="{{ route('books.destroy', $book) }}" class="card-link" onclick="event.preventDefault(); document.getElementById('{{ $book->id }}').submit(); ">Delete</a>
                  <form action="{{ route('books.destroy', $book) }}" id="{{ $book->id }}" method="POST" class="sr-only">
                    @csrf
                    @method('DELETE')
                  </form>
                </div>
              </td>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection