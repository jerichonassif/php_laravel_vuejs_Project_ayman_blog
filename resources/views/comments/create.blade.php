<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{  asset('app.css') }}">
</head>
<body>
<form action="{{ route('comments.store')}} " method="post">
    {{csrf_field()}}

    put the comment <br> <textarea rows="10" cols="45" name="comment"></textarea><br><br>
    <input type="submit" value="add">
</form>

</body>
</html>
