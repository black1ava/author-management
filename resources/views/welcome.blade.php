@extends('layout.index')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4>Management table</h4>
            </div>
            <table class="table table-dark table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Page</th>
                        <th>Description</th>
                        <th>Author</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($authors as $author)
                        @foreach($author->books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->page }}</td>
                                <td>{{ $book->description }}</td>
                                <td>
                                    <a href="{{ route('authors.show', $author) }}" class="card-link">{{ $author->name }}</a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection