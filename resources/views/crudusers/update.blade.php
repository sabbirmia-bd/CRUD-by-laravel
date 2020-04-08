@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-4 m-auto">
        <div class="card">
          <div class="card-header">
            Change Description
          </div>
          <div class="card-body">
            <form action="{{ url('user/update/post') }}" method="post">
              @csrf
              <div class="form-group">
                <lagel>Description</lagel>
                <input type="hidden" name="crudoperation_id" value="{{ $crudoperation_id }}">
                <textarea type="text" name="user_update" class="form-control" rows="4" value="{{ $add_description }}"></textarea>
                @error ('user_update')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-info">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
