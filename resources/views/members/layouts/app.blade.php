<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Investors Unite</title>
    <link rel="icon" type="image/x-icon" href="{{asset('user/images/favicon.ico')}}">


    @include('members.layouts.css')
</head>

    @if(request()->route()->getName() === 'index')
        <body class="overflow-hidden">
    @else
        {{-- <body style="overflow-x: auto;" class=""> --}}
        <body style="overflow-x: hidden;" class="">
    @endif

    @include('members.layouts.header-marquee')
    <div class="container-fluid">
        <!-- HEADER SECTION START -->
        @include('members.layouts.header')
        <!-- HEADER SECTION END -->
        @yield('content')
    </div>


    <div class="overflowbg"></div>

    @include('members.layouts.js')
    {{-- <a id="notification_button" onclick="notificationPopup()"><i class="fa fa-bell" aria-hidden="true"></i></a> --}}
</body>

</html>
