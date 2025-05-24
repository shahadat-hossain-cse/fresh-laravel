<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">
</head>
<body>
    <h1>Welcome to Service Page</h1>

    <h2>Service ID: {{$id}}</h2>
    <h2>Category ID: <?php echo $cat; ?></h2>

    @if($id>10)
    <?php echo "Id is greater than 10"; ?>
    @endif

    {{$data['username']}}

    <?php echo $data['contact']; ?>

    @foreach($arr as $ar)
    {{$ar}}
    @endforeach

    @include('common.links')

    {{asset('css/abc.css')}}

</body>
</html>