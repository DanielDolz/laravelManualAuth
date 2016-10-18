<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Document</title>
</head>

<body>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">


    <form action="/login" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            User:
            <input type="Usuari" name="Usuari">
        </div>

        <div class="form-group">
            Password:
            <input type="Password" name="Password">
        </div>

        <div class="form-group">
            Submit:
            <input type="submit" value="Login" class="btn btn-primary" name="login">
        </div>

    </form>
</div>
<div class="col-md-4"></div>
</div>


</body>

</html>