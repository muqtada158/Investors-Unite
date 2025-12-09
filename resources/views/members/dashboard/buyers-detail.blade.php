@extends('members.dashboard.layouts.app')


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
        <h2>Buyers > View</h2>
        <hr>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Name</label>
                        <input type="text" class="form-control" placeholder="Enter value here" value="{{$member->name}}" name="name">

                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Email</label>
                        <input type="text" class="form-control" disabled placeholder="Enter value here" value="{{$member->email}}" name="email">

                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Email for notification</label>
                        <input type="text" class="form-control" placeholder="Enter value here" value="{{$member->email_for_notification}}" name="email_for_notification">

                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Phone</label>
                        <input type="text" class="form-control" placeholder="Enter value here" value="{{$member->phone}}" name="phone">

                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Phone for notification</label>
                        <input type="text" class="form-control" placeholder="Enter value here" value="{{$member->phone_for_notification}}" name="phone_for_notification">

                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Company</label>
                        <input type="text" class="form-control" placeholder="Enter value here" value="{{$member->company}}" name="company">

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
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    @endsection
