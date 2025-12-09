@extends('members.layouts.app')
@push('css')
    <style>
        .step-container {
            position: relative;
            text-align: center;
            transform: translateY(-43%);
        }

        .step-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #fff;
            border: 2px solid #3f79bb;
            line-height: 30px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            cursor: pointer;
            /* Added cursor pointer */
        }

        .step-line {
            position: absolute;
            top: 16px;
            left: 50px;
            width: calc(100% - 100px);
            height: 2px;
            background-color: #3f79bb;
            z-index: -1;
        }

        #multi-step-form {
            overflow-x: hidden;
        }

        .progress-bar {
            background-color: #3f79bb !important;
        }
    </style>
@endpush
@section('content')
    <div class="main">
        <!-- SEARCH BAR START  -->

        <!-- SEARCH BAR END  -->
        <div class="row">
            <div class="col-md-12">
                <div class="border-top height-40"></div>
            </div>
        </div>


        <div class="row mt-0 m-0">
            @include('members.my-account.sidebar')

            <div class="profile-block-container profile-block-container-full-width ps-md-5 mob-padd">
                <div class="row mt-0">
                    <div class="col-md-8">
                        <div id="container" class="container mt-5">
                            <div class="progress px-1" style="height: 3px;">
                                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="step-container d-flex justify-content-between">
                                <div class="step-circle" onclick="displayStep(1)">1</div>
                                <div class="step-circle" onclick="displayStep(2)">2</div>
                                <div class="step-circle" onclick="displayStep(3)">3</div>
                            </div>

                            <form id="multi-step-form">
                                <div class="step step-1">
                                    <!-- Step 1 form fields here -->
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h4>Billing Details</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label text-uppercase">Billing Name</label>
                                            <input type="text" name="name" class="form-control" readonly disabled
                                                placeholder="Enter text here" value="{{ auth()->guard('member')->user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label text-uppercase">Billing Email</label>
                                            <input type="email" name="email" class="form-control" readonly disabled
                                                placeholder="Enter email here"
                                                value="{{ auth()->guard('member')->user()->email }}">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label text-uppercase">Billing Phone</label>
                                            <input type="text" name="billing_phone" class="form-control phone-number"
                                                placeholder="Enter billing phone here" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label text-uppercase">Billing Address line 1</label>
                                            <input type="text" name="billing_address_line1" class="form-control"
                                                placeholder="Enter billing address line 1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label text-uppercase">Billing address line 2</label>
                                            <input type="text" name="billing_address_line2" class="form-control"
                                                placeholder="Enter billing address line 2">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row gx-3">
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label text-uppercase">Billing Country</label>
                                                    <input type="text" name="billing_country" class="form-control"
                                                        placeholder="Billing Country" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label text-uppercase">Billing State</label>
                                                    <input type="text" name="billing_state" class="form-control"
                                                        placeholder="Billing State" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label text-uppercase">Billing City</label>
                                                    <input type="text" name="billing_city" class="form-control"
                                                        placeholder="Billing City" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label text-uppercase">Billing Postal code</label>
                                                    <input type="text" name="billing_postalcode" class="form-control"
                                                        placeholder="Billing Postal Code" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end mb-5">
                                        <button type="button" class="btn btn-primary next-step py-2 btn-lg px-4">Next</button>
                                    </div>
                                </div>

                                <div class="step step-2">
                                    <!-- Step 2 form fields here -->
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h4>Coupon</h4>
                                            {{-- <small style="font-size: small; font-weight: 600;">Free lifetime access to first 1000
                                                users. <br> USE (Free Lifetime Access) coupon.</small> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3">Coupon
                                            Code (Optional)</label>
                                        <input type="text" name="coupon" class="form-control"
                                            placeholder="Enter Coupon Code here" id="coupon_input">
                                    </div>
                                    <div class="text-end mb-5">
                                        <button type="button" class="btn btn-primary prev-step py-2 btn-lg px-4">Previous</button>
                                        <button type="button" class="btn btn-primary next-step py-2 btn-lg px-4">Next</button>
                                    </div>
                                </div>

                                <div class="step step-3">
                                    <!-- Step 3 form fields here -->
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h4>Card Details</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <input type="hidden" hidden id="package_id" name="package_id" value="{{$package->id}}">
                                        <input type="hidden" hidden id="coupon_id" name="coupon_id" value="">
                                        <div class="mb-4">
                                            <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3">Card
                                                details</label>
                                            <div class="card-input">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input type="text" name="card_number" id="card-number" placeholder="Card Number" maxlength="16" class="form-control card-number">
                                                        <div class="error-message text-danger small" id="card-number-error"></div> <!-- Error message for card number -->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" name="expiry_date" id="expiry-date" placeholder="MM/YY" class="form-control card-expiry-date">
                                                        <div class="error-message text-danger small" id="expiry-date-error"></div> <!-- Error message for expiry date -->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="password" name="cvc" id="cvc" placeholder="CVC" class="form-control card-cvc">
                                                        <div class="error-message text-danger small" id="cvc-error"></div> <!-- Error message for CVC -->
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end mb-5">
                                        <button type="button" class="btn btn-primary prev-step py-2 btn-lg px-4">Previous</button>
                                        <button type="submit" class="btn btn-success py-2 btn-lg px-4">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="black-card">
                                <div class="black-card-header">
                                    <h2>{{$package->title}}</h2>
                                    <ul>
                                        @foreach (json_decode($package->listing_details) as $listing)
                                            <li>
                                                <a href="#">{{$listing}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="blue-card-bg text-center">
                                    <b>$ <span id="package_price">{{$package->price}}</span> / <span id="package_duration">{{ucfirst($package->interval)}}</span></b>
                                </div>
                                <div class="mt-3 pb-3 text-center btn-section">

                                </div>

                            </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>

@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $("#card-number").mask('0000 0000 0000 0000');
        $("#expiry-date").mask('00/00');
        $("#cvc").mask("000")
    </script>

    <script>
        $(document).ready(function() {
            $('.mymodal').click(function() {
                var packageId = $(this).data('package-id');
                var packageName = $(this).data('package-name');
                var packagePrice = $(this).data('package-price');
                $('#package_id').val(packageId);
                $('#package-name').html(packageName);
                $('#package-price').html('$' + packagePrice);
            });
        });
    </script>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    // Stripe publishable key
    var stripePublishableKey = '{{ config("app.STRIPE_PUBLISHABLE_KEY") }}';

    // Initialize Stripe with your publishable key
    Stripe.setPublishableKey(stripePublishableKey);

    // Function to handle form submission
    function handleFormSubmission(e) {
        e.preventDefault(); // Prevent default form submission

        // Validate card details
        var cardNumber = $('#card-number').val();
        var cardExpiry = $('#expiry-date').val();
        var cardCvc = $('#cvc').val();
        var errors = false;

        // Perform client-side validation
        if (!Stripe.card.validateCardNumber(cardNumber)) {
            $('#card-number-error').text('Invalid card number');
            errors = true;
        } else {
            $('#card-number-error').text('');
        }

        if (!Stripe.card.validateExpiry(cardExpiry)) {
            $('#expiry-date-error').text('Invalid expiry date');
            errors = true;
        } else {
            $('#expiry-date-error').text('');
        }

        if (!Stripe.card.validateCVC(cardCvc)) {
            $('#cvc-error').text('Invalid CVC');
            errors = true;
        } else {
            $('#cvc-error').text('');
        }

        if (!errors) {
            // If all validations pass, create token and save billing details
            Stripe.card.createToken({
                number: cardNumber,
                cvc: cardCvc,
                exp: cardExpiry
            }, function(status, response) {
                if (response.error) {
                    // Error from Stripe
                    // Display error message or take appropriate action
                    // console.error(response.error);
                    Toast.fire({
                        icon: 'error',
                        title: response.error
                    });
                } else {
                    // Token successfully created
                    var token = response.id;
                    // Save billing details and send token to server
                    saveBillingDetails(token);
                }
            });
        }
    }

    // Function to save billing details using AJAX
    function saveBillingDetails(token) {
        var formData = $('#multi-step-form').serialize(); // Serialize form data
        formData += '&stripeToken=' + token; // Append Stripe token to form data
        $('#preloader').show();
        $.ajax({
            url: '{{route("store_subscription")}}', // Replace with your server-side endpoint
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                formData: formData
            },
            success: function(response) {
                if(response.status == true){
                    $('#preloader').hide();
                    Swal.fire({
                        title: "Thank you...",
                        text: response.message,
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '{{route("subscription")}}'; // Replace with your desired URL
                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                $('#preloader').hide();
                var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'An error occurred';
                Swal.fire({
                    title: "Error",
                    text: errorMessage,
                    icon: "error"
                });
            }
        });
    }

    // Event listener for form submission
        $('#multi-step-form').on('submit', handleFormSubmission);
    });

    </script>
<script>
    $(document).ready(function() {
        var currentStep = 1;
        var coupon_applied = 0;

        function updateProgressBar() {
            var progressPercentage = ((currentStep - 1) / 2) * 100;
            $(".progress-bar").css("width", progressPercentage + "%");
        }

        function moveToNextStep() {
            if (currentStep < 3) {
                $(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
                setTimeout(function() {
                    $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
                    currentStep++;
                    $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
                    updateProgressBar();
                }, 500);
            }
        }

        function moveToPreviousStep() {
            if (currentStep > 1) {
                $(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
                setTimeout(function() {
                    $(".step").removeClass("animate__animated animate__fadeOutRight").hide();
                    currentStep--;
                    $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
                    updateProgressBar();
                }, 500);
            }
        }

        $(".next-step").click(function() {
            var form = $('#multi-step-form')[0];
            if (form.checkValidity() === false) {
                form.reportValidity(); // This will show the validation errors
                return; // Prevent moving to the next step
            }

            if (currentStep === 2 && coupon_applied == 0) {
                $('#preloader').show();
                var coupon = $('#coupon_input').val();
                var package_price = {{$package->price}};
                $.ajax({
                    url: '{{route("validateCoupon")}}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        coupon: coupon
                    },
                    success: function(response) {
                        if (response.status) {
                            if(response.status == 'neutral'){
                                $('#preloader').hide();
                                moveToNextStep();
                            }
                            if(response.status == true){
                                $('#preloader').hide();
                                Toast.fire({
                                    icon: 'success',
                                    title: response.message + '\nDiscount: ' + response.coupon_discount_percent + '%'
                                });
                                $('#coupon_input').prop('disabled', true);
                                var discount_percent = response.coupon_discount_percent;
                                var discount_amount = (package_price * discount_percent) / 100;
                                var new_price = package_price - discount_amount;
                                $('#package_price').html(new_price);
                                $('#package_duration').html(response.duration.toUpperCase());
                                $('#coupon_id').val(response.coupon_id);
                                coupon_applied = 1;
                                moveToNextStep();
                            }
                        } else {
                            $('#preloader').hide();
                            Toast.fire({
                                icon: 'error',
                                title: response.message
                            });
                        }
                    },
                    error: function(response) {
                        $('#preloader').hide();
                        Toast.fire({
                            icon: 'error',
                            title: response.responseJSON.message
                        });
                    }
                });
            } else {
                moveToNextStep();
            }
        });

        $(".prev-step").click(function() {
            moveToPreviousStep();
        });

        // Initialize the form with only the first step visible
        $('#multi-step-form').find('.step').slice(1).hide();
        updateProgressBar();
    });
    </script>

    <script>

    </script>
@endpush
