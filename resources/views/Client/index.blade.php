
@extends('layouts')
 @extends('header')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb uper">
            <div class="pull-left">
                <h2>Clients List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Create Clinet</a>
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
            <th>Name</th>
            <th>Email</th>
            <th>phone</th>
            <th width="280px">Action</th>
        </tr>
        @if($client->count() > 0)
        @foreach ($client as $clients)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $clients->name }}</td>
            @if($clients->email)
            
               <td>{{ $clients->email }}</td> 
            
            @else
                <td align="center"> - </td> 
            @endif
            @if(!empty($clients->phone))
                 <td>{{ $clients->phone }}</td>
            @else
                     <td align="center"> - </td> 
            @endif

            <td>
                <form action="{{ route('clients.destroy',$clients->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('clients.edit',$clients->id) }}">Edit</a>
   
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
  
    {!! $client->links() !!}
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
          $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>     
@endsection