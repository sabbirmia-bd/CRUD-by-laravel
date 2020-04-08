@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-4 m-auto">
        <div class="card">
          <div class="card-header text-white bg-success">
            User Information
          </div>
          <div class="card-body">
            @if (session('data_add_status'))
              <div class="alert alert-success">
                {{ session('data_add_status') }}
              </div>
            @endif
            <form action="{{ url('user/post') }}" method="post">
              @csrf
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="add_name" class="form-control" placeholder="Enter Name">
              @error ('add_name')
                <span class="text-danger">
                  {{ $message }}
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea type="text" name="add_description" class="form-control" placeholder="Enter Description" rows="4"></textarea>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="add_email" class="form-control" placeholder="Enter Email">
              @error ('add_email')
                <span class="text-danger">
                  {{ $message }}
                </span>
              @enderror
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
