<div>
    <h1>This is Flash Page</h1>
</div>
@if(session('status'))
<h3>{{session('status')}}</h3>
@endif



<a href="/session_flash">Go to Flash Form</a>