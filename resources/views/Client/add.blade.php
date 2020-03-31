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
  Create Clinet
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

     <form method="post" action="{{ route('clients.store') }}">
        <div class="form-control">
           <div class="form-group">
              @csrf
             <div class="form-group">
                  <label for="email">Name:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>

            <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
           </div>

           <div class="form-group">
                <label for="pwd">Phone:</label>
                <input type="number" class="form-control" id="pwd" name="phone" placeholder="Enter phone">
          </div>
          <button type="submit" class="btn btn-primary">Create Clinet</button>
             
           </div>
        </div>
      </form>

  </div>
</div>
@endsection