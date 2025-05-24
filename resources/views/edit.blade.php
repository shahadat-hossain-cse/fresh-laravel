<html>
    <head>

    </head>
    <body>
        @foreach($students as $student)
            {{$student->full_name()}}

        @endforeach
    </body>
</html>