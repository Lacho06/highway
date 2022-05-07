<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>
    <h1>Email</h1>
    <p>Username: <span>{{$request['name']}}</span></p>
    <p>Email: <span>{{$request['email']}}</span></p>
    <p>Mail text: <span>{{$request['message']}}</span></p>
</body>
</html>
