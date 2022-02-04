@extends('layout.index')
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-title">
        <div class="d-flex flex-row justify-content-between">
          <h4>New author</h4>
          <a href="{{ url()->previous() }}" class="card-link">Back</a>
        </div>
        <form action="{{ route('authors.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
            @error('name')
              <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
            @error('email')
              <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror">
            @error('address')
              <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="website">Webite</label>
            <input type="text" name="website" id="website" class="form-control">
          </div>
          <button class="btn btn-primary">Create</button>
        </form>
      </div>
    </div>
  </div>
@endsection