@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-title">
        <div class="d-flex flex-row justify-content-between">
          <h4>Author details</h4>
          <a href="{{ url()->previous() }}" class="card-link">Back</a>
        </div>
        <table class="table table-dark table-striped table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Website</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $author->id }}</td>
              <td>{{ $author->name }}</td>
              <td>{{ $author->email }}</td>
              <td>{{ $author->address }}</td>
              <td>{{ $author->website }}</td>
              <td>
                <div class="d-flex flex-row justify-content-between">
                  <a href="{{ route('authors.edit', $author) }}" class="card-link">Edit</a>
                  <a href="{{ route('authors.destroy', $author)}}" class="card-link" onclick="event.preventDefault(); document.getElementById('{{ $author->id }}').submit();">Delete</a>
                  <form action="{{ route('authors.destroy', $author) }}" class="sr-only" id="{{ $author->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                  </form>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection