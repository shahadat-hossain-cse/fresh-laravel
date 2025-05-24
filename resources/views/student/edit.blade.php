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
    <form action="/student/update" method="post">
    @csrf
        <label for="">First Name </label> 
        <input type="text" name="first_name" value="{{$student->first_name;}}">
        @error('first_name')
            <div class="text-warning">{{$message}}</div>
        @enderror
        <br>
        <br>
        <label for="">Last Name </label> 
        <input type="text" name="last_name"  value="{{$student->last_name;}}">
        @error('last_name')
            <div class="text-warning">{{$message}}</div>
        @enderror
        <br>
        <label for="">Email </label> 
        <input type="email" name="email" value="{{$student->email;}}">
        @error('email')
            <div class="text-warning">{{$message}}</div>
        @enderror
        <br>
        <label for="">Std Id </label> 
        <input type="text" name="std_id" value="{{$student->std_id}}">
        @error('std_id')
            <div class="text-warning">{{$message}}</div>
        @enderror
        <br>
        <input type="hidden" name="id" value="{{$student->id}}">
        <button type="submit" class="btn btn-success">Update</button>
    </form>
  </div>
   
</div>

</body>
</html>


