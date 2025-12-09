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
        <form action="{{route('admin.edit_user',[$member->id])}}" method="post" enctype="multipart/form-data">@csrf
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Name</label>
                        <input type="text" class="form-control" placeholder="Enter value here" value="{{$member->name}}" name="name">
                        @error('name')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Email</label>
                        <input type="text" class="form-control" disabled placeholder="Enter value here" value="{{$member->email}}" name="email">
                        @error('email')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Email for notification</label>
                        <input type="text" class="form-control" placeholder="Enter value here" value="{{$member->email_for_notification}}" name="email_for_notification">
                        @error('email_for_notification')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Phone</label>
                        <input type="text" class="form-control" placeholder="Enter value here" value="{{$member->phone}}" name="phone">
                        @error('phone')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Phone for notification</label>
                        <input type="text" class="form-control" placeholder="Enter value here" value="{{$member->phone_for_notification}}" name="phone_for_notification">
                        @error('phone_for_notification')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Company</label>
                        <input type="text" class="form-control" placeholder="Enter value here" value="{{$member->company}}" name="company">
                        @error('company')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fas fa-eye text-dark"></i></i> Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input text-dark" type="checkbox" id="flexSwitchCheckDefault" name="status" value="1" {{$member->status == 1 ? 'checked' : ''}}>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card" style="width: 18rem">
                                    @if ($member->image !== null)
                                        <img class="card-img-top" src="{{$member->image}}" alt="">
                                    @else
                                        <img class="card-img-top" src="{{asset('user/images/userprofile2.png')}}" alt="">
                                    @endif

                                  <div class="card-body">
                                    <h5 class="card-title">
                                      Account Type
                                    </h5>
                                    <p class="card-text">
                                        @if ($member->type == 1)
                                            Buyer
                                        @elseif ($member->type == 2)
                                            Seller
                                        @elseif ($member->type == 3 )
                                            Property Dealer
                                        @else
                                            Money Lender
                                        @endif
                                    </p>

                                    <h5 class="card-title">
                                        Profile Status
                                      </h5>
                                      <p class="card-text">
                                        @if ($member->profile_status == 0)
                                            Not completed
                                        @else
                                            Completed
                                        @endif
                                      </p>
                                  </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit"
                            class="btn btnsize btn-primary box-shadow-blue py-3 btn-lg px-4 px-xxl-5 mb-2">Submit </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @endsection
