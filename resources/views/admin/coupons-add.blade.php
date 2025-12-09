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
        <h2>Add Coupon</h2>
        <hr>
        <form action="{{route('admin.coupons_store')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="row mt-4">
                <div class="col-lg-6">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Name</label>
                        <input type="text" class="form-control"  value="" name="name" placeholder="Enter Coupon Name">
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Percent Off</label>
                        <input type="text" class="form-control"  value="" name="percent_off" placeholder="Enter Discount In Percent">
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Duration</label>
                        <select name="duration" id="" class="form-control" >
                            <option selected hidden disabled>Please select coupon duration</option>
                            <option value="forever">Forever</option>
                            <option value="once">Once</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Limit</label>
                        <input type="number" class="form-control"  value="" name="limit" placeholder="Enter Limit">
                    </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btnsize btn-primary box-shadow-blue py-3 btn-lg px-4 px-xxl-5 mb-2">
                            Submit
                        </button>
                    </div>
                </div>
                </div>

            </div>
        </form>
    </div>

    @endsection
