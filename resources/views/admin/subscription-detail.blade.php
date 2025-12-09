@extends('admin.layouts.app')


@push('css')
<style>
    img.user-image {
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(30, 30, 30, 0.1);
    }

    .card-img-top {
        padding: 4%;
        border-radius: 20px;
    }

    .card-title, .card-text {
        text-align: center;
    }

    .card-title {
        font-weight: 700;
    }

    .card-text {
        font-size: 15px;
        font-weight: 400;
    }
</style>
@endpush

@section('content')

    <div class="discriptionblock dashboard-container">
        <h2>Users > View</h2>
        <hr>
        {{-- <form action="{{route('admin.edit_user',[$subscription->id])}}" method="post" enctype="multipart/form-data">@csrf --}}
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Billing Name</label>
                        <input type="text" class="form-control" disabled placeholder="Enter value here" value="{{$subscription->billing_name}}" name="name">
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Billing Email</label>
                        <input type="text" class="form-control" disabled placeholder="Enter value here" value="{{$subscription->billing_email}}" name="email">
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Billing Address</label>
                        <textarea class="form-control" disabled name="billing_address" id="" cols="30" rows="10">{{$subscription->billing_address}}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Billing State</label>
                        <input type="text" class="form-control" disabled placeholder="Enter value here" value="{{$subscription->billing_state}}" name="email">
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Billing City</label>
                        <input type="text" class="form-control" disabled placeholder="Enter value here" value="{{$subscription->billing_city}}" name="email">
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Billing Zipcode</label>
                        <input type="text" class="form-control" disabled placeholder="Enter value here" value="{{$subscription->billing_zipcode}}" name="email">
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fas fa-eye text-dark"></i></i> Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input text-dark" type="checkbox" id="flexSwitchCheckDefault" name="status" value="1" {{$subscription->status == 1 ? 'checked' : ''}}>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card" style="width: 18rem">
                                  <div class="card-body text-center">
                                    <h5 class="card-title">
                                      Package Details
                                    </h5>
                                    <strong class="card-text ">
                                       {{$subscription->getPackages->title}}  (${{$subscription->getPackages->price}})
                                    </strong>
                                    <hr>
                                    <h5 class="card-title">
                                        Package Start Date
                                      </h5>
                                      <strong class="card-text ">
                                         {{$subscription->subscription_start_date}}
                                      </strong>
                                    <hr>
                                    <h5 class="card-title">
                                        Package Expiry Date
                                      </h5>
                                      <strong class="card-text ">
                                         {{$subscription->subscription_expire_date}}
                                      </strong>
                                  </div>
                                </div>

                            </div>
                        </div>
                    </div>
                {{-- </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit"
                            class="btn btnsize btn-primary box-shadow-blue py-3 btn-lg px-4 px-xxl-5 mb-2">Submit </button>
                    </div>
                </div> --}}
            </div>
        {{-- </form> --}}
    </div>

    @endsection
