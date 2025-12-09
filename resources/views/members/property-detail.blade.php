@extends('members.layouts.app')

@section('content')
@push('css')
    <style>
        .carousel-icon-custom {
            background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3e%3c/svg%3e);
            background-color: #000000;
            border-radius: 15px;
            padding: 30px;
        }
        img.img-fluid.mh-100 {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@endpush
    <div class="main">
        <!-- SEARCH BAR START  -->

        <!-- SEARCH BAR END  -->
        <div class="row">
            <div class="col-md-12">
                <div class="border-top height-40"></div>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-6 col-md-12 ">
                <div class="galerysticky">
                    <div class="graybg ">
                        <!-- Carousel -->
                        <div>
                            <div id="carouselExampleCaptions" class="carousel slide gallery" data-ride="carousel">
                                <div class="carousel-indicators d-xl-none d-flex">
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                                        aria-label="Slide 4"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                                        aria-label="Slide 5"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5"
                                        aria-label="Slide 5"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6"
                                        aria-label="Slide 5"></button>

                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7"
                                        aria-label="Slide 5"></button>
                                </div>
                                <div class="carousel-inner">
                                    @foreach ($properties->getImages as $key => $property_image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}"
                                            data-slide-number="{{ $key }}" data-toggle="lightbox"
                                            data-gallery="gallery" data-remote="{{ asset($property_image->image) }}">
                                            <img src="{{ asset($property_image->image) }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Carousel Navigatiom -->
                        <div class="p-2 py-3 d-none d-xl-block">
                            <div class="row gx-2">
                                <div class="col-sm mb-4 mb-sm-0">

                                    <div id="carousel-thumbs" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">

                                            @foreach ($properties->getImages->chunk(4) as $key => $chunk)
                                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}"
                                                    data-slide-number="{{ $key }}">
                                                    <div class="row mx-0">
                                                        @foreach ($chunk as $key => $property_image)
                                                            <div id="carousel-selector-0"
                                                                class="thumb col-3 px-1 py-0 {{ $key === 0 ? 'selected' : '' }}"
                                                                data-bs-target="#carouselExampleCaptions "
                                                                aria-current="true" data-bs-slide-to="{{ $key }}">
                                                                <img src="{{ asset($property_image->image) }}"
                                                                    class="img-fluid" alt="...">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carousel-thumbs" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carousel-thumbs" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-auto d-none d-xl-block">
                                    <div class="viewall">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleLightbox">View all</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="py-4 d-none d-lg-block">
                        <div class="row mt-4 mt-xl-0">
                            <div class="col-sm">
                                <div class="row">
                                    <div class="col-sm-auto">
                                        <div class="d-flex align-items-center">
                                            <i class="me-2">
                                                <img src="{{ asset('user/images/strip-img.png') }}" class="d-block"
                                                    alt="">
                                            </i>
                                            <div class="viewtext">
                                                Total Saves
                                                <strong class="ms-2">
                                                    {{$total_saves}}
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="text-end">
                                    <div class="viewtext">
                                        The deal will close in
                                        <strong class="ms-2">
                                            {{ $properties->created_at->diffInDays($properties->expected_closing_date) }}
                                            days.
                                        </strong>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12 ps-xl-0">
                <div class="propery-detail mt-5 mt-lg-0">
                    <div class="top-full-address">
                        <div class="row">
                            <div class="col-md d-flex align-items-center">
                                <h3>{{ $properties->complete_address }}</h3>
                            </div>
                            <div class="col-auto mt-3 mt-md-0">
                                <a href="#" class="outlinebtn"><i class="me-2"><img
                                            src="{{ asset('user/images/eye-img.png') }}" alt=""></i><span>View
                                        full address</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="t1" class="graybg-block mt-3 pt-1 scroll-container target1 pt-0 pb-0">
                    <div class="row mt-3">
                        <div class="col">
                            <div class="price-section">
                                <div class="mb-2 mb-md-0"><strong class="usecomma">${{ $properties->price }}</strong>
                                </div>
                                <div class="listed-block mb-2 mb-md-0">
                                    <span>Listed at:
                                    </span>{{ \Carbon\Carbon::parse($properties->created_at)->format('F jS, Y') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-auto wdith120px">
                            <div class="text-end">
                                <div class="row gx-3">
                                    <div class="col-md-6 mb-2 mb-md-0">
                                        <a href="javascript:void(0);"
                                            onclick="saved_deals({{ $properties->id }},'property_detail');"
                                            class="white-btn-small white-btn-small2 save-button">
                                            <i class="me-2"><img class="image-change"
                                                    src="{{ check_saved_deals($properties->id) }}" alt=""></i>
                                            Save
                                        </a>
                                    </div>
                                    <div class="col-md-6 mb-2 mb-md-0">
                                        <a href="javascript:void(0)" class="white-btn-small white-btn-small2">
                                            <div class="tooltip-container">
                                                <span class="text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        class="bi bi-send-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <span class="tooltip1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        class="bi bi-twitter" viewBox="0 0 16 16">
                                                        <a href="https://twitter.com/intent/tweet?url={{ URL::current() }}" target="__blank">
                                                            <path
                                                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15">
                                                            </path>
                                                        </a>
                                                    </svg>
                                                </span>
                                                <span class="tooltip2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        class="bi bi-facebook" viewBox="0 0 16 16">
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}" target="__blank">
                                                            <path
                                                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951">
                                                            </path>
                                                        </a>
                                                    </svg>
                                                </span>
                                                <span class="tooltip3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        class="bi bi-whatsapp" viewBox="0 0 16 16">
                                                        <a href="whatsapp://send?text={{ URL::current() }}" target="__blank">
                                                            <path
                                                                d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232">
                                                            </path>
                                                        </a>
                                                    </svg>
                                                </span>
                                                <span class="tooltip4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        class="bi bi-discord" viewBox="0 0 16 16">
                                                        <a href="https://discord.com/channels/@me/{{ URL::current() }}" target="__blank">
                                                            <path
                                                                d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612">
                                                            </path>
                                                        </a>
                                                    </svg>
                                                </span>
                                                <span class="tooltip5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        class="bi bi-pinterest" viewBox="0 0 16 16">
                                                        <a href="https://pinterest.com/pin/create/button/?url={{ URL::current() }}" target="__blank">
                                                            <path
                                                                d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0">
                                                            </path>
                                                        </a>
                                                    </svg>
                                                </span>
                                                <span class="tooltip6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 16 16">
                                                        <a href="#">
                                                            <path fill-rule="evenodd"
                                                                d="M8 0C3.584 0 0 3.584 0 8s3.584 8 8 8c4.408 0 8-3.584 8-8s-3.592-8-8-8m5.284 3.688a6.8 6.8 0 0 1 1.545 4.251c-.226-.043-2.482-.503-4.755-.217-.052-.112-.096-.234-.148-.355-.139-.33-.295-.668-.451-.99 2.516-1.023 3.662-2.498 3.81-2.69zM8 1.18c1.735 0 3.323.65 4.53 1.718-.122.174-1.155 1.553-3.584 2.464-1.12-2.056-2.36-3.74-2.551-4A7 7 0 0 1 8 1.18m-2.907.642A43 43 0 0 1 7.627 5.77c-3.193.85-6.013.833-6.317.833a6.87 6.87 0 0 1 3.783-4.78zM1.163 8.01V7.8c.295.01 3.61.053 7.02-.971.199.381.381.772.555 1.162l-.27.078c-3.522 1.137-5.396 4.243-5.553 4.504a6.82 6.82 0 0 1-1.752-4.564zM8 14.837a6.8 6.8 0 0 1-4.19-1.44c.12-.252 1.509-2.924 5.361-4.269.018-.009.026-.009.044-.017a28.3 28.3 0 0 1 1.457 5.18A6.7 6.7 0 0 1 8 14.837m3.81-1.171c-.07-.417-.435-2.412-1.328-4.868 2.143-.338 4.017.217 4.251.295a6.77 6.77 0 0 1-2.924 4.573z">
                                                            </path>
                                                        </a>
                                                    </svg>
                                                </span>
                                                <span class="tooltip7">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        class="bi bi-github" viewBox="0 0 16 16">
                                                        <a href="https://github.com/login?return_to={{ URL::current() }}" target="__blank">
                                                            <path
                                                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8">
                                                            </path>
                                                        </a>
                                                    </svg>
                                                </span>
                                                <span class="tooltip8">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        class="bi bi-reddit" viewBox="0 0 16 16">
                                                        <a href="https://www.reddit.com/submit?url={{ URL::current() }}" target="__blank">
                                                            <path
                                                                d="M6.167 8a.83.83 0 0 0-.83.83c0 .459.372.84.83.831a.831.831 0 0 0 0-1.661m1.843 3.647c.315 0 1.403-.038 1.976-.611a.23.23 0 0 0 0-.306.213.213 0 0 0-.306 0c-.353.363-1.126.487-1.67.487-.545 0-1.308-.124-1.671-.487a.213.213 0 0 0-.306 0 .213.213 0 0 0 0 .306c.564.563 1.652.61 1.977.61zm.992-2.807c0 .458.373.83.831.83s.83-.381.83-.83a.831.831 0 0 0-1.66 0z">
                                                            </path>
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.828-1.165c-.315 0-.602.124-.812.325-.801-.573-1.9-.945-3.121-.993l.534-2.501 1.738.372a.83.83 0 1 0 .83-.869.83.83 0 0 0-.744.468l-1.938-.41a.2.2 0 0 0-.153.028.2.2 0 0 0-.086.134l-.592 2.788c-1.24.038-2.358.41-3.17.992-.21-.2-.496-.324-.81-.324a1.163 1.163 0 0 0-.478 2.224q-.03.17-.029.353c0 1.795 2.091 3.256 4.669 3.256s4.668-1.451 4.668-3.256c0-.114-.01-.238-.029-.353.401-.181.688-.592.688-1.069 0-.65-.525-1.165-1.165-1.165">
                                                            </path>
                                                        </a>
                                                    </svg>
                                                </span>
                                                <span class="tooltip9"> </span>
                                            </div>



                                            Share
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="stickynav" class="head target2">
                        <nav class="navbar   navbar-custom navbar-expand-lg mb-0 navbar-light bg-light">
                            <div class="container-fluid">
                                <div class="collapse navbar-collapse blockdiv" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link nav-btn-block active" data-row-id="row1"
                                                href="#">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link nav-btn-block" data-row-id="row2" href="#">Schedule
                                                a show</a>
                                        </li>
                                        @if (
                                            $properties->bedroom_and_bathroom !== null and
                                                $properties->basement !== null and
                                                $properties->flooring !== null and
                                                $properties->appliances !== null and
                                                $properties->other_interior_features !== null)
                                            <li class="nav-item">
                                                <a class="nav-link nav-btn-block" data-row-id="row3"
                                                    href="#">features</a>
                                            </li>
                                        @endif
                                        <li class="nav-item">
                                            <a class="nav-link nav-btn-block" data-row-id="row4"
                                                href="#">Neighborhood</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link nav-btn-block" data-row-id="row5" href="#">Contact
                                                Lister</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="whitebg-block mt-3 mt-xl-0">
                        <div class="">
                            <div class="row-nav" id="row1">
                                <h3 id="Overview">Overview</h3>
                                <div class="row">
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/home-icon.png') }}"
                                                    style="width: 18px;" alt=""></i>
                                            <span>Property Type <br><strong>{{ $properties->property_type }}</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/construction.svg') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>Built in <br><strong>{{ $properties->year_built }}</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/repair.svg') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>After Repair Value <br><strong>${{ number_format($properties->after_repair_value, 2, '.', ',') }}</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/deal.svg') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>Deal Type <br><strong>{{ $properties->deal_type }}</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/finance.svg') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>Acceptable Financing <br><strong>
                                                @if (isset($properties->acceptable_financing))
                                                    @foreach (json_decode($properties->acceptable_financing) as $financing)
                                                    {{$financing}},
                                                    @endforeach
                                                @endif
                                            </strong></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{asset('user/images/sqaure-fit.png')}}" style="width: 20px;" alt=""></i>
                                            <span>Total square footage <br><strong>{{$properties->total_square_footage}} sqft</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/community.svg') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>Association/Community <br><strong>{{$properties->association_community}}</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/sq-fit.png') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>Current Zoning <br><strong>{{$properties->current_zoning}}</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/taxes.svg') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>Annual Taxes <br><strong>${{ number_format($properties->annual_taxes, 2, '.', ',') }}</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/water.svg') }}"
                                                    style="width: 18px;" class="svg-color"  alt=""></i>
                                            <span>Water Source <br><strong>{{ $properties->water_source }}</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/sewer.svg') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>Sewer Source <br><strong>{{ $properties->sewer_source }}</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/cooling.svg') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>Cooling System <br><strong>{{ $properties->cooling_type }}</strong> </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/heating.svg') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>Heating System <br><strong>{{ $properties->heating_type }}</strong> </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/p-text.png') }}"
                                                    style="width: 18px;" alt=""></i>
                                            <span>Type of parking <br><strong>{{ $properties->type_of_parking }}</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/sqaure-fit.png') }}"
                                                    style="width: 16px;" alt=""></i>
                                            <span>Total Square Footage <br><strong>{{ $properties->total_square_footage }}</strong> </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/bedroom.png') }}"
                                                    style="width: 22px;" alt=""></i>
                                            <span>Bedrooms <br><strong>{{ $properties->no_of_beds }}</strong> </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0 mt-4">
                                        <div class="d-flex align-items-center align-items-md-start smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/bathroom.png') }}"
                                                    style="width: 20px;" alt=""></i>
                                            <span>Bathrooms <br><strong>{{ $properties->no_of_baths }}</strong> </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-4">
                                    <p class="element mb-4"
                                        data-config='{ "type": "text", "limit": 120, "more": " show more", "less": " less" }'>
                                        {{ $properties->description }}
                                    </p>
                                    <p>
                                        Listed by: <br>
                                        <strong>{{ $properties->getMember->name }}</strong> <br>
                                        {{ $properties->getMember->company }}<br>
                                    </p>
                                </div>
                            </div>

                        </div>

                        @if ($properties->property_sold !== 1)
                            <div class="custom-mt-40">
                                <div id="row2" class="row-nav">
                                    <h3>Schedule a showing</h3>
                                    <hr class="my-2 mb-3">
                                    <p>Want to see the property schedule a showing.</p>
                                </div>
                            </div>
                            <div class="p-sm-4 py-4 text-center">
                                <a href="#" class="btn btn-primary box-shadow-blue custom-btn full-wd-mobile"
                                    data-bs-toggle="modal" data-bs-target="#schedule_showing">Schedule</a>
                            </div>
                        @endif

                        @if (   $properties->bedroom_and_bathroom !== null and
                                $properties->basement !== null and
                                $properties->flooring !== null and
                                $properties->appliances !== null and
                                $properties->other_interior_features !== null   )

                            <div class="row-nav" id="row3">
                                <h3>Features</h3>
                                <hr class="my-2">
                                <div class="row">
                                    @if ($properties->bedroom_and_bathroom !== null)
                                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
                                        <div class="smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/interior.svg') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>Bedroom & Bathroom <br><strong>{{ $properties->bedroom_and_bathroom }}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($properties->basement !== null)
                                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
                                        <div class="smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/basement.svg') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>Basement <br><strong>{{ $properties->basement }}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($properties->flooring !== null)
                                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
                                        <div class="smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/flooring.svg') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>Flooring <br><strong>{{ $properties->flooring }}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($properties->appliances !== null)
                                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
                                        <div class="smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/appliances.svg') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>Appliances <br><strong>{{ $properties->appliances }}</strong></span>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($properties->other_interior_features !== null)
                                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
                                        <div class="smalltext">
                                            <i class="me-2"><img src="{{ asset('user/images/details.svg') }}"
                                                    style="width: 18px;" class="svg-color" alt=""></i>
                                            <span>Other Interior Features <br><strong>{{ $properties->other_interior_features }}</strong></span>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        @endif

                        <div id="row4" class="row-nav">
                            <h3 class="mt-4">Neighborhood</h3>
                            <hr class="my-2 mb-4">
                            <div class="whitebg">
                                <h4 class="mb-0">Zip code: 80012</h4>
                                <div class="row mt-3">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="bluebg">
                                            <div class="icon-img">
                                                <img src="{{ asset('user/images/run-img.png') }}" alt="">
                                            </div>
                                            <h3>Walk Score</h3>
                                            <div class="score-img">{{ $properties->walk_score }} / 100</div>
                                            <div class="dependance">
                                                (Car-Dependent)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="bluebg">
                                            <div class="icon-img">
                                                <img src="{{ asset('user/images/score-img.png') }}" alt="">
                                            </div>
                                            <h3>Transit Score</h3>
                                            <div class="score-img">{{ $properties->transit_score }} / 100</div>
                                            <div class="dependance">
                                                (No Nearby Transit)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="bluebg">
                                            <div class="icon-img">
                                                <img src="{{ asset('user/images/bike-img.png') }}" alt="">
                                            </div>
                                            <h3>Bike Score</h3>
                                            <div class="score-img">{{ $properties->bike_score }} / 100</div>
                                            <div class="dependance">
                                                (Somewhat Bikeable)
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="row5" class="row-nav">
                            <h3 class="mt-4 mt-5">Contact Lister</h3>
                            <hr class="my-2 mb-3">
                            <div class="whitebg">
                                <div class="row">
                                    <div class="col-sm-auto">
                                        <img class="contact-profile-image"
                                            src="{{ asset($properties->getMember->image) }}" alt="">
                                    </div>
                                    <div class="col-sm d-flex align-items-center mt-3 mt-sm-0">
                                        <div class="contact-listner">
                                            <strong>{{ $properties->getMember->name }}</strong> <br>
                                            {{ $properties->getMember->company }}<br>
                                            {{ $properties->getMember->phone }}<br>
                                            {{ $properties->getMember->email }}
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-auto d-flex align-items-center">
                                <a href="#"></a>
                              </div> -->
                                    <div
                                        class="col-xxl-auto mt-3 mt-xxl-0 d-flex flex-column align-items-center text-center">
                                        <a href="tel:{{ $properties->getMember->phone }}"
                                            class="outlinebtn full-wd-mobile full-wd-mobile-flex mt-2 w-100">
                                            <i class="me-2"><img src="{{ asset('user/images/phone-icon.png') }}"
                                                    alt=""></i><span>Contact</span>
                                        </a>
                                        <a href="{{ url('direct-message/' . $properties->member_id) }}"
                                            class="outlinebtn full-wd-mobile full-wd-mobile-flex mt-2 w-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="0.875em"
                                                viewBox="0 0 512 512">
                                                <style>
                                                    svg {
                                                        fill: #3b89e7
                                                    }
                                                </style>
                                                <path
                                                    d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z" />
                                            </svg>
                                            <span> Message</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="whitebgborder">
                            <div class="button-grop-btn">
                                <div class="row gx-2 gx-md-3">
                                    @if ($properties->property_sold === 1)
                                        <div class="col-sm-12 col-auto text-center">
                                            <a href="#" class="btn btn-danger custom-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Sold-Out</a>
                                        </div>
                                    @else
                                        <div class="col-sm-4 col-auto text-end">
                                            <a href="#" class="btn btn-primary box-shadow-blue custom-btn"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal3">Buy Now</a>
                                        </div>
                                        <div class="col-sm-4 col-auto">
                                            <a href="#" class="btn btn-primary custom-btn" data-bs-toggle="modal"
                                                data-bs-target="#modal_make_an_offer">Make An Offer</a>
                                        </div>
                                        <div class="col-sm-4 col-auto">
                                            @if (isset($partner))
                                                @if ($partner->status == 1)
                                                    <a href="#" class="btn btn-light custom-btn" id="partner">JV
                                                        Partner</a>
                                                @else
                                                    <a href="#" class="btn btn-dark custom-btn"
                                                        onclick="requested_for_jv()">Requested For JV Partner</a>
                                                @endif
                                            @else
                                                <a href="#" class="btn btn-primary custom-btn"
                                                    onclick="jv_request()" id="default">Request For JV Partner</a>
                                            @endif
                                            <a href="#" class="btn btn-dark custom-btn d-none" id="requested"
                                                onclick="requested_for_jv()">Requested For JV Partner</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModaloff" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-custom">
                    <div class="modal-body p-5">

                        <div class="card ">
                            <form class="form">
                                <div class="wizard">
                                    <div class="wizard-bar" style="width: 0;" data-wizard-bar></div>
                                    <ul class="wizard-list">
                                        <li class="wizard-item" data-wizard-item></li>
                                        <li class="wizard-item" data-wizard-item></li>
                                        <li class="wizard-item" data-wizard-item></li>
                                        <li class="wizard-item with-image" data-wizard-item></li>
                                    </ul>
                                </div>
                                <div class="form-content" data-form-tab>
                                    <div class="form-card">
                                        <h4>Purchase Price: <strong> $250,000</strong></h4>

                                        <div class="property-type  mt-25  mb-3">
                                            <span class="ms-0">Deal Status</span>
                                        </div>
                                        <div class="doller-icon">
                                            <input type="text" maxlength="4" style="max-width:100%"
                                                class="from_1  input-value">
                                        </div>
                                        <div class="norefund">Non-Refundable</div>
                                        <div class="property-type mt-25 mb-3">
                                            <span class="ms-0">Closing date</span>
                                        </div>
                                        <div class="doller-icofn">
                                            <input type="text" maxlength="4" style="max-width:100%"
                                                placeholder="Enter text here" class="from_1  input-value">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-content" data-form-tab>
                                    <div class="form-card">
                                        <p class="mb-0">Upload proof of funds or pre-approval letter. </p>

                                        <div class="mt-3 pt-1">
                                            <div class="avatar-upload avatar-upload-2">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"><i class="me-2"><svg width="20"
                                                                height="18" viewBox="0 0 20 18" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M2 16H18V9H20V17C20 17.2652 19.8946 17.5196 19.7071 17.7071C19.5196 17.8946 19.2652 18 19 18H1C0.734784 18 0.48043 17.8946 0.292893 17.7071C0.105357 17.5196 0 17.2652 0 17V9H2V16ZM11 6V13H9V6H4L10 0L16 6H11Z"
                                                                    fill="#3B89E7" />
                                                            </svg>
                                                        </i> Upload</label>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-content" data-form-tab>
                                    <div class="form-card">
                                        <div class="discriptionblock">
                                            <h2 class="mb-4 text-center pb-1">Contact Information</h2>
                                            <div class="row gx-2">
                                                <div class="col-12 ">
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            <div class="d-flex align-items-center text-uppercase">First
                                                                Name <sup>*</sup></div>
                                                        </label>
                                                        <input type="text" class="form-control form-control2"
                                                            placeholder="Enter text here">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            <div class="d-flex align-items-center text-uppercase">Last Name
                                                                <sup>*</sup>
                                                            </div>
                                                        </label>
                                                        <input type="text" class="form-control form-control2"
                                                            placeholder="Enter text here">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            <div class="d-flex align-items-center text-uppercase">Phone
                                                                <sup>*</sup>
                                                            </div>
                                                        </label>
                                                        <input type="text" class="form-control form-control2"
                                                            placeholder="Enter text here">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            <div class="d-flex align-items-center text-uppercase">Email
                                                                <sup>*</sup>
                                                            </div>
                                                        </label>
                                                        <input type="text" class="form-control form-control2"
                                                            placeholder="Enter text here">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            <div class="d-flex align-items-center text-uppercase">Company
                                                                name <sup>*</sup></div>
                                                        </label>
                                                        <input type="text" class="form-control form-control2"
                                                            placeholder="Enter text here">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-content" data-form-tab>
                                    <div class="form-card">
                                        <div class="discriptionblock">
                                            <h2 class="mb-4 text-center pb-1">Overview</h2>
                                            <div class="row">
                                                <div class="col-6 mb-4">
                                                    <div>
                                                        Offer Price:
                                                    </div>
                                                </div>
                                                <div class="col-6 mb-4 text-end">
                                                    <b>$250,000</b>
                                                </div>
                                                <div class="col-6 mb-4">
                                                    <div>Earnest Deposit:</div>
                                                </div>
                                                <div class="col-6 text-end mb-4">
                                                    <b>$2,000</b>
                                                </div>
                                                <div class="col-6 mb-4">
                                                    <div>Closing Date:</div>
                                                </div>
                                                <div class="col-6 mb-4">
                                                    <div class="text-end"><b>Feb 28th, 2023</b></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="form-buttons text-center">
                                    <button
                                        class="btn btn-light custom-btn graybg-btn btn btnsize mt-40 btn-mobile-block custom-padding-btn btn-lg mx-2"
                                        type="button" data-btn-previous="true">Back</button>
                                    <button
                                        class="btn btnsize mt-40 btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg mx-2"
                                        type="button" data-btn-next="true">Next</button>
                                    <button
                                        class="btn btnsize mt-40 btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg mx-2"
                                        type="button" id data-btn-buynow="true">Buy Now</button>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="schedule_showing" tabindex="-1" aria-labelledby="schedule_showing"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-custom">
                    <div class="modal-body p-5">
                        <div class="card">
                            <div class="container text-center">
                                <h2>Schedule A Showing</h2>
                            </div>
                            <form action="{{ route('store_showing') }}" class="form" method="POST"
                                enctype="multipart/form-data"> @csrf
                                <input type="text" name="property_id" hidden value="{{ $properties->id }}">
                                <input type="text" name="lister_id" hidden value="{{ $properties->member_id }}">
                                <div class="">
                                    <div class="form-card">
                                        <div class="property-type  mt-25  mb-3">
                                            <span class="ms-0">Date</span>
                                        </div>
                                        <div class="">
                                            <input type="date" id="date" placeholder="Please select date"
                                                name="date" style="max-width:100%" class="from_1 input-value"
                                                min="{{ now()->addDay()->format('Y-m-d') }}"
                                                value="{{ old('date') }}">
                                        </div>
                                        @error('date')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="property-type  mt-25  mb-3">
                                            <span class="ms-0">Time</span>
                                        </div>

                                        <div class="">
                                            <select name="time" id="time" class="from_1  input-value"
                                                style="max-width:100%">
                                                <option selected disabled hidden>Please select time</option>
                                                <option value="8:00 am">8:00 am</option>
                                                <option value="8:30 am">8:30 am</option>
                                                <option value="9:00 am">9:00 am</option>
                                                <option value="9:30 am">9:30 am</option>
                                                <option value="10:00 am">10:00 am</option>
                                                <option value="10:30 am">10:30 am</option>
                                                <option value="11:00 am">11:00 am</option>
                                                <option value="11:30 am">11:30 am</option>
                                                <option value="12:00 pm">12:00 pm</option>
                                                <option value="12:30 pm">12:30 pm</option>
                                                <option value="1:00 pm">1:00 pm</option>
                                                <option value="1:30 pm">1:30 pm</option>
                                                <option value="2:00 pm">2:00 pm</option>
                                                <option value="2:30 pm">2:30 pm</option>
                                                <option value="3:00 pm">3:00 pm</option>
                                                <option value="3:30 pm">3:30 pm</option>
                                                <option value="4:00 pm">4:00 pm</option>
                                                <option value="4:30 pm">4:30 pm</option>
                                                <option value="5:00 pm">5:00 pm</option>
                                                <option value="5:30 pm">5:30 pm</option>
                                                <option value="6:00 pm">6:00 pm</option>
                                                <option value="6:30 pm">6:30 pm</option>
                                                <option value="7:00 pm">7:00 pm</option>

                                            </select>
                                        </div>
                                        @error('time')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="form-buttons text-center">
                                            <button
                                                class="btn btnsize mt-40 btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg mx-2"
                                                type="submit" onclick="showSpinner(this)">Submit <i
                                                    class="fas fa-spinner fa-spin myspinner d-none"></i></button>
                                            <button type="button"
                                                class="btn btnsize mt-40 btn-mobile-block  box-shadow-grey btn-secondary custom-padding-btn btn-lg mx-2"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade" id="modal_make_an_offer" tabindex="-1" aria-labelledby="modal_make_an_offer"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-custom">
                    <div class="modal-body p-5">
                        <div class="card">
                            <div class="container text-center">
                                <h2>Make An Offer</h2>
                            </div>
                            <form action="{{ route('buyer_make_an_offer') }}" class="form" method="POST"
                                enctype="multipart/form-data"> @csrf
                                <input type="text" name="property_id" hidden value="{{ $properties->id }}">
                                <input type="text" name="type" hidden value="1">
                                <div class="">
                                    <div class="form-card">
                                        <div class="property-type  mt-25  mb-3">
                                            <span class="ms-0">Offer Price</span>
                                        </div>
                                        <div class="doller-icon">
                                            <input type="text" id="offer_price" name="offer_price"
                                                style="max-width:100%" class="from_1 input-value"
                                                value="{{ old('offer_price') }}" oninput="formatCurrency(this)">
                                        </div>
                                        @if (session('makeAnOffer') === '0')
                                            @error('offer_price')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif
                                        <div class="property-type  mt-25  mb-3">
                                            <span class="ms-0">Earnest deposit</span>
                                        </div>

                                        <div class="doller-icon">
                                            <input type="text" id="earnest_deposit" name="earnest_deposit"
                                                style="max-width:100%" class="from_1  input-value"
                                                value="{{ old('earnest_deposit') }}" oninput="formatCurrency(this)">
                                        </div>
                                        @if (session('makeAnOffer') === '0')
                                            @error('earnest_deposit')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif
                                        <div class="norefund">Non-Refundable</div>
                                        <div class="property-type  mt-25  mb-3">
                                            <span class="ms-0">Closing date</span>
                                        </div>
                                        <div class="doller-icofn">
                                            <input type="date" id="closing_date" name="closing_date"
                                                min="{{ now()->format('Y-m-d') }}" style="max-width:100%"
                                                placeholder="Enter text here" class="from_1  input-value"
                                                value="{{ old('closing_date') }}">
                                        </div>
                                        @if (session('makeAnOffer') === '0')
                                            @error('closing_date')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif
                                        <div class="property-type  mt-25  mb-3">
                                            <span class="ms-0">Upload proof of funds or pre-approval letter.</span>
                                        </div>
                                        <div class="mt-3 pt-1">
                                            <input type="file" name="offer_documents[]" id="docs"
                                                class="form-control myfilePond" allowImagePreview="true" multiple>
                                        </div>
                                        @if (session('makeAnOffer') === '0')
                                            @error('offer_documents')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif
                                        <div class="form-buttons text-center">
                                            <button
                                                class="btn btnsize mt-40 btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg mx-2"
                                                type="submit" onclick="showSpinner(this)">Submit Offer <i
                                                    class="fas fa-spinner fa-spin myspinner d-none"></i></button>
                                            <button type="button"
                                                class="btn btnsize mt-40 btn-mobile-block  box-shadow-grey btn-secondary custom-padding-btn btn-lg mx-2"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-custom">
                    <div class="modal-body p-5">
                        <div class="card">
                            <div class="container text-center">
                                <h2>Buy Now</h2>
                            </div>
                            <form action="{{ route('buyer_make_an_offer') }}" class="form" method="POST"
                                enctype="multipart/form-data"> @csrf
                                <input type="text" name="property_id" hidden value="{{ $properties->id }}">
                                <input type="text" name="type" hidden value="0">
                                <div class="">
                                    <div class="form-card">
                                        <div class="property-type  mt-25  mb-3">
                                            <span class="ms-0">Buying Price</span>
                                        </div>
                                        <div class="doller-icon">
                                            <input type="text" id="offer_price" name="offer_price"
                                                style="max-width:100%" class="from_1 input-value"
                                                value="{{ $properties->price }}" readonly>
                                        </div>
                                        @if (session('makeAnOffer') === '1')
                                            @error('offer_price')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif
                                        <div class="property-type  mt-25  mb-3">
                                            <span class="ms-0">Earnest deposit</span>
                                        </div>

                                        <div class="doller-icon">
                                            <input type="text" id="earnest_deposit" name="earnest_deposit"
                                                style="max-width:100%" class="from_1  input-value"
                                                value="{{ old('earnest_deposit') }}" oninput="formatCurrency(this)">
                                        </div>
                                        @if (session('makeAnOffer') === '1')
                                            @error('earnest_deposit')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif
                                        <div class="norefund">Non-Refundable</div>
                                        <div class="property-type  mt-25  mb-3">
                                            <span class="ms-0">Closing date</span>
                                        </div>
                                        <div class="doller-icofn">
                                            <input type="date" id="closing_date" name="closing_date"
                                                min="{{ now()->format('Y-m-d') }}" style="max-width:100%"
                                                placeholder="Enter text here" class="from_1  input-value"
                                                value="{{ old('closing_date') }}">
                                        </div>
                                        @if (session('makeAnOffer') === '1')
                                            @error('closing_date')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif
                                        <div class="property-type  mt-25  mb-3">
                                            <span class="ms-0">Upload proof of funds or pre-approval letter.</span>
                                        </div>
                                        <div class="mt-3 pt-1">
                                            <input type="file" name="offer_documents[]" id="docs1"
                                                class="form-control myfilePond" allowImagePreview="true" multiple>
                                        </div>
                                        @if (session('makeAnOffer') === '1')
                                            @error('offer_documents')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif
                                        <div class="form-buttons text-center">
                                            <button
                                                class="btn btnsize mt-40 btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg mx-2"
                                                type="submit" id="buy_now_btn" onclick="showSpinner(this)">Submit Offer
                                                <i class="fas fa-spinner fa-spin myspinner d-none"></i></button>
                                            <button type="button"
                                                class="btn btnsize mt-40 btn-mobile-block  box-shadow-grey btn-secondary custom-padding-btn btn-lg mx-2"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{-- <div id="successblock">
                                <div class="successtick">
                                    <img src="{{ asset('user/images/tick-vector.png') }}" alt="">
                                </div>
                                <div class="strongtext">Your Offer has been submited successfully </div>
                            </div> --}}

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-success" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-custom">
                    <div class="modal-body p-5">
                        <div class="card">
                            <div>
                                <div class="successtick">
                                    <img src="{{ asset('user/images/tick-vector.png') }}" alt="">
                                </div>
                                <div class="strongtext">Your Offer has been submited successfully </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleLightbox" tabindex="-1" aria-labelledby="exampleLightboxLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content modal-content-custom">
                    <div class="modal-body">
                        <div id="lightboxExampleCarousel" class="carousel slide">
                            <div class="carousel-inner ratio ratio-16x9 bg-dark">
                                @foreach ($properties->getImages->chunk(4) as $key => $chunk)
                                    @foreach ($chunk as $key => $property_image)
                                        <div class="carousel-item text-center {{ $key === 0 ? 'active' : '' }}">
                                            <img src="{{ asset($property_image->image) }}" class="img-fluid mh-100">
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#lightboxExampleCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon carousel-icon-custom" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#lightboxExampleCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon carousel-icon-custom" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

    @push('js')
        <script>
            // $('#submitbtnOffer').click(function() {
            //     $('#customform').hide();
            //     $('#successblock').show()
            // })

            $(document).ready(function() {

                @if (session('submit-buy-now') == 'true')
                    $('#modal-success').modal('show');
                    setTimeout(function() {
                        $('#modal-success').modal('hide');
                    }, 3000);
                @endif

                @if (session('makeAnOffer') === '0')
                    $('#modal_make_an_offer').modal('show');
                @endif


                @if (session('makeAnOffer') === '1')
                    $('#exampleModal3').modal('show');
                @endif

            })


            function showSpinner(btn) {
                const submitBtn = $(btn); // Convert the button parameter to a jQuery object
                const spinner = submitBtn.find('.myspinner');
                spinner.removeClass("d-none"); // Show the spinner
            }






            function fixDiv() {
                var $div = $("#stickynav");
                if ($(window).scrollTop() > 0) {
                    $('#stickynav').css({
                        'position': 'sticky',
                        'top': '0',
                        'width': '100%',
                    });
                    $('.galerysticky').css({
                        'position': 'sticky',
                        'top': '0',
                        'width': '100%',
                    });
                } else {
                    $('#stickynav').css({
                        'position': 'static',
                        'top': 'auto',
                        'width': '100%'
                    });
                    $('.galerysticky').css({
                        'position': 'static',
                        'top': 'auto',
                        'width': '100%'
                    });

                }
            }

            $("#stickynav").data("top", $("#stickynav").offset().top); // set original position on load
            $(window).scroll(fixDiv);

            new ShowMore('.element', {})

            // $(document).ready(function () {
            //             $("#t1").scroll(function () {
            //                 alert("scroll happened");
            //             });
            //  });

            /** Pause/Play Button **/
            $(".carousel-pause").click(function() {
                var id = $(this).attr("href");
                if ($(this).hasClass("pause")) {
                    $(this).removeClass("pause").toggleClass("play");
                    $(this).children(".sr-only").text("Play");
                    $(id).carousel("pause");
                } else {
                    $(this).removeClass("play").toggleClass("pause");
                    $(this).children(".sr-only").text("Pause");
                    $(id).carousel("cycle");
                }
                $(id).carousel;
            });




            /** Fullscreen Buttun **/
            $(".carousel-fullscreen").click(function() {
                var id = $(this).attr("href");
                $(id).find(".active").ekkoLightbox({
                    type: "image"
                });
            });

            if ($("[id^=carousel-thumbs] .carousel-item").length < 2) {
                $("#carousel-thumbs [class^=carousel-control-]").remove();
                $("#carousel-thumbs").css("padding", "0 5px");
            }

            $("#carousel").on("slide.bs.carousel", function(e) {
                var id = parseInt($(e.relatedTarget).attr("data-slide-number"));
                var thumbNum = parseInt(
                    $("[id=carousel-selector-" + id + "]")
                    .parent()
                    .parent()
                    .attr("data-slide-number")
                );
                $("[id^=carousel-selector-]").removeClass("selected");
                $("[id=carousel-selector-" + id + "]").addClass("selected");
                $("#carousel-thumbs").carousel(thumbNum);
            });

            $('.multiple-items').slick({

                slidesToShow: 6,
                autoplay: true,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 1,
                        }

                    }, {
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 6,
                            slidesToScroll: 2,
                        }
                    },

                    {
                        breakpoint: 675,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            dots: true,
                            infinite: true,
                            autoplay: true,
                            autoplaySpeed: 2000,
                        }
                    }
                ]
            });

            $(document).ready(function() {
                $(".burger").click(function() {
                    $(this).toggleClass("active");
                    $(".mobilenav").toggleClass("active");
                })
                $(".btn-filter").click(function() {
                    $('.property-seaction-block').toggleClass("active");
                    $(".overflowbg").toggleClass("active");
                })
                $(".overflowbg").click(function() {
                    $('.property-seaction-block').toggleClass("active");
                    $(".overflowbg").toggleClass("active");
                })



                $(".custom-card-block").on('click', function() {
                    $(".custom-card-block.active").removeClass("active");
                    // adding classname 'active' to current click li
                    $(this).addClass("active");
                });
            })


            /*************************
             ON WINDOW SCROLL FUNCTION
            *************************/
            var sectionIds = {};

            $(".row-nav").each(function() {
                var $this = $(this);
                sectionIds[$this.attr("id")] = $this.first().offset().top - 120;
            });


            var count2 = 0;
            $(window).scroll(function(event) {

                var scrolled = $(this).scrollTop();

                //If it reaches the top of the row, add an active class to it
                // $(".row-nav").each(function(){

                // 	var $this = $(this);

                // 	if(scrolled >= $this.first().offset().top -120){
                // 		$(".row-nav").removeClass("active");
                // 		$this.addClass("active");

                // 		$(".animation").removeClass('animationActive');
                // 		$this.find(".animation").addClass('animationActive');

                // 	}
                // });

                //when reaches the row, also add a class to the navigation
                for (key in sectionIds) {
                    if (scrolled >= sectionIds[key]) {
                        $(".nav-btn-block").removeClass("active");
                        var c = $("[data-row-id=" + key + "]");
                        c.addClass("active");

                        var i = c.index();
                        $('#nav-indicator').css('left', i * 100 + 'px');
                    }
                }


                //Check if we've reached the top
                if (scrolled > count2) {
                    count2++;
                } else {
                    count2--;
                }

                count2 = scrolled;

                if (count2 == 0) {
                    $('h1 ,h2').addClass('animationActive');
                } else {
                    $('h1 ,h2').removeClass('animationActive');
                }

            });
            /**************
             IN-NAVIGATION
            **************/
            $(".nav-btn-block").click(function() {
                $(this).addClass("active");
                $(this).siblings().removeClass("active");

                var i = $(this).index();
                $('#nav-indicator').css('left', i * 100 + 'px');

                var name = $(this).attr("data-row-id");
                var id = "#" + name;
                var top = $(id).first().offset().top - 60;
                $('html, body').animate({
                    scrollTop: top + 'px'
                }, 300);

            });
            /*****
             TOP
            ******/
            $('#top').click(function() {
                $('html, body').animate({
                    scrollTop: '0px'
                }, 300);
            });
        </script>
        <script>
            $('#offer_price').on('input', function() {
                var inputValue = '$ ' + $(this).val();
                $('#offer_price_label').text(inputValue);
            });
            $('#earnest_deposit').on('input', function() {
                var inputValue = '$ ' + $(this).val();
                $('#earnest_deposit_label').text(inputValue);
            });
            $('#closing_date').on('input', function() {
                var inputValue = $(this).val();
                $('#closing_date_label').text(inputValue);
            });
        </script>

        {{-- filepond --}}
        <script>
            FilePond.registerPlugin(FilePondPluginImagePreview);
            const input = document.querySelector('#docs');
            FilePond.create(input, {
                storeAsFile: true
                // other FilePond options
                // acceptedFileTypes: ['image/*', 'video/*']
            });
            const input1 = document.querySelector('#docs1');
            FilePond.create(input1, {
                storeAsFile: true
                // other FilePond options
                // acceptedFileTypes: ['image/*', 'video/*']
            });

            FilePond.parse(document.body);
            $('.filepond--credits').hide();
        </script>

        <script>
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-secondary'
                },
                buttonsStyling: false
            });

            function requested_for_jv() {
                swalWithBootstrapButtons.fire(
                    'Error',
                    'You have already requested for JV partner. We will contact you soon.',
                    'error'
                );
            }

            function jv_request() {


                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You are going to request for JV partner for this property.",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Request For JV Partner.',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        var data = {
                            "_token": '{{ csrf_token() }}',
                            "member_id": '{{ $user !== null ? $user->id : 0 }}',
                            "property_id": '{{ $properties->id }}',
                            "lister_id": '{{ $properties->member_id }}',
                        };
                        var url = '{{ route('store_jv_partner') }}';
                        var res = AjaxRequest(url, data);
                        if (res.status == 401) { // if not logged in
                            swalWithBootstrapButtons.fire(
                                'Not Authorized',
                                'Kindly Login First',
                                'error'
                            );
                        } else {
                            if (res.status == 1) // Submitted Success
                            {
                                swalWithBootstrapButtons.fire(
                                    'Thank you',
                                    'Your request has been submitted we will contact you soon.',
                                    'success'
                                );

                                $('#default').hide();
                                $('#requested').removeClass('d-none');
                            } else if (res.status == 2) // request already exists
                            {
                                requested_for_jv();
                            } else if (res.status == 3) // profile status not completed
                            {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Please complete your profile first to proceed..!',
                                    footer: '<a href="{{ route('my_profile') }}">Go to profile...</a>'
                                })
                            } else if (res.status == 4) {
                                swalWithBootstrapButtons.fire( // error occured
                                    'Error',
                                    'This is your property listing, You cannot request yourself for jv partner.',
                                    'error'
                                );
                            } else {
                                swalWithBootstrapButtons.fire( // error occured
                                    'Error',
                                    'Something went wrong please try again later.',
                                    'error'
                                );
                            }
                        }

                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'You cancelled request for JV Partner.',
                            'error'
                        );
                    }
                });

            }
        </script>
    @endpush
