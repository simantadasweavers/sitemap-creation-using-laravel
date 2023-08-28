<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>

<form action="{{url('/')}}/post_send" method="POST">
    @csrf
    <label for="postname"></label>
    <input type="text" id="postname" name="postname">
    <button type="submit">send</button>
</form>
    
</body>
</html>