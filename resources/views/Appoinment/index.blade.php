@extends('layouts')
@extends('header')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb uper">
            <div class="pull-left">
                <h2>Appoinment List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('appoinments.create') }}"> Create Appoinment</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

     <style>
  .uper {
    margin-top: 40px;
  }
</style>

   
    <table class="table table-bordered ">
        <tr>
            <th>No</th>
            <th>Clinet</th>
            <th>Employee</th>
            <th>Start Time</th>
            <th>Finish Time</th>
            <th>Price</th>
            <th>Comment</th>
            <th width="280px">Action</th>
        </tr>
        @if($Appointments->count() > 0)
        @foreach ($Appointments as $appointment)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $appointment->name }}</td>
            <td>{{ $appointment->employee }}</td> 
            <td>{{ $appointment->start_time }}</td> 
            <td>{{ $appointment->finish_time }}</td> 
         
            @if(!empty($appointment->price))
                 <td>{{ $appointment->price }}</td>
            @else
                     <td align="center"> - </td> 
            @endif

             @if(!empty($appointment->comments))
                 <td>{{ $appointment->comments }}</td>
            @else
                     <td align="center"> - </td> 
            @endif

            <td>
                <form action="{{ route('appoinments.destroy',$appointment->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('appoinments.edit',$appointment->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger confirmation" >Delete</button>
                </form>
            </td>
            
        </tr>
        @endforeach
        @else
            <td>No Data Avialable</td>
        @endif
    </table>
  
    {!! $Appointments->links() !!}
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
      <script type="text/javascript">
          $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
      </script>
@endsection