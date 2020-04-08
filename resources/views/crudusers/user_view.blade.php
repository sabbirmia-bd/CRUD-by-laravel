@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            View Page
          </div>
          <div class="card-body">
            {{ $add_description_from_db }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
