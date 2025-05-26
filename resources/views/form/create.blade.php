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
    <div class="row">
        <div class="col-md-3">
            Welcome, {{Auth::user()->name}}
            <br>
            <a href="/user-logout">Logout</a>
        </div>
        <div class="col-md-9">
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

    </div>
    
</div>

</body>
</html>


