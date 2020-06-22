<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Admin - SneakerX</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="/css/app.css" type="text/css" rel="stylesheet">
</head>
<body id="@yield('id')">

<x-header-admin></x-header-admin>

@if($message ?? '')
    <div class="alert">
        <span class="alert-message">
            {{ $message }}
        </span>
    </div>
@endif

@section('body')
@show
</body>
<script type="text/javascript">
    document.querySelector('.alert') ? unShowMessage() : false

    function unShowMessage() {
        setTimeout(function () {
            document.querySelector('.alert').style.top = "-500px"
        }, 3000)
    }
</script>
</html>
