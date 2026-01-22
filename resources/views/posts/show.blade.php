<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$post->title}}</title>
</head>
<body>
    <div>
        <a href="{{ route('posts.index') }}">Назад к постам</a>

        <div>
            <h2>{{ $post->title }}</h2>
            <p>
                {{ $post->published_at?->format('d.m.Y') }}</p>
        <div>

        <div>{!! nl2br(e($post->body)) !!}</div>
    </div>
</body>
</html>