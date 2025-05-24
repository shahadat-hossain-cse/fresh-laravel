<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/css1/style.css')}}">
  <script src="{{url('')}}/assets/js/jquery.min.js"></script>
  <script src="{{url('')}}/assets/js/bootstrap.min.js"></script>
</head>
<body> 
    

<div class="container">
  <h1>Student Information</h1>
  <div>
    <form action="/student/remove" method="post">
    @csrf
        <label for="">First Name {{$student->first_name;}}</label> 
        <br>
        <br>
        <label for="">Last Name {{$student->last_name;}}</label> 
        <br>
        <label for="">Email {{$student->email;}}</label> 
        
        <label for="">Std Id {{$student->std_id;}}</label> 
        
        <input type="hidden" name="id" value="{{$student->id}}">
        <br>
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
</div>

</body>
</html>


