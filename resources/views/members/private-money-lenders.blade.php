@extends('members.layouts.app')

@section('content')
<style>
    #money_lenders_list .mycard {
        z-index: 0;
        position: relative;
        padding: 10px 10px 20px 10px;
        border: 1px solid #bfbfbf5e;
        box-shadow: 10px 10px 5px #aaaaaa;
    }
    #money_lenders_list .my-border-radius {
        border-radius: 5px;
        width: 100%;
        height: 200px;
    }
    thead, tbody, tfoot, tr, td, th {
        border-color: inherit;
        border-style: none;
        border-width: 0;
    }
    #money_lenders_list .card-footer {
        padding: 0.5rem 1rem;
        background-color: transparent;
        border-top: none;
    }
    #money_lenders_list .card-header {
        padding: 0.5rem 1rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, 0.03);
        border-bottom: none;
    }
    #money_lenders_list .card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(30, 30, 30, 0.1);
}

    #money_lenders_list .card-img-top {
    padding: 4%;
    border-radius: 20px;
    }

    /* .card-title, .card-text {
        text-align: center;
    } */

    #money_lenders_list .card-title {
        font-weight: 700;
    }

    #money_lenders_list .card-text {
        font-size: 15px;
        font-weight: 400;
    }
    #money_lenders_list .img-thumbnail {
        padding: 0.25rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 1.25rem;
        width: 220px;
        height: 220px;
    }
    .form-check-input:checked {
        background-color: #3b89e7;
        border-color: #3b89e7;
    }
    </style>
<div class="main ">
    <!-- SEARCH BAR START  -->

    <!-- SEARCH BAR END  -->
    <div class="row">
        <div class="col-md-12">
            <div class="border-top height-40"></div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <h2>Find Funding Today!</h2>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <p>
                    Looking to find a lender for your real state deal?
                    <br>
                    Look no further! we have a large database of qualified lenders to assist you with all real state needs.
                </p>
            </div>
            <form id="myform">
                <div class="col-xl-12">
                    <div class="row mt-4 gx-lg-4 mb-5 mb-md-0">
                        <div class="col-sm-12">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3 text-dark"><i
                                        class="me-2"><svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 16.5H10.5V15C10.5 14.4033 10.2629 13.831 9.84099 13.409C9.41903 12.9871 8.84674 12.75 8.25 12.75H3.75C3.15326 12.75 2.58097 12.9871 2.15901 13.409C1.73705 13.831 1.5 14.4033 1.5 15V16.5H0V15C0 14.0054 0.395088 13.0516 1.09835 12.3483C1.80161 11.6451 2.75544 11.25 3.75 11.25H8.25C9.24456 11.25 10.1984 11.6451 10.9017 12.3483C11.6049 13.0516 12 14.0054 12 15V16.5ZM6 9.75C5.40905 9.75 4.82389 9.6336 4.27792 9.40746C3.73196 9.18131 3.23588 8.84984 2.81802 8.43198C2.40016 8.01412 2.06869 7.51804 1.84254 6.97208C1.6164 6.42611 1.5 5.84095 1.5 5.25C1.5 4.65905 1.6164 4.07389 1.84254 3.52792C2.06869 2.98196 2.40016 2.48588 2.81802 2.06802C3.23588 1.65016 3.73196 1.31869 4.27792 1.09254C4.82389 0.866396 5.40905 0.75 6 0.75C7.19347 0.75 8.33807 1.22411 9.18198 2.06802C10.0259 2.91193 10.5 4.05653 10.5 5.25C10.5 6.44347 10.0259 7.58807 9.18198 8.43198C8.33807 9.27589 7.19347 9.75 6 9.75ZM6 8.25C6.79565 8.25 7.55871 7.93393 8.12132 7.37132C8.68393 6.80871 9 6.04565 9 5.25C9 4.45435 8.68393 3.69129 8.12132 3.12868C7.55871 2.56607 6.79565 2.25 6 2.25C5.20435 2.25 4.44129 2.56607 3.87868 3.12868C3.31607 3.69129 3 4.45435 3 5.25C3 6.04565 3.31607 6.80871 3.87868 7.37132C4.44129 7.93393 5.20435 8.25 6 8.25Z"
                                                fill="#3B89E7" />
                                        </svg>
                                    </i> How much money did you plan to lend at one time? <sup class="redcolor">*</sup></label>
                                    <div class="sliderblock">
                                        <div class="row mt-3">
                                            <div class="col-sm-6">
                                                <span class="price-range-label">Min</span>
                                                <div class="doller-icon">
                                                    <select name="price_from"  class="from_1 set-width-100 input-value">
                                                        <option value="0">0</option>
                                                        <option value="50000">50,000</option>
                                                        <option value="100000">100,000</option>
                                                        <option value="150000">150,000</option>
                                                        <option value="200000">200,000</option>
                                                        <option value="250000">250,000</option>
                                                        <option value="300000">300,000</option>
                                                        <option value="350000">350,000</option>
                                                        <option value="400000">400,000</option>
                                                        <option value="450000">450,000</option>
                                                        <option value="500000">500,000</option>
                                                        <option value="550000">550,000</option>
                                                        <option value="600000">600,000</option>
                                                        <option value="650000">650,000</option>
                                                        <option value="700000">700,000</option>
                                                        <option value="750000">750,000</option>
                                                        <option value="800000">800,000</option>
                                                        <option value="850000">850,000</option>
                                                        <option value="900000">900,000</option>
                                                        <option value="950000">950,000</option>
                                                        <option value="1000000">1.00M</option>
                                                        <option value="1250000">1.25M</option>
                                                        <option value="1500000">1.50M</option>
                                                        <option value="1750000">1.75M</option>
                                                        <option value="2000000">2.00M</option>
                                                        <option value="2250000">2.25M</option>
                                                        <option value="2500000">2.50M</option>
                                                        <option value="2750000">2.75M</option>
                                                        <option value="3000000">3.00M</option>
                                                        <option value="3250000">3.25M</option>
                                                        <option value="3500000">3.50M</option>
                                                        <option value="3750000">3.75M</option>
                                                        <option value="4000000">4.00M</option>
                                                        <option value="4250000">4.25M</option>
                                                        <option value="4500000">4.50M</option>
                                                        <option value="4750000">4.75M</option>
                                                        <option value="5000000">5.00M</option>
                                                        <option value="6000000">6.00M</option>
                                                        <option value="7000000">7.00M</option>
                                                        <option value="8000000">8.00M</option>
                                                        <option value="9000000">9.00M</option>
                                                        <option value="10000000">10.00M</option>
                                                        <option value="11000000">11.00M</option>
                                                        <option value="12000000">12.00M</option>
                                                        <option value="13000000">13.00M</option>
                                                        <option value="14000000">14.00M</option>
                                                        <option value="15000000">15.00M</option>
                                                        <option value="16000000">16.00M</option>
                                                        <option value="17000000">17.00M</option>
                                                        <option value="18000000">18.00M</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 ms-auto">

                                                <span class="price-range-label">Max</span>
                                                <div class="doller-icon">
                                                    <select name="price_to"  class="to_1 set-width-100  input-value">
                                                        <option value="50000">50,000</option>
                                                        <option value="100000">100,000</option>
                                                        <option value="150000">150,000</option>
                                                        <option value="200000">200,000</option>
                                                        <option value="250000">250,000</option>
                                                        <option value="300000">300,000</option>
                                                        <option value="350000">350,000</option>
                                                        <option value="400000">400,000</option>
                                                        <option value="450000">450,000</option>
                                                        <option value="500000">500,000</option>
                                                        <option value="550000">550,000</option>
                                                        <option value="600000">600,000</option>
                                                        <option value="650000">650,000</option>
                                                        <option value="700000">700,000</option>
                                                        <option value="750000">750,000</option>
                                                        <option value="800000">800,000</option>
                                                        <option value="850000">850,000</option>
                                                        <option value="900000">900,000</option>
                                                        <option value="950000">950,000</option>
                                                        <option value="1000000">1.00M</option>
                                                        <option value="1250000">1.25M</option>
                                                        <option value="1500000">1.50M</option>
                                                        <option value="1750000">1.75M</option>
                                                        <option value="2000000">2.00M</option>
                                                        <option value="2250000">2.25M</option>
                                                        <option value="2500000">2.50M</option>
                                                        <option value="2750000">2.75M</option>
                                                        <option value="3000000">3.00M</option>
                                                        <option value="3250000">3.25M</option>
                                                        <option value="3500000">3.50M</option>
                                                        <option value="3750000">3.75M</option>
                                                        <option value="4000000">4.00M</option>
                                                        <option value="4250000">4.25M</option>
                                                        <option value="4500000">4.50M</option>
                                                        <option value="4750000">4.75M</option>
                                                        <option value="5000000">5.00M</option>
                                                        <option value="6000000">6.00M</option>
                                                        <option value="7000000">7.00M</option>
                                                        <option value="8000000">8.00M</option>
                                                        <option value="9000000">9.00M</option>
                                                        <option value="10000000">10.00M</option>
                                                        <option value="11000000">11.00M</option>
                                                        <option value="12000000">12.00M</option>
                                                        <option value="13000000">13.00M</option>
                                                        <option value="14000000">14.00M</option>
                                                        <option value="15000000">15.00M</option>
                                                        <option value="16000000">16.00M</option>
                                                        <option value="17000000">17.00M</option>
                                                        <option value="18000000">18.00M</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="text-uppercase mb-3 form-label text-dark"><i
                                        class="me-2"><svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 16.5H10.5V15C10.5 14.4033 10.2629 13.831 9.84099 13.409C9.41903 12.9871 8.84674 12.75 8.25 12.75H3.75C3.15326 12.75 2.58097 12.9871 2.15901 13.409C1.73705 13.831 1.5 14.4033 1.5 15V16.5H0V15C0 14.0054 0.395088 13.0516 1.09835 12.3483C1.80161 11.6451 2.75544 11.25 3.75 11.25H8.25C9.24456 11.25 10.1984 11.6451 10.9017 12.3483C11.6049 13.0516 12 14.0054 12 15V16.5ZM6 9.75C5.40905 9.75 4.82389 9.6336 4.27792 9.40746C3.73196 9.18131 3.23588 8.84984 2.81802 8.43198C2.40016 8.01412 2.06869 7.51804 1.84254 6.97208C1.6164 6.42611 1.5 5.84095 1.5 5.25C1.5 4.65905 1.6164 4.07389 1.84254 3.52792C2.06869 2.98196 2.40016 2.48588 2.81802 2.06802C3.23588 1.65016 3.73196 1.31869 4.27792 1.09254C4.82389 0.866396 5.40905 0.75 6 0.75C7.19347 0.75 8.33807 1.22411 9.18198 2.06802C10.0259 2.91193 10.5 4.05653 10.5 5.25C10.5 6.44347 10.0259 7.58807 9.18198 8.43198C8.33807 9.27589 7.19347 9.75 6 9.75ZM6 8.25C6.79565 8.25 7.55871 7.93393 8.12132 7.37132C8.68393 6.80871 9 6.04565 9 5.25C9 4.45435 8.68393 3.69129 8.12132 3.12868C7.55871 2.56607 6.79565 2.25 6 2.25C5.20435 2.25 4.44129 2.56607 3.87868 3.12868C3.31607 3.69129 3 4.45435 3 5.25C3 6.04565 3.31607 6.80871 3.87868 7.37132C4.44129 7.93393 5.20435 8.25 6 8.25Z"
                                                fill="#3B89E7" />
                                        </svg>
                                    </i>What kind of lending do you want?<sup class="redcolor">*</sup></label>
                                    <div class="form-check">
                                        {{-- <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Traditional Funding">
                                            <label class="form-check-label text-dark" for="inlineCheckbox1">&nbsp; Traditional Funding</label>
                                        </div> --}}
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="lending_type" type="radio" id="inlineCheckbox2" value="Short Term 1-2 months">
                                            <label class="form-check-label text-dark" for="inlineCheckbox2">&nbsp; Short Term 1-2 months</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="lending_type" type="radio" id="inlineCheckbox3" value="Medium Term 3-12 months">
                                            <label class="form-check-label text-dark" for="inlineCheckbox3">&nbsp; Medium Term 3-12 months</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="lending_type" type="radio" id="inlineCheckbox4" value="Long Term 1-30 years">
                                            <label class="form-check-label text-dark" for="inlineCheckbox4">&nbsp; Long Term 1-30 years</label>
                                        </div>
                                    </div>

                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btnsize btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg "
                            type="button"
                            @if (isset($getMember) && $getMember !== null)
                                id="find_one_time_payment"
                            @else
                                data-bs-toggle="modal" data-bs-target="#one_time_payment"
                            @endif

                            >Find <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <div class="clearfix row mt-4"></div>
        <div class="row mt-4 mb-4"  id="money_lenders_list">

        </div>
    </div>

</div>
<div class="modal fade" id="one_time_payment" tabindex="-1" aria-labelledby="one_time_payment"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-custom">
                    <div class="modal-body p-5">
                        <div class="card">
                            <div class="container text-center">
                                <h2>Please Pay First!</h2>
                            </div>
                            <p class="text-center">To proceed further and find property lenders you need to pay one time fee.</p>
                            <div class="form-buttons text-center">
                                <a href="{{route('one_time_payment')}}" class="btn btnsize mt-40 btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg mx-2">Proceed To Payments <i class="fas fa-spinner fa-spin myspinner d-none"></i></a>
                                <button type="button" class="btn btnsize mt-40 btn-mobile-block  box-shadow-grey btn-secondary custom-padding-btn btn-lg mx-2" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection


@push('js')
    <script>
        $("#find_one_time_payment").click(function(event){
            event.preventDefault();
            var $button = $(this);
            $('#money_lenders_list').html('');

            $button.text("Finding...");

            var formData = $('#myform').serializeArray();
            var csrfToken = "{{ csrf_token() }}";

            $.ajax({
                type: "POST",
                url: "{{ route('lender_search') }}",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    $('#money_lenders_list').html(response);
                    $button.text('Find');
                },
                error: function(error) {
                    console.error("Error:", error);
                    $button.text('Find');
                }
            });
        });

    </script>
@endpush
