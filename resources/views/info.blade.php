<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Info</title>
</head>
<body>
    <h1>{{$movie['info']['Title']}}</h1>
    <div><a href="/">back</a></div>
    <img src="{{$movie['info']['Poster']}}">
    @foreach($movie['info'] as $key => $value)
        <p>
            @if (is_array($value))
                {{$key}} : {{json_encode($value)}}
            @else
                {{$key}} : {{$value}}
            @endif
        </p>
    @endforeach
</body>
</html>

