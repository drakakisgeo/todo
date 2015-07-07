<!doctype html>
<html lang="en">
<head>
    <title>Todo Project</title>
    <meta charset="UTF-8">
    <meta id="token" name="token" value="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
</head>
<body>
<div class="container todoblock">
    @yield('main')
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/vue.min.js"></script>
<script src="js/vue-resource.js"></script>
<script src="js/app.js"></script>
</body>
</html>