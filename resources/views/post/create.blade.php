<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Post</title>
</head>
<body>
    <form action="#">
        <select name="{{ $field ?? 'channel_id' }}" id="{{ $field ?? 'channel_id' }}">
            @foreach ($channels as $channel)
                <x-post-card :channel='$channel' />
            @endforeach
        </select>
    </form>
</body>
</html>