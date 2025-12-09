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

    .heading-card {
        text-align: center;

    }

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
    .profile-image {
    text-align: center;
    }
    .mybuttonhere {
        text-align: center;
    }
    </style>
@endpush
<div class="discriptionblock dashboard-container">
        <h2>My Showings > View</h2>

    <hr class="mb-5">
    <a href="{{route('dashboard.listing_showing')}}" class=" mb-5 btn btn-sm btn-primary"> < Back To My Showings</a>
    <div class="container mb-4">
        <div class="row">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                    <div class="row heading-card">
                        <div class="col-md-4">Property Type <br><span class="text-secondary"> {{$showings->getProperty->property_type}} </span></div>
                        <div class="col-md-4">Complete Address <br><span class="text-secondary"> {{$showings->getProperty->complete_address}}</span></div>
                        <div class="col-md-4">My Price <br><span class="text-secondary"> $ {{$showings->getProperty->price}}</span></div>
                    </div>
                </h5>
              </div>
            </div>
        </div>
    </div>
    <div class="container mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-header">
                <div class="container text-center">
                    {{$showings->created_at->diffForHumans()}}
                </div>
            </div>
            <div class="card-text row align-items-center mt-3">
              <div class="col-md-4">
                <div class="profile-image">
                    <img class="img-thumbnail" src="{{$showings->getBuyer->image}}" alt="">
                  </div>

              </div>
              <div class="col-md-8">
                <dl class="row ">
                    <dt class="col-sm-5">Name</dt>
                    <dd class="col-sm-5">{{$showings->getBuyer->name}}</dd>

                    <dt class="col-sm-5">Email</dt>
                    <dd class="col-sm-5">{{$showings->getBuyer->email}}</dd>

                    <dt class="col-sm-5">Contact</dt>
                    <dd class="col-sm-5">{{$showings->getBuyer->phone}}</dd>

                    <dt class="col-sm-5">Member Since</dt>
                    <dd class="col-sm-5">{{$showings->getBuyer->created_at->format('m-d-Y');}}</dd>

                    <dt class="col-sm-5">Schedule Status</dt>
                    @if ($showings->status == 1)
                        <dd class="col-sm-5"><span class="badge rounded-pill bg-primary text-dark">Scheduled</span></dd>
                    @else
                        <dd class="col-sm-5"><span class="badge rounded-pill bg-secondary">Pending</span></dd>
                    @endif
                </dl>
              </div>
            </div>
                <div class="container">
                    <form action="{{route('dashboard.confirmShowingData',[$showings->id])}}" method="POST">@csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="date" id="date" name="date"
                                    style="max-width:100%" class="from_1 input-value"
                                    value="{{ $showings->date }}">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="time">Time:</label>
                                    <select name="time" id="time" class="from_1  input-value" style="max-width:100%" >
                                        <option selected disabled hidden>Please select time</option>
                                        <option value="8:00 am">8:00 am</option>
                                        <option value="8:30 am">8:30 am</option>
                                        <option value="9:00 am">9:00 am</option>
                                        <option value="9:30 am">9:30 am</option>
                                        <option value="10:00 am">10:00 am</option>
                                        <option value="10:30 am">10:30 am</option>
                                        <option value="11:00 am">11:00 am</option>
                                        <option value="11:30 am">11:30 am</option>
                                        <option value="12:00 pm">12:00 pm</option>
                                        <option value="12:30 pm">12:30 pm</option>
                                        <option value="1:00 pm">1:00 pm</option>
                                        <option value="1:30 pm">1:30 pm</option>
                                        <option value="2:00 pm">2:00 pm</option>
                                        <option value="2:30 pm">2:30 pm</option>
                                        <option value="3:00 pm">3:00 pm</option>
                                        <option value="3:30 pm">3:30 pm</option>
                                        <option value="4:00 pm">4:00 pm</option>
                                        <option value="4:30 pm">4:30 pm</option>
                                        <option value="5:00 pm">5:00 pm</option>
                                        <option value="5:30 pm">5:30 pm</option>
                                        <option value="6:00 pm">6:00 pm</option>
                                        <option value="6:30 pm">6:30 pm</option>
                                        <option value="7:00 pm">7:00 pm</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="container">
                            <div class="form-group text-center mt-4">
                                    <button class="btn btn-primary" type="submit"><i class="fa-regular fa fa-calendar"></i> Schedule Showing</button>
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
    <script>
        var mytime = '{{$showings->time}}' ;
        $("#time option[value='" + mytime + "']").prop("selected", true);
    </script>
@endpush
