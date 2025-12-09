@extends('admin.layouts.app')

@section('content')

    <div class="discriptionblock dashboard-container">
        <h2>Contact-Us > Detail</h2>
        <hr>
        <form action="#" method="post" enctype="multipart/form-data">@csrf
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Name</label>
                        <input type="text" class="form-control" placeholder="Enter value here" value="{{$contact->name}}" name="name" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Email</label>
                        <input type="text" class="form-control" disabled placeholder="Enter value here" value="{{$contact->email}}" name="email" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Phone</label>
                        <input type="text" class="form-control" placeholder="Enter value here" value="{{$contact->phone}}" name="phone" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Message</label>
                        <textarea name="message" class="form-control"  id="" cols="30" rows="10" readonly>{{$contact->message}}</textarea>
                    </div>
                    {{-- <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fas fa-eye text-dark"></i></i> Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input text-dark" type="checkbox" id="flexSwitchCheckDefault" name="status" value="1" {{$contact->status == 1 ? 'checked' : ''}}>
                        </div>
                    </div> --}}
                </div>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btnsize btn-primary box-shadow-blue py-3 btn-lg px-4 px-xxl-5 mb-2">Submit </button>
                    </div>
                </div> --}}
            </div>
        </form>
    </div>

    @endsection
