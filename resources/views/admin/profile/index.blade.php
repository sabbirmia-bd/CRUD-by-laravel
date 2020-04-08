@extends('layouts.app')

@section('content')
  <div class="container">
    @if (session('profile_update_status'))
      <div class="row">
            <div class="col-md-12">
              <div class="alert alert-success">
                {{ session('profile_update_status') }}
              </div>
            </div>
          </div>
    @endif
    <div class="row">
      <div class="col-md-4 m-auto">
        <div class="card">
          <div class="card-header">Profile Edit</div>
          <div class="card-body">

            <form action="{{ url('profile/post') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Profile Name Change</label>

                <input type="text" name="profile_name" value="{{ Auth::user()->name }}" class="form-control">
                @error ('profile_name')
                  {{ $message }}
                @enderror
              </div>
              <button type="submit" class="btn btn-success">Change Name</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-4 m-auto">
        <div class="card">
          <div class="card-header">Password Change</div>
          <div class="card-body">
            @if (session('passwort_match_status'))
              <span class="text-danger">
                {{ session('passwort_match_status') }}
              </span>
            @endif
            @if (session('passwort_not_match_status'))
              <span class="text-danger">
                {{ session('passwort_not_match_status') }}
              </span>
            @endif
            <form action="{{ url('password/post') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Old Password</label>
                <input type="password" name="old_password" class="form-control">
                @error ('old_password')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label>New Password</label>
                <input type="password" name="password" class="form-control">
                @error ('password')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror
                @if (session('old_and_new_password_match'))
                  <span class="text-danger">
                    {{ session('old_and_new_password_match') }}
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
                @error ('password_confirmation')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-success">Change Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
