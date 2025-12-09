@extends('admin.layouts.app')

@section('content')
    <div class="discriptionblock dashboard-container">
        <h2>Faqs > edit</h2>
        <hr>
        <form action="{{route('admin.faqs_add_edit',[$faqs->id])}}" method="post" enctype="multipart/form-data">@csrf
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Question</label>
                        <input type="text" class="form-control" placeholder="Enter value here" name="question" value="{{$faqs->question}}">
                        @error('question')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-reply text-dark" aria-hidden="true"></i> Answer</label>
                        <textarea class="form-control" placeholder="Enter value here" name="answer" id="" cols="30" rows="10">{{$faqs->answer}}</textarea>
                        @error('answer')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fas fa-eye text-dark"></i></i> Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input text-dark" type="checkbox" id="flexSwitchCheckDefault" name="status" value="1" {{$faqs->status == 1 ? 'checked' : ''}}>
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
