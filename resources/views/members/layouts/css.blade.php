    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css" />
    <link rel="stylesheet" href="{{asset('user/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('user/css/show-more.css')}}" />
    <link rel="stylesheet" href="{{asset('user/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/share-tooltip.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.min.css">
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">




    <style>
        .featured-image {
            height: 200px;
        }
        /* for notification button */
        #notification_button {
            display: inline-block;
            background-color: #3b89e7;
            width: 50px;
            height: 50px;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 30px;
            right: 30px;
            transition: background-color .3s,
            opacity .5s, visibility .5s;
            z-index: 1000;
        }
        a#notification_button i {
            color: white;
            font-size: 25px;
            display: flex;
            justify-content: center; /* Horizontal alignment */
            align-items: center; /* Vertical alignment */
            width: 100%; /* Set your desired width for the square button */
            height: 100%; /* Set your desired height for the square button */
            border: none;
        }
        .svg-color{
            filter: invert(40%) sepia(95%) saturate(448%) hue-rotate(172deg) brightness(103%) contrast(88%);
        }
    </style>
    <style>
        #preloader {

            position: fixed;

            left: 0;

            top: 0;

            z-index: 9999999;

            width: 100%;

            height: 100%;

            overflow: visible;

            background: rgb(255 255 255 / 75%) url("{{asset('upload/preloader.gif')}}") no-repeat center center;

            color: #000;

            display: none;
        }
    </style>
    <div class="preloader" id="preloader" ></div>
    @stack('css')
