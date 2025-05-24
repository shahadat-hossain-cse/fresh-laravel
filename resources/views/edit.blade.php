<html>
    <head>

    </head>
    <body>
        @foreach($students as $student)
            {{$student->first_name}}

        @endforeach
    </body>
</html>