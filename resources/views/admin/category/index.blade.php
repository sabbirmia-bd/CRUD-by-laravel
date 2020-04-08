@extends('layouts.app')

@section('content')
  <div class="cantainer">
    @if (session('add_category'))
      <div class="col-md-12">
        <div class="alert alert-success">
          {{ session('add_category') }}
        </div>
      </div>
    @endif
    @if (session('update_status'))
      <div class="col-md-12">
        <div class="alert alert-success">
          {{ session('update_status') }}
        </div>
      </div>
    @endif
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            List
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Sl No</th>
                  <th>id No</th>
                  <th>Category Name</th>
                  <th>User Id</th>
                  <th>Created_at</th>
                  <th>Active</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($categories as $category)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ App\User::find($category->user_id)->name }}</td>
                    <td>{{ $category->created_at->format('d/m/Y h:i:s A') }}</td>
                    <td>
                      <div class="button-group text-white">
                        <a href="{{ url('add/category/update') }}/{{ $category->id }}" class="btn btn-info">Update</a>
                        <a href="{{ url('category/delete') }}/{{ $category->id }}" class="btn btn-danger">Delete</a>
                      </div>
                    </td>
                  </tr>
                  @empty
                <tr>
                  <td class="col">No data to show</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="card mt-5">
          <div class="card-header">
            List(Deleted)
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Sl No</th>
                  <th>id No</th>
                  <th>Category Name</th>
                  <th>User Id</th>
                  <th>Created_at</th>
                  <th>Active</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($onlyTrashed as $Trashed)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $Trashed->id }}</td>
                    <td>{{ $Trashed->category_name }}</td>
                    <td>{{ App\User::find($Trashed->user_id)->name }}</td>
                    <td>{{ $Trashed->created_at->format('d/m/Y h:i:s A') }}</td>
                    <td>
                      <div class="button-group text-white">
                        <a href="{{ url('category/restore') }}/{{ $Trashed->id }}" class="btn btn-info">Restore</a>
                        <a href="{{ url('category/forcedeletes') }}/{{ $Trashed->id }}" class="btn btn-danger">Herd</a>
                      </div>
                    </td>
                  </tr>
                  @empty
                <tr>
                  <td class="col">No data to show</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">Add Category</div>
          <div class="card-body">
            <form action="{{ url('add/category/post') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="category_name"  class="form-control" placeholder="Enter Your Category Name">
                @error ('category_name')
                {{ $message }}
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
