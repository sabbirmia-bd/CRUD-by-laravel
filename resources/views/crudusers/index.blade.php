@extends('layouts.app')

@section('content')
  <div class="container">
    @if (session('delete_status'))
      <div class="col-md-12">
        <div class="alert alert-danger">
          {{ session('delete_status') }}
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
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">User Listing
            <a href="{{ url('crud/users/form') }}" class="btn btn-info text-white">Add User</a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Sl No</th>
                  <th>User Name</th>
                  <th>Discription</th>
                  <th>Email</th>
                  <th>Create At</th>
                  <th>Last Update</th>
                  <th>Action</th>
                </tr>
                <tbody>
                  @forelse ($crudoperation as $crudoperate)
                    <tr>
                      <td>{{ $crudoperation->firstItem() + $loop->index }}</td>
                      <td>{{ $crudoperate->add_name }}</td>
                      <td>{{ $crudoperate->add_description }}</td>
                      <td>{{ $crudoperate->add_email }}</td>
                      <td>
                        @if ($crudoperate->created_at)
                          {{ $crudoperate->created_at->diffForHumans() }}
                        @else
                          <span class="text-danger">
                            --
                          </span>
                        @endif
                      </td>
                      <td>
                        @if ($crudoperate->updated_at)
                          {{ $crudoperate->updated_at->diffForHumans() }}
                        @else
                          <span class="text-danger">
                            --
                          </span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ url('user/update') }}/{{ $crudoperate->id }}" class="btn btn-success">Edit</a>
                        <a href="{{ url('user/view') }}/{{ $crudoperate->id }}" class="btn btn-info">View</a>
                        <a href="{{ url('user/delete') }}/{{ $crudoperate->id }}" class="btn btn-danger">Delete</a>

                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="50" class="text-danger text-center">NO data to show</td>
                    </tr>
                  @endforelse
                </tbody>
              </thead>
            </table>
          </div>
          {{ $crudoperation->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
