<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>{{$title}}</h1>
    <h2>{{$email}}</h2>
    <h3>{{$phone}}</h3>
    @php
        echo $messages;
    @endphp

</body>
</html>
