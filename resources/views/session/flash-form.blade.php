<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    @if(session('status'))
    <h3>{{session('status')}}</h3>
    @endif

    @if(session('auth_message'))
    <h3>{{session('auth_message')}}</h3>
    @endif
    <form method="post" action="session_flash_form_submit">
        @csrf
      
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp">
      </div>
        
      
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
      </div>
      <div class="mb-3">
          
        
      
    </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <a href="/session_flash_check">Flash Check</a>

</body>
</html>