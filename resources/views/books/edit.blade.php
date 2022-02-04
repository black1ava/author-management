@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-title">
        <div class="d-flex justify-content-between flex-row">
          <h4>Edit</h4>
          <a href="{{ url()->previous() }}" class="card-link">Back</a>
        </div>
      </div>
      <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $book->title }}">
          @error('title')
            <small class="invalid-feedback">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="page">Page</label>
          <input type="number" name="page" id="page" class="form-control @error('page') is-invalid @enderror" value="{{ $book->page }}">
          @error('page')
            <small class="ininvalid-feeback">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $book->descrption }}</textarea>
        </div>
        <div class="form-group">
          <label for="author">Author</label>
          <select name="author_id" id="author" class="custom-select @error('author_id') is-invalid @enderror">
            <option value="">Please choose an author</option>
            @foreach($authors as $author)
              <option value="{{ $author->id }}" @if($author->id === $book->author->id) selected="selected"  @endif>{{ $author->name }}</option>
            @endforeach
          </select>
          @error('author_id')
            <small class="invalid-feedback">{{ $message }}</small>
          @enderror
        </div>
        <button class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
@endsection