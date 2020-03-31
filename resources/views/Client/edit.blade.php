<!-- create.blade.php -->

@extends('layouts')
@extends('header')
@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Clinet
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />

    @endif
      <form action="{{ route('clients.update',$edit_client->id) }}" method="POST">
        <div class="form-control">
          <div class="form-group">
             @csrf
             @method('PUT')

            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Name:</strong>
                          <input type="text" name="name" value="{{ $edit_client->name }}" class="form-control" placeholder="Name">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Email:</strong>
                           <input type="text" name="email" value="{{ $edit_client->email }}" class="form-control" placeholder="Email">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Phone:</strong>
                           <input type="text" name="phone" value="{{ $edit_client->phone }}" class="form-control" placeholder="Phone">
                      </div>
                      <button type="submit" class="btn btn-primary">Update Client</button>
                  </div>
            </div>
           </div>
        </div>
      </form>
  </div>
</div>

@endsection