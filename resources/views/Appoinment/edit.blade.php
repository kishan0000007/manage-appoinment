<!-- create.blade.php -->

@extends('layouts')
@extends('header')
@section('content')
<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Appoinment
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
      <form  action="{{ route('appoinments.update',$edit_appoinment->id) }}" method="POST">
        <div class="form-control">
          <div class="form-group">
             @csrf
             @method('PUT')
             
              <div class="form-group">
                <label >Clinet*</label>
  
                <select id="clinet" class="form-control" name="client">
                    @foreach($get_clients as $client)
                     <option value="{{$client->id}}" {{$edit_appoinment->client == $client->id ? 'selected="selected"' : '' }}>{{$client->name}}</option>
                    @endforeach
                </select> 
            </div>
              
          </div>
          <div class="form-group">
              <label for="employee">employee*</label>
              <input type="text" class="form-control" name="employee" value="{{$edit_appoinment->employee}}" placeholder="Enter Employee" />
          </div>
          <div class="form-group">
              <label for="quantity">Start Time*</label>
              <div id="datetimepicker" class="input-append date ">
                  <input type="text" name="start_time" value="{{$edit_appoinment->start_time}}"></input>
                  <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                  </span>
              </div>
          </div>
          <div class="form-group">
              <label for="quantity">End Time*</label>
              <div id="datetimepicker2" class="input-append date ">
                  <input type="text" name="finish_time" value="{{$edit_appoinment->finish_time}}"></input>
                  <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                  </span>
              </div>
          </div>
          <div class="form-group">
              <label for="employee">price</label>
              <input type="number" class="form-control" name="price" value="{{$edit_appoinment->price}}" placeholder="Enter price" />
          </div>
          <div class="form-group">
              <label for="employee">Comments</label>
              <textarea name="comments" class="form-control" placeholder="Enter comments">{{$edit_appoinment->comments}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update Appoinment</button>
        </div>
      </form>
  </div>
</div>


     <script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script> 
    <script type="text/javascript"
     src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>
    <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'dd/MM/yyyy hh:mm',
         pickSeconds: false, 
      });
       $('#datetimepicker2').datetimepicker({
        format: 'dd/MM/yyyy hh:mm',
         pickSeconds: false, 
      });
    </script>
@endsection