<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Investors Unite</title>
    <link rel="icon" type="image/x-icon" href="{{asset('user/images/favicon.ico')}}">
    @include('members.dashboard.layouts.css')



</head>

<body>

    @include('members.dashboard.layouts.header')

    @yield('content')

    @include('members.dashboard.layouts.js')
</body>

</html>
