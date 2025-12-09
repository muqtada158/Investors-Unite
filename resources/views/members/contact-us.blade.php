@extends('members.layouts.app')

@section('content')
    <div class="main main-mb-120px">
        <!-- SEARCH BAR START  -->

        <!-- SEARCH BAR END  -->
        <div class="row">
            <div class="col-md-12">
                <div class="border-top height-40"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="discriptionblock ">
                    <h2 class="mb-4">Get in touch with us.</h2>
                </div>
                <p>
                    The Investor Unite team is glad to assist you with any questions you have.
                </p>
                <p>
                    Make sure you fill out the information form to ensure your question gets answered.
                </p>
                <hr style="margin:34px 0px">

                <div class="discriptionblock ">
                    <h2 class="mb-4">Investors Unite Hours:</h2>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="graybgbox">
                            <p class="mb-40">Monday: 9am - 6pm EST</p>
                            <p class="mb-40">Tuesday: 9am - 6pm EST</p>
                            <p class="mb-40">Wednesday: 9am - 6pm EST</p>
                            <p class="mb-0">Thursday: 9am - 6pm EST</p>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="graybgbox">
                            <p class="mb-40">Friday: 9am - 6pm EST</p>
                            <p class="mb-40">Saturday: 9am - 6pm EST</p>
                            <p class="mb-0">Sunday: 9am - 6pm EST</p>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-xl-6">
                <div class="discriptionblock mt-4 mt-xl-0">
                    <h2>Get in touch with us.</h2>
                </div>
                <form action="{{route('send_contact')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="row mt-4 gx-lg-4 mb-5 mb-md-0">
                        <div class="col-sm-12">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i
                                        class="me-2"><svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 16.5H10.5V15C10.5 14.4033 10.2629 13.831 9.84099 13.409C9.41903 12.9871 8.84674 12.75 8.25 12.75H3.75C3.15326 12.75 2.58097 12.9871 2.15901 13.409C1.73705 13.831 1.5 14.4033 1.5 15V16.5H0V15C0 14.0054 0.395088 13.0516 1.09835 12.3483C1.80161 11.6451 2.75544 11.25 3.75 11.25H8.25C9.24456 11.25 10.1984 11.6451 10.9017 12.3483C11.6049 13.0516 12 14.0054 12 15V16.5ZM6 9.75C5.40905 9.75 4.82389 9.6336 4.27792 9.40746C3.73196 9.18131 3.23588 8.84984 2.81802 8.43198C2.40016 8.01412 2.06869 7.51804 1.84254 6.97208C1.6164 6.42611 1.5 5.84095 1.5 5.25C1.5 4.65905 1.6164 4.07389 1.84254 3.52792C2.06869 2.98196 2.40016 2.48588 2.81802 2.06802C3.23588 1.65016 3.73196 1.31869 4.27792 1.09254C4.82389 0.866396 5.40905 0.75 6 0.75C7.19347 0.75 8.33807 1.22411 9.18198 2.06802C10.0259 2.91193 10.5 4.05653 10.5 5.25C10.5 6.44347 10.0259 7.58807 9.18198 8.43198C8.33807 9.27589 7.19347 9.75 6 9.75ZM6 8.25C6.79565 8.25 7.55871 7.93393 8.12132 7.37132C8.68393 6.80871 9 6.04565 9 5.25C9 4.45435 8.68393 3.69129 8.12132 3.12868C7.55871 2.56607 6.79565 2.25 6 2.25C5.20435 2.25 4.44129 2.56607 3.87868 3.12868C3.31607 3.69129 3 4.45435 3 5.25C3 6.04565 3.31607 6.80871 3.87868 7.37132C4.44129 7.93393 5.20435 8.25 6 8.25Z"
                                                fill="#3B89E7" />
                                        </svg>
                                    </i> Name <sup class="redcolor">*</sup></label>
                                <input type="text" class="form-control" placeholder="Enter name here" name="name" value="{{ old('name', auth()->guard('member')->check() ? auth()->guard('member')->user()->name : '') }}">
                                @error('name')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i
                                        class="me-2"><svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 16.5H10.5V15C10.5 14.4033 10.2629 13.831 9.84099 13.409C9.41903 12.9871 8.84674 12.75 8.25 12.75H3.75C3.15326 12.75 2.58097 12.9871 2.15901 13.409C1.73705 13.831 1.5 14.4033 1.5 15V16.5H0V15C0 14.0054 0.395088 13.0516 1.09835 12.3483C1.80161 11.6451 2.75544 11.25 3.75 11.25H8.25C9.24456 11.25 10.1984 11.6451 10.9017 12.3483C11.6049 13.0516 12 14.0054 12 15V16.5ZM6 9.75C5.40905 9.75 4.82389 9.6336 4.27792 9.40746C3.73196 9.18131 3.23588 8.84984 2.81802 8.43198C2.40016 8.01412 2.06869 7.51804 1.84254 6.97208C1.6164 6.42611 1.5 5.84095 1.5 5.25C1.5 4.65905 1.6164 4.07389 1.84254 3.52792C2.06869 2.98196 2.40016 2.48588 2.81802 2.06802C3.23588 1.65016 3.73196 1.31869 4.27792 1.09254C4.82389 0.866396 5.40905 0.75 6 0.75C7.19347 0.75 8.33807 1.22411 9.18198 2.06802C10.0259 2.91193 10.5 4.05653 10.5 5.25C10.5 6.44347 10.0259 7.58807 9.18198 8.43198C8.33807 9.27589 7.19347 9.75 6 9.75ZM6 8.25C6.79565 8.25 7.55871 7.93393 8.12132 7.37132C8.68393 6.80871 9 6.04565 9 5.25C9 4.45435 8.68393 3.69129 8.12132 3.12868C7.55871 2.56607 6.79565 2.25 6 2.25C5.20435 2.25 4.44129 2.56607 3.87868 3.12868C3.31607 3.69129 3 4.45435 3 5.25C3 6.04565 3.31607 6.80871 3.87868 7.37132C4.44129 7.93393 5.20435 8.25 6 8.25Z"
                                                fill="#3B89E7" />
                                        </svg>
                                    </i>Email <sup class="redcolor">*</sup></label>
                                    <input type="text" class="form-control" placeholder="Enter email here" name="email" value="{{ old('email', auth()->guard('member')->check() ? auth()->guard('member')->user()->email : '') }}">

                                @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="text-uppercase mb-3 form-label"><i
                                        class="me-2"><svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 16.5H10.5V15C10.5 14.4033 10.2629 13.831 9.84099 13.409C9.41903 12.9871 8.84674 12.75 8.25 12.75H3.75C3.15326 12.75 2.58097 12.9871 2.15901 13.409C1.73705 13.831 1.5 14.4033 1.5 15V16.5H0V15C0 14.0054 0.395088 13.0516 1.09835 12.3483C1.80161 11.6451 2.75544 11.25 3.75 11.25H8.25C9.24456 11.25 10.1984 11.6451 10.9017 12.3483C11.6049 13.0516 12 14.0054 12 15V16.5ZM6 9.75C5.40905 9.75 4.82389 9.6336 4.27792 9.40746C3.73196 9.18131 3.23588 8.84984 2.81802 8.43198C2.40016 8.01412 2.06869 7.51804 1.84254 6.97208C1.6164 6.42611 1.5 5.84095 1.5 5.25C1.5 4.65905 1.6164 4.07389 1.84254 3.52792C2.06869 2.98196 2.40016 2.48588 2.81802 2.06802C3.23588 1.65016 3.73196 1.31869 4.27792 1.09254C4.82389 0.866396 5.40905 0.75 6 0.75C7.19347 0.75 8.33807 1.22411 9.18198 2.06802C10.0259 2.91193 10.5 4.05653 10.5 5.25C10.5 6.44347 10.0259 7.58807 9.18198 8.43198C8.33807 9.27589 7.19347 9.75 6 9.75ZM6 8.25C6.79565 8.25 7.55871 7.93393 8.12132 7.37132C8.68393 6.80871 9 6.04565 9 5.25C9 4.45435 8.68393 3.69129 8.12132 3.12868C7.55871 2.56607 6.79565 2.25 6 2.25C5.20435 2.25 4.44129 2.56607 3.87868 3.12868C3.31607 3.69129 3 4.45435 3 5.25C3 6.04565 3.31607 6.80871 3.87868 7.37132C4.44129 7.93393 5.20435 8.25 6 8.25Z"
                                                fill="#3B89E7" />
                                        </svg>
                                    </i>Phone <sup class="redcolor">*</sup></label>
                                <input type="text" class="form-control phone-number" placeholder="Enter phone here" name="phone" value="{{ old('phone', auth()->guard('member')->check() ? auth()->guard('member')->user()->phone : '' )}}">
                                @error('phone')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="text-uppercase mb-3 form-label"><i
                                        class="me-2"><svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 16.5H10.5V15C10.5 14.4033 10.2629 13.831 9.84099 13.409C9.41903 12.9871 8.84674 12.75 8.25 12.75H3.75C3.15326 12.75 2.58097 12.9871 2.15901 13.409C1.73705 13.831 1.5 14.4033 1.5 15V16.5H0V15C0 14.0054 0.395088 13.0516 1.09835 12.3483C1.80161 11.6451 2.75544 11.25 3.75 11.25H8.25C9.24456 11.25 10.1984 11.6451 10.9017 12.3483C11.6049 13.0516 12 14.0054 12 15V16.5ZM6 9.75C5.40905 9.75 4.82389 9.6336 4.27792 9.40746C3.73196 9.18131 3.23588 8.84984 2.81802 8.43198C2.40016 8.01412 2.06869 7.51804 1.84254 6.97208C1.6164 6.42611 1.5 5.84095 1.5 5.25C1.5 4.65905 1.6164 4.07389 1.84254 3.52792C2.06869 2.98196 2.40016 2.48588 2.81802 2.06802C3.23588 1.65016 3.73196 1.31869 4.27792 1.09254C4.82389 0.866396 5.40905 0.75 6 0.75C7.19347 0.75 8.33807 1.22411 9.18198 2.06802C10.0259 2.91193 10.5 4.05653 10.5 5.25C10.5 6.44347 10.0259 7.58807 9.18198 8.43198C8.33807 9.27589 7.19347 9.75 6 9.75ZM6 8.25C6.79565 8.25 7.55871 7.93393 8.12132 7.37132C8.68393 6.80871 9 6.04565 9 5.25C9 4.45435 8.68393 3.69129 8.12132 3.12868C7.55871 2.56607 6.79565 2.25 6 2.25C5.20435 2.25 4.44129 2.56607 3.87868 3.12868C3.31607 3.69129 3 4.45435 3 5.25C3 6.04565 3.31607 6.80871 3.87868 7.37132C4.44129 7.93393 5.20435 8.25 6 8.25Z"
                                                fill="#3B89E7" />
                                        </svg>
                                    </i>Message <sup class="redcolor">*</sup></label>
                                <textarea class="form-control" id="" cols="30" rows="5" name="message" placeholder="Enter message here">{{ old('message')}}</textarea>
                                @error('message')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" id="submitBtn" class="btn btnsize btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg ">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row pt-3 pb-4 mt-0 mb-0 postionfixed">
            <div class="col-md-8 mx-auto">
                <a href="#"
                    class="btn btnsize btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg text-start d-block "><i
                        class="me-2"><svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 0H19C19.2652 0 19.5196 0.105357 19.7071 0.292893C19.8946 0.48043 20 0.734784 20 1V17C20 17.2652 19.8946 17.5196 19.7071 17.7071C19.5196 17.8946 19.2652 18 19 18H1C0.734784 18 0.48043 17.8946 0.292893 17.7071C0.105357 17.5196 0 17.2652 0 17V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0ZM18 4.238L10.072 11.338L2 4.216V16H18V4.238ZM2.511 2L10.061 8.662L17.502 2H2.511Z"
                                fill="white" />
                        </svg>
                    </i> support@investorunite.com</a>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('#submitBtn').click(function(e) {
            $(this).text('Sending...');
        });
    </script>
@endpush

