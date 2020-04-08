@extends('layouts.app')

@section('content')
  <div class="col-md-4 m-auto">
    <div class="card">
      <div class="card-header">Add Category</div>
      <div class="card-body">
        <form action="{{ url('add/category/update/post') }}" method="post">
          @csrf
          <div class="form-group">
            <label>Category Name</label>
            <input type="hidden" name="category_id" value="{{ $category_id }}">
            <input type="text" name="category_name" value="{{ $category }}" class="form-control" placeholder="Enter Your Category Name">
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
