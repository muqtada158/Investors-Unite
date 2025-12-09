@extends('members.dashboard.layouts.app')

@section('content')
@push('css')
    <style>
    .mycard {
        z-index: 0;
        position: relative;
        padding: 10px 10px 20px 10px;
        border: 1px solid #bfbfbf5e;
        box-shadow: 10px 10px 5px #aaaaaa;
    }
    .my-border-radius {
        border-radius: 5px;
        width: 100%;
        height: 200px;
    }
    thead, tbody, tfoot, tr, td, th {
        border-color: inherit;
        border-style: none;
        border-width: 0;
    }
    .card-footer {
        padding: 0.5rem 1rem;
        background-color: transparent;
        border-top: none;
    }
    .card-header {
        padding: 0.5rem 1rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, 0.03);
        border-bottom: none;
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

    /* .card-title, .card-text {
        text-align: center;
    } */

    .card-title {
        font-weight: 700;
    }

    .card-text {
        font-size: 15px;
        font-weight: 400;
    }
    .img-thumbnail {
        padding: 0.25rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 1.25rem;
        width: 220px;
        height: 220px;
    }
    </style>
@endpush
<div class="discriptionblock dashboard-container">
        <h2>My JV-Partner Requests ({{count($partners_requests)}})</h2>

    <hr class="mb-5">
    <a href="{{route('dashboard.my_jv_partner')}}" class=" mb-5 btn btn-sm btn-primary"> < Back To My JV-Partners</a>
    <div class="container">
        <div class="row">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                    <div class="row text-center">
                        <div class="col-md-4">Property Type <br><span class="text-secondary"> {{$partners_requests[0]->getProperty->property_type}} </span></div>
                        <div class="col-md-4">Complete Address <br><span class="text-secondary"> {{$partners_requests[0]->getProperty->complete_address}}</span></div>
                        <div class="col-md-4">My Price <br><span class="text-secondary"> $ {{$partners_requests[0]->getProperty->price}}</span></div>
                    </div>

                </h5>
              </div>
            </div>
        </div>
    </div>
    <hr class="mb-5">
    @foreach ($partners_requests as $partner)
    <div class="container mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-header">
                <div class="container text-center">
                    {{$partner->created_at->diffForHumans()}}
                </div>
            </div>
            <div class="card-text row align-items-center mt-3">
              <div class="col-md-4">
                <div class="profile-image text-center">
                    <img class="img-thumbnail" src="{{$partner->getMember->image}}" alt="">
                  </div>

              </div>
              <div class="col-md-8">
                <dl class="row align-items-left">
                    <dt class="col-sm-5">Name</dt>
                    <dd class="col-sm-5">{{$partner->getMember->name}}</dd>

                    <dt class="col-sm-5">Email</dt>
                    <dd class="col-sm-5">{{$partner->getMember->email}}</dd>

                    <dt class="col-sm-5">Contact</dt>
                    <dd class="col-sm-5">{{$partner->getMember->phone}}</dd>

                    <dt class="col-sm-5">Member Since</dt>
                    <dd class="col-sm-5">{{$partner->getMember->created_at->format('Y-m-d');}}</dd>
                  </dl>
              </div>
            </div>

            @if ($partner->status == 0)
            <hr>
                <div class="container text-center">
                    <a href="#" class="btn btn-secondary">Deny</a>
                    <a href="{{route('dashboard.accept_jv_request',[$partner->id])}}" class="btn btn-primary">Accept</a>
                </div>
            @endif

          </div>
        </div>
    </div>
    @endforeach





</div>

@endsection
