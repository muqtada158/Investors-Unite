@extends('members.layouts.app')

@section('content')

<div class="main ">

    <div class="row">
        <div class="col-md-12">
            <div class="border-top height-40"></div>
        </div>
    </div>

    <div class="container">
        <div class="row ">
            <div class="col-xl-12 text-center">
                <div class="">
                    <h2>One Time Payment</h2>
                </div>
                <p>
                    Its only one time payment for reaching out to money lenders.
                    <br>
                    Once you pay this fee you will gain access to all of the money lenders in our website.
                    <br>
                    We have a large database of qualified lenders to assist you with all real state needs.
                </p>

                <div class="row text-center">
                    <div class="offset-md-3 col-md-6">
                        <div class="graybgbox">
                            <p>
                                <strong>
                                Access to all Money Lenders
                            <br>
                                Only one time fee
                            <br>
                                $ {{$oneTimePayment->one_time_payment}}
                                </strong>
                            </p>
                        </div>

                    </div>
                </div>

            </div>
            <div class="offset-md-2 col-xl-8">
                <div class="row mt-4 gx-lg-4 mb-5 mb-md-0">
                    <form id="payment-form">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3 text-dark"><i
                                        class="me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#3b89e7}</style><path d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z"/></svg>
                                        </i> Card Number <sup class="redcolor">*</sup></label>
                                        <div id="card-number" class="stripe-input form-control"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="text-uppercase mb-3 form-label text-dark"><i
                                            class="me-2"><svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#3b89e7}</style><path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z"/></svg>
                                        </i> Expiration Date <sup class="redcolor">*</sup></label>
                                        <div id="card-expiry" class="stripe-input form-control"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3 text-dark"><i
                                            class="me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#3b89e7}</style><path d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z"/></svg>
                                        </i>CVC <sup class="redcolor">*</sup></label>
                                        <div id="card-cvc" class="stripe-input form-control"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <button class="btn btnsize btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg " id="submit-button">
                                    <span id="button-text">Pay Now</span>
                                        <span id="button-loader" style="display:none;">
                                            <i class="fas fa-spinner fa-spin"></i> Processing...
                                        </span>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>




@endsection
@push('js')
<script src="https://js.stripe.com/v3/"></script>
<script>

</script>
<script>
 // Set your Stripe public key
const stripe = Stripe('{{config('app.STRIPE_PUBLISHABLE_KEY')}}');
const elements = stripe.elements();

// Create an instance of the card Element.
const cardNumber = elements.create('cardNumber');
const cardExpiry = elements.create('cardExpiry');
const cardCvc = elements.create('cardCvc');

// Add an instance of the card Element into the `card-number` div.
cardNumber.mount('#card-number');

// Add an instance of the card Element into the `card-expiry` div.
cardExpiry.mount('#card-expiry');

// Add an instance of the card Element into the `card-cvc` div.
cardCvc.mount('#card-cvc');

// Handle form submission
const form = document.getElementById('payment-form');
form.addEventListener('submit', async (event) => {
    event.preventDefault();

    const submitButton = document.getElementById('submit-button');
    const buttonText = document.getElementById('button-text');
    const buttonLoader = document.getElementById('button-loader');

    // Show loader
    buttonText.style.display = 'none';
    buttonLoader.style.display = 'inline-block';

    const { token, error } = await stripe.createToken(cardNumber);

    if (error) {
        Toast.fire({
            icon: 'error',
            title: error.message
        });

        // Hide loader and show button text
        buttonText.style.display = 'inline-block';
        buttonLoader.style.display = 'none';
    } else {
        const hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        const formData = new FormData(form);
        $.ajax({
            type: 'POST',
            url: '{{ route("process_one_time_payment_ajax") }}',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    title: "Payment Successful!",
                    text: "Your one-time payment has been received successfully.",
                    icon: "success"
                }).then((result) => {
                        window.location.href = '{{ route("find_funding_today") }}';
                });
            },
            error: function(error) {
                Toast.fire({
                    icon: 'error',
                    title: error
                });
            },
            complete: function() {
                // Hide loader and show button text
                buttonText.style.display = 'inline-block';
                buttonLoader.style.display = 'none';
            }
        });
    }
});

</script>

@endpush
