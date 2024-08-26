<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravelで作ったあいすのホームページ</title>
</head>

<body>
    <h1>Laravelで作ったあいすのホームページ</h1>
    <p>phpで作ったホームページだよ</p>
    <section>
        <h2>あしあと</h2>
        <ul>
            @foreach ($ashiatos as $ashiato)
            <li>{{ $ashiato->name }}: {{ $ashiato->like }} ({{$ashiato->created_at}})</li>
            @endforeach
        </ul>
    </section>
</body>

</html>