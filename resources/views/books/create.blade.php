@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-title">
        <div class="d-flex justify-content-between flex-row">
          <h4>New book</h4>
          <a href="{{ url()->previous() }}" class="card-link">Back</a>
        </div>
      </div>
      <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
          @error('title')
            <small class="invalid-feedback">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="page">Page</label>
          <input type="number" name="page" id="page" class="form-control @error('page') is-invalid @enderror">
          @error('page')
            <small class="invalid-feedback">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <select name="author_id" id="author" class="custom-select @error('author_id') is-invalid @enderror">
            <option value="">Please choose an author</option>
            @foreach($authors as $author)
              <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
          </select>
          @error('author_id')
            <small class="invalid-feedback">{{ $message }}</small>
          @enderror
        </div>
        <button class="btn btn-primary">Create</button>
      </form>
    </div>
  </div>
@endsection