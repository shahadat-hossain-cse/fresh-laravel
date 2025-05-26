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
  
    <div class="content">
        <div class="row">
            <h1 class="text-center">User Login</h1>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @if(!empty(session('error')))
                <div class="alert alert-danger">{{session('error')}}</div>

                @endif
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form method="post" action="user-login">
                    @csrf
                    
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                    </div>
                    
                    
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                    
                </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>

                
            </div>
        </div>
    </div>
</div>

</body>
</html>


