<div>
    <h1>This is Profile Page</h1>
</div>
@if(session('username'))
<h3>Welcome, {{session('username')}}</h3>
@endif

@if(session('uname'))
<h3>Welcome, {{session('uname')}}</h3>
@endif

<a href="/session_out">Logout</a>