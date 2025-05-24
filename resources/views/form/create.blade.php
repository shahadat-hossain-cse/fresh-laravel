<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body> 

<div class="container">
  <h1>Create Student</h1>
    @if($errors->any())
        @foreach($errors->all() as $error)
        <h5 class="text-warning">{{$error}}</h5>
        @endforeach
    @endif
    <form action="/save" method="post">
    @csrf
        <label for="">First Name </label> 
        <input type="text" name="first_name" >
        @error('first_name')
            <div class="text-warning">{{$message}}</div>
        @enderror
        <br>
        <br>
        <label for="">Last Name </label> 
        <input type="text" name="last_name" value="{{old('last_name')}}">
        @error('last_name')
            <div class="text-warning">{{$message}}</div>
        @enderror
        <br>
        <label for="">Email </label> 
        <input type="email" name="email" value="{{old('email')}}">
        @error('email')
            <div class="text-warning">{{$message}}</div>
        @enderror
        <br>
        <label for="">Std Id </label> 
        <input type="text" name="std_id" value="{{old('std_id')}}">
        @error('std_id')
            <div class="text-warning">{{$message}}</div>
        @enderror
        <br>
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>


