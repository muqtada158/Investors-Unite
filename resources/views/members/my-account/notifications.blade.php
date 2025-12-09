@extends('members.layouts.app')

@section('content')

<style>
    .onesignal-customlink-container {
        min-height: 1em;
    }
    .bottommenu{
        display: none;
    }
</style>
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

            <div class="profile-block-container profile-block-container-full-width ps-md-5 mob-padd">
                <div class="row mt-0">
                    <div class="col-md-12">
                        <div class="row">
                                <p>Do you want to subscribe to INVESTOR UNITE notifications?
                                    {{-- <a class="btn btn-primary  py-md-3 py-3 btn-lg px-md-5 px-5 box-shadow-blue" onclick="subscribe_to_notification()">Yes</a> --}}
                                    <div class='onesignal-customlink-container'></div>
                                </p>

                        </div>
                        <div class="table-responsive">
                            <table class="table custom-table no-padd">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th scope="col">Notifications</th>
                                        <th scope="col">Email</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        {{-- @dd($getPermissions->notify_offer_received) --}}
                                        <td>Deal Posted</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input notify" {{$getPermissions !== null && $getPermissions->notify_deal_posted == 1 ? 'checked' : '' }} name="notify_deal_posted" type="checkbox" role="switch" onchange="validate_member('notify_deal_posted')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" {{$getPermissions !== null && $getPermissions->email_deal_posted == 1 ? 'checked' : '' }} name="email_deal_posted"  type="checkbox" role="switch" onchange="validate_member_email('email_deal_posted')">
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Offer Received</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input notify" {{$getPermissions !== null && $getPermissions->notify_offer_received == 1 ? 'checked' : '' }} name="notify_offer_received"  type="checkbox" role="switch" onchange="validate_member('notify_offer_received')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" {{$getPermissions !== null && $getPermissions->email_offer_received == 1 ? 'checked' : '' }} name="email_offer_received"  type="checkbox" role="switch" onchange="validate_member_email('email_offer_received')">
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Buy Now</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input notify" {{$getPermissions !== null && $getPermissions->notify_buy_now == 1 ? 'checked' : '' }} name="notify_buy_now"  type="checkbox" role="switch" onchange="validate_member('notify_buy_now')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" {{$getPermissions !== null && $getPermissions->email_buy_now == 1 ? 'checked' : '' }} name="email_buy_now"  type="checkbox" role="switch" onchange="validate_member_email('email_buy_now')">
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>JV Partner Request</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input notify" {{$getPermissions !== null && $getPermissions->notify_jv_partner == 1 ? 'checked' : '' }} name="notify_jv_partner"  type="checkbox" role="switch" onchange="validate_member('notify_jv_partner')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" {{$getPermissions !== null && $getPermissions->email_jv_partner == 1 ? 'checked' : '' }} name="email_jv_partner"  type="checkbox" role="switch" onchange="validate_member_email('email_jv_partner')">
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>House Tour Request</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input notify" {{$getPermissions !== null && $getPermissions->notify_house_tour == 1 ? 'checked' : '' }} name="notify_house_tour"  type="checkbox" role="switch" onchange="validate_member('notify_house_tour')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" {{$getPermissions !== null && $getPermissions->email_house_tour == 1 ? 'checked' : '' }} name="email_house_tour"  type="checkbox" role="switch" onchange="validate_member_email('email_house_tour')">
                                            </div>
                                        </td>

                                    </tr>
                                    {{-- <tr>
                                        <td>Price Reduction</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input notify" {{$getPermissions !== null && $getPermissions->notify_price_reduction == 1 ? 'checked' : '' }} name="notify_price_reduction"  type="checkbox" role="switch" onchange="validate_member('notify_price_reduction')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" {{$getPermissions !== null && $getPermissions->email_price_reduction == 1 ? 'checked' : '' }} name="email_price_reduction"  type="checkbox" role="switch" onchange="validate_member_email('email_price_reduction')">
                                            </div>
                                        </td>

                                    </tr>


                                    <tr>
                                        <td>Financing Approved</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input notify" {{$getPermissions !== null && $getPermissions->notify_financing == 1 ? 'checked' : '' }} name="notify_financing"  type="checkbox" role="switch" onchange="validate_member('notify_financing')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" {{$getPermissions !== null && $getPermissions->email_financing == 1 ? 'checked' : '' }} name="email_financing"  type="checkbox" role="switch" onchange="validate_member_email('email_financing')">
                                            </div>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>Closing Date coming up</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input notify" {{$getPermissions !== null && $getPermissions->notify_closing_date == 1 ? 'checked' : '' }} name="notify_closing_date"  type="checkbox" role="switch" onchange="validate_member('notify_closing_date')">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" {{$getPermissions !== null && $getPermissions->email_closing_date == 1 ? 'checked' : '' }} name="email_closing_date"  type="checkbox" role="switch" onchange="validate_member_email('email_closing_date')">
                                            </div>
                                        </td>

                                    </tr> --}}

                                    <tr>
                                        <td>Direct Message</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input notify" {{$getPermissions !== null && $getPermissions->notify_direct_message == 1 ? 'checked' : '' }} name="notify_direct_message"  type="checkbox" role="switch" onchange="validate_member('notify_direct_message')">
                                            </div>
                                        </td>
                                        {{-- <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" {{$getPermissions !== null && $getPermissions->email_direct_message == 1 ? 'checked' : '' }} name="email_direct_message"  type="checkbox" role="switch" onchange="validate_member_email('email_direct_message')">
                                            </div>
                                        </td> --}}

                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>

    </div>
@endsection
@push('js')

<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" defer></script>
<script>
    // $(document).ready(function() {
    //     @if(isset($getPermissions) && $getPermissions->status == 0)
    //         $('.notify').attr('disabled', true);
    //     @endif
    // });
</script>
<script>
    function update_permission(myKey,myValue)
    {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": '{{ csrf_token() }}'
            },
            url: "{{route('store_permission')}}",
            type: "POST",
            dataType: 'json',
            data: {
                'myKey' : myKey,
                'myValue' : myValue
            },
            success: function(response)
            {
                Toast.fire({
                    icon: 'success',
                    title: 'Notification Updated'
                })
            },
            error: function(error)
            {
                Toast.fire({
                    icon: 'error',
                    title: error
                })
            }
        });
    }

    function validate_member(myKey)
    {
        let myValue = $('input:checkbox[name="'+myKey+'"]').prop('checked') ? 1 : 0;
        $.ajax({
            url: "{{route('validate_member')}}",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(response) {
                if(response.status == 2)
                {
                    // subscribe_to_notification();
                    update_permission(myKey,myValue);
                }
                else if(response.status == 0)
                {
                    // subscribe_to_notification();
                    update_permission(myKey,myValue);
                }
                else
                {
                    update_permission(myKey,myValue)
                }
            }
        });
    }

    function validate_member_email(myKey)
    {
        let myValue = $('input:checkbox[name="'+myKey+'"]').prop('checked') ? 1 : 0;
        update_permission(myKey,myValue)
    }
</script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
        appId: "{{config('app.APPID')}}",
        safari_web_id: "{{config('app.SAFARI_WEB_ID')}}",
        notifyButton: {
            // enable: true,
        },
        promptOptions: {
            customlink: {
                enabled: true, /* Required to use the Custom Link */
                style: "button", /* Has value of 'button' or 'link' */
                size: "medium", /* One of 'small', 'medium', or 'large' */
                color: {
                button: '#3B89E7', /* Color of the button background if style = "button" */
                text: '#FFFFFF', /* Color of the prompt's text */
                },
                text: {
                subscribe: "Subscribe to notifications", /* Prompt's text when not subscribed */
                unsubscribe: "Unsubscribe from notifications", /* Prompt's text when subscribed */
                },
                unsubscribeEnabled: true, /* Controls whether the prompt is visible after subscription */
            }
        }
    });
    let externalUserId = '{{auth()->guard('member')->user()->id}}'; // You will supply the external user id to the OneSignal SDK
    OneSignal.setExternalUserId(externalUserId);

    OneSignal.on('subscriptionChange', function (isSubscribed) {
        if (isSubscribed) {
          var userId = OneSignal.getUserId();
        //   console.log('User ID (player_id):', userId);
            Toast.fire({
                    icon: 'success',
                    title: 'Subscribed Successfully'
                })
          // You can use the userId to identify the subscribed user
        } else {
          console.log('User is not subscribed to push notifications.');
            Toast.fire({
                    icon: 'success',
                    title: 'Unsubscribed Successfully'
                })
        }
      });
  });



</script>

@endpush
