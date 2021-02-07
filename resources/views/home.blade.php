<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
    < x-header/>
    <h1>{{ $name}}</h1>
    <hr>
    @for( $i = 0; $i<= 5 ; $i++)
    <h3>{{$i}}</h3>
    @endfor

    <hr>
    @if($num === 54)
    <h1>{{$num}}</h1>
    @else
    <h3>No the number!</h3>
    @endif
    <hr>
    <h1>Name List: </h1>
    <ul>
        @foreach ($arr as $item)
            <li>{{$item}}</li>
        @endforeach
    </ul>
</body>
</html>