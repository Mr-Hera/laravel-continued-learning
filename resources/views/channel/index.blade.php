<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Channels</title>
</head>
<body>
    <ul>
        @foreach ($channels as $channel)
            <x-channel-card :channel='$channel' />
        @endforeach
    </ul>
</body>
</html>