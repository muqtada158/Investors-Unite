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
    .increase-line{
        line-height: 30px;
    }
    </style>
@endpush
<div class="discriptionblock dashboard-container">
        <h2>Buy Now Deal Detail ({{count($offers)}})</h2>

    <hr class="mb-5">
    <a href="{{route('dashboard.offers_recevied')}}" class=" mb-5 btn btn-sm btn-primary"> < Back To Offers Received</a>
    <div class="container">
        <div class="row">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                    <div class="row text-center">
                        <div class="col-md-4">Property Type <br><span class="text-secondary"> {{$offers[0]->getProperty->property_type}} </span></div>
                        <div class="col-md-4">Complete Address <br><span class="text-secondary"> {{$offers[0]->getProperty->complete_address}}</span></div>
                        <div class="col-md-4">My Price <br><span class="text-secondary"> $ {{$offers[0]->getProperty->price}}</span></div>
                    </div>

                </h5>
              </div>
            </div>
        </div>
    </div>
    <hr class="mb-5">
        @foreach ($offers as $offer)
        {{-- <div class="row mt-3">
            <div class="card mycard mb-3 offset-md-4  col-md-4 mb-4">
                <div class="row g-0">
                <div class="col-md-12">
                    <div class="card-header">
                        <p class="card-text text-center"><strong class="text-muted">{{$offer->created_at->diffForHumans()}}</strong></p>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <img src="{{$offer->getMember->image}}" class="img-fluid img-thumbnail" alt="...">
                        </div>

                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{$offer->getMember->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$offer->getMember->email}}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{$offer->getMember->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Company</td>
                                    <td>{{$offer->getMember->company}}</td>
                                </tr>
                                <tr>
                                    <td>Offered Price</td>
                                    <td>$ {{$offer->offer_price}}</td>
                                </tr>
                                <tr>
                                    <td>Earnest Deposit</td>
                                    <td>$ {{$offer->earnest_deposit}}</td>
                                </tr>
                                <tr>
                                    <td>Proof Of Funds</td>
                                    <td>
                                        @foreach ($offer->getOffersDocument as $docs)
                                            <a href="{{asset($docs->document)}}" target="__blank" class="btn btn-primary btn-sm"><i class="fa fa-file" aria-hidden="true"></i></a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Closing Date</td>
                                    <td>{{$offer->closing_date}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{route('dashboard.accept_offer',[$offer->id])}}" class="btn btn-success">Accept <i class="fa fa-check" aria-hidden="true"></i></a>
                    </div>
                </div>
                </div>
            </div>
        </div> --}}

        <div class="container mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                    <div class="container text-center">
                        {{$offer->created_at->diffForHumans()}}
                    </div>
                </div>
                <div class="card-text row align-items-center mt-3">
                  <div class="col-md-4">
                    <div class="profile-image text-center">
                        <img class="img-thumbnail" src="{{$offer->getMember->image}}" alt="">
                      </div>

                  </div>
                  <div class="col-md-4">
                    <dl class="row increase-line">
                        <dt class="col-sm-5">Name</dt>
                        <dd class="col-sm-5">{{$offer->getMember->name}}</dd>

                        <dt class="col-sm-5">Email</dt>
                        <dd class="col-sm-5">{{$offer->getMember->email}}</dd>

                        <dt class="col-sm-5">Contact</dt>
                        <dd class="col-sm-5">{{$offer->getMember->phone}}</dd>

                        <dt class="col-sm-5">Member Since</dt>
                        <dd class="col-sm-5">{{$offer->getMember->created_at->format('Y-m-d');}}</dd>
                      </dl>
                  </div>
                  <div class="col-md-4">
                    <dl class="row align-items-left">
                        <dt class="col-sm-5">Offered Price</dt>
                        <dd class="col-sm-5">$ {{$offer->offer_price}}</dd>

                        <dt class="col-sm-5">Earnest Deposit</dt>
                        <dd class="col-sm-5">$ {{$offer->earnest_deposit}}</dd>

                        <dt class="col-sm-5">Proof Of Funds</dt>

                            <dd class="col-sm-5">
                                @foreach ($offer->getOffersDocument as $docs)
                                    <a href="{{asset($docs->document)}}" target="__blank" class="btn btn-primary btn-sm"><i class="fa fa-file" aria-hidden="true"></i></a>
                                @endforeach
                            </dd>


                        <dt class="col-sm-5">Closing Date</dt>
                        <dd class="col-sm-5">{{$offer->closing_date}}</dd>
                      </dl>
                  </div>
                </div>

                <hr>
                    <div class="container text-center">
                        <a href="#" class="btn btn-danger">Deny</a>
                        <a href="{{route('dashboard.accept_offer',[$offer->id])}}" class="btn btn-success">Accept ($ {{$offer->offer_price}})</a>
                    </div>

              </div>
            </div>
        </div>
        @endforeach
        {{ $offers->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection
