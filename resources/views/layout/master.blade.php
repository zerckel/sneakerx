<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - SneakerX</title>
    <link href="/css/app.css" type="text/css" rel="stylesheet">
</head>
<body id="@yield('id')">

    <x-header></x-header>

    @section('body')
        @show
</body>
<script src="/js/@yield('script', '')" rel="script" type="text/javascript"></script>
</html>
