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
            <h1>Student List</h1>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>F Name</th>
                            <th>L Name</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Std Id</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sl = 0;
                        ?>
                        @foreach($students as $student)
                        <tr>
                            <td><?php echo ++$sl; ?></td>
                            <td>{{$student->first_name}}</td>
                            <td>{{$student->last_name}}</td>
                            <td></td>
                            <td>{{$student->email;}}</td>
                            <td>{{$student->std_id;}}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{url('')}}/student/view/{{$student->id}}">View</a>
                                
                                <a class="btn btn-info btn-sm" href="{{url('')}}/student/edit/{{$student->id}}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{url('')}}/student/delete/{{$student->id}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>


