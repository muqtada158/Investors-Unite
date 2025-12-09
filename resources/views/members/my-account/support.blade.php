@extends('members.layouts.app')

@section('content')
    <div class="main">
        <!-- SEARCH BAR START  -->

        <!-- SEARCH BAR END  -->
        <div class="row">
            <div class="col-md-12">
                <div class="border-top height-40"></div>
            </div>
        </div>


        <div class="row mt-4 m-0">

            @include('members.my-account.sidebar')

            <div class="profile-block-container ps-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-block d-md-none">
                            <h3 class="support-headingtext-3">Support</h3>
                        </div>
                        <div class="d-flex align-items-center flex-wrap">

                            <div class="support-headingtext  me-sm-5 ">
                                How can we help you today?
                            </div>
                            <div class="d-flex align-items-center mt-3 mt-md-0 w-100">
                                <a href="#" class="graybg-btn me-2 me-sm-3 my-1">
                                    <i class="me-lg-2"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.455 16L0 19.5V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H19C19.2652 0 19.5196 0.105357 19.7071 0.292893C19.8946 0.48043 20 0.734784 20 1V15C20 15.2652 19.8946 15.5196 19.7071 15.7071C19.5196 15.8946 19.2652 16 19 16H4.455ZM3.763 14H18V2H2V15.385L3.763 14ZM9 7H11V9H9V7ZM5 7H7V9H5V7ZM13 7H15V9H13V7Z"
                                                fill="#3B89E7" />
                                        </svg>
                                    </i><span>Live Chat</span>
                                </a>
                                <a href="#" class="graybg-btn me-2 me-sm-3 my-1">
                                    <i class="me-lg-2"><svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1 0H19C19.2652 0 19.5196 0.105357 19.7071 0.292893C19.8946 0.48043 20 0.734784 20 1V17C20 17.2652 19.8946 17.5196 19.7071 17.7071C19.5196 17.8946 19.2652 18 19 18H1C0.734784 18 0.48043 17.8946 0.292893 17.7071C0.105357 17.5196 0 17.2652 0 17V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0ZM18 4.238L10.072 11.338L2 4.216V16H18V4.238ZM2.511 2L10.061 8.662L17.502 2H2.511Z"
                                                fill="#3B89E7" />
                                        </svg>

                                    </i><span>Email</span>
                                </a>
                                <a href="#" class="graybg-btn my-1">
                                    <i class="me-lg-2"><svg width="14" height="20" viewBox="0 0 14 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 2V18H12V2H2ZM1 0H13C13.2652 0 13.5196 0.105357 13.7071 0.292893C13.8946 0.48043 14 0.734784 14 1V19C14 19.2652 13.8946 19.5196 13.7071 19.7071C13.5196 19.8946 13.2652 20 13 20H1C0.734784 20 0.48043 19.8946 0.292893 19.7071C0.105357 19.5196 0 19.2652 0 19V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0ZM7 15C7.26522 15 7.51957 15.1054 7.70711 15.2929C7.89464 15.4804 8 15.7348 8 16C8 16.2652 7.89464 16.5196 7.70711 16.7071C7.51957 16.8946 7.26522 17 7 17C6.73478 17 6.48043 16.8946 6.29289 16.7071C6.10536 16.5196 6 16.2652 6 16C6 15.7348 6.10536 15.4804 6.29289 15.2929C6.48043 15.1054 6.73478 15 7 15Z"
                                                fill="#3B89E7" />
                                        </svg>

                                    </i><span>SMS</span>
                                </a>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-12">
                        @if (count($faqs) > 0 )
                            <h3 class="heading-text1 mb-4">Frequently Asked Questions</h3>
                            <div class="accordion" id="accordionExample">
                                @foreach ($faqs as $key=> $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{$key}}">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{$key}}" aria-expanded="{{$key == 0 ? 'true' : 'false'}}" aria-controls="collapse{{$key}}">
                                                {{$faq->question}}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$key}}" class="accordion-collapse collapse {{$key == 0 ? 'show' : ''}}" aria-labelledby="heading{{$key}}"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {{$faq->answer}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="supportfooterblock">
                            <div class="emailboxdiv mt-md-5 mb-md-5">
                                <i class="me-2 me-sm-3"><svg width="20" height="18" viewBox="0 0 20 18"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1 0H19C19.2652 0 19.5196 0.105357 19.7071 0.292893C19.8946 0.48043 20 0.734784 20 1V17C20 17.2652 19.8946 17.5196 19.7071 17.7071C19.5196 17.8946 19.2652 18 19 18H1C0.734784 18 0.48043 17.8946 0.292893 17.7071C0.105357 17.5196 0 17.2652 0 17V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0ZM18 4.238L10.072 11.338L2 4.216V16H18V4.238ZM2.511 2L10.061 8.662L17.502 2H2.511Z"
                                            fill="white" />
                                    </svg>
                                </i>
                                <span>
                                    support@investorunite.com
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
