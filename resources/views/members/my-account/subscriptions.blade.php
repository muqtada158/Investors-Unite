@extends('members.layouts.app')

@push('css')
<style>
    .my-font {
        font-size: 15px;
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
                    <div class="col-md-12">
                        @if (isset($active_package) AND $active_package->status == 1)
                            <div class="discriptionblock">
                                <h2 class="mb-4 pb-1">Subscription</h2>
                                <p>
                                    You have subscribed the package <strong>({{$active_package->getPackages->title}})</strong>
                                    {{-- it will expires on <strong>{{ \Carbon\Carbon::parse($active_package->subscription_expire_date)->format('m/d/Y') }}</strong>. --}}
                                </p>
                                <a href="{{ route('cancelSubscription') }}" onclick="toggle_preloader()" class="btn btnsize btn-mobile-block btn-danger custom-padding-btn btn-lg"><strong>Cancel Subscription</strong></a>

                            </div>
                        @else
                            <div class="discriptionblock">
                                <h2 class="mb-4 pb-1">Subscription</h2>
                                <p>
                                    If you have no intentions of ever listing a property on our platform and only want to lend
                                    or purchase properties than there is no need to subscribe!
                                </p>
                            </div>
                        @endif

                            <div class="row gx-0 mt-5 mb-5 pb-3">
                                @foreach ($packages as $key=> $package)

                                    <div class="col-md-5">
                                        <div class="black-card">
                                            <div class="black-card-header">
                                                @if ($key == 0)
                                                <div class="carttile">Recommended</div>
                                                @endif
                                                <h2>{{$package->title}}</h2>

                                                <ul>
                                                    @foreach (json_decode($package->listing_details) as $listing)
                                                        <li>
                                                            <a href="#">{{$listing}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                            <div class="blue-card-bg">
                                                Access These Features on <b>$ {{$package->price}} / {{ucfirst($package->interval)}}</b>
                                            </div>
                                            @if (isset($active_package) AND $active_package->package_id == $package->id AND $active_package->status == 1)
                                                <div class="mt-5 pb-5 text-center btn-section">
                                                    <a href="#" class="btn btnsize btn-success box-shadow-blue py-3 btn-lg px-4 px-xxl-5 mb-2 d-block mymodal" >Subscribed</a>
                                                </div>
                                            @else
                                                <div class="mt-5 pb-5 text-center btn-section">
                                                    {{-- <a href="#"
                                                        class="btn btnsize btn-primary box-shadow-blue py-3 btn-lg px-4 px-xxl-5 mb-2 d-block mymodal"
                                                        data-bs-toggle="modal" data-package-price="{{$package->price}}"  data-package-id="{{$package->id}}" data-package-name="{{$package->title}}" data-bs-target="#exampleModal">Buy Subscription</a> --}}
                                                    <a href="{{route('subscriptionForm',[$package->id])}}" onclick="toggle_preloader()" class="btn btnsize btn-primary box-shadow-blue py-3 btn-lg px-4 px-xxl-5 mb-2 d-block mymodal">Buy Subscription</a>
                                                </div>
                                            @endif

                                        </div>

                                    </div>

                                @endforeach
                            </div>


                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>

@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                $('#package-price').html('$'+packagePrice);
            });
        });
    </script>

@endpush
