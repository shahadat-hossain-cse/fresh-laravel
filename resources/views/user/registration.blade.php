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
            <h1 class="text-center">User Registration</h1>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @if(!empty(session('message')))
                <div class="alert alert-info">{{session('message')}}</div>

                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form method="post" action="user-registration">
                    @csrf
                    
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User Type</label>
                        <select name="user_type" id="user_type" class="form-select" required>
                            <option value="">--Select User Type</option>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>

                
            </div>
        </div>
    </div>
</div>

</body>
</html>


