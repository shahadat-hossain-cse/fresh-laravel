<div>
    <h1>This is Profile Page</h1>
</div>
@if(session('name'))
<h3>Welcome, {{session('name')}}</h3>
@endif

@if(session('email'))
<h3>Welcome, {{session('email')}}</h3>
@endif



<a href="/session_out">Logout</a>