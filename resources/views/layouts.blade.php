<!DOCTYPE html>
<html>
<head>
    <title>{{env('APP_NAME')}}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
   
</head>
<body>
  
<div class="container">
    @yield('content')
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script type="text/javascript">
      setTimeout(function(){ $('.alert-success').hide() }, 3000);

</script>
</body>
</html>