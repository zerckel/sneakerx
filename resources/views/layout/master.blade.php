<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') - SneakerX</title>
    <link href="/css/app.css" type="text/css" rel="stylesheet">
</head>
<body id="@yield('id')">

    <x-header></x-header>

    <div class="alert"> <span class="alert-message"></span> </div>

    @section('body')
        @show
</body>
<script src="/js/default.js" rel="script" type="text/javascript"></script>
<script src="/js/@yield('script', '')" rel="script" type="text/javascript"></script>
</html>
