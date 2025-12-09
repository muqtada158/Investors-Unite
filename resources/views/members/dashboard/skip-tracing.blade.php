@extends('members.dashboard.layouts.app')

@section('content')
@push('css')
    <style>
        .text-theme {
            color: #4582c3 !important;
        }
    </style>
@endpush


<div class="discriptionblock dashboard-container">
    <h2>Skip Tracing</h2>
    <div class="mt-2">
        <a href="#" class="btn btnsize btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg ">
            <div class="d-flex align-items-center justify-content-center">
                <i class="me-2"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 9.5V5.5H11V9.5H15V11.5H11V15.5H9V11.5H5V9.5H9ZM10 20.5C4.477 20.5 0 16.023 0 10.5C0 4.977 4.477 0.5 10 0.5C15.523 0.5 20 4.977 20 10.5C20 16.023 15.523 20.5 10 20.5ZM10 18.5C12.1217 18.5 14.1566 17.6571 15.6569 16.1569C17.1571 14.6566 18 12.6217 18 10.5C18 8.37827 17.1571 6.34344 15.6569 4.84315C14.1566 3.34285 12.1217 2.5 10 2.5C7.87827 2.5 5.84344 3.34285 4.34315 4.84315C2.84285 6.34344 2 8.37827 2 10.5C2 12.6217 2.84285 14.6566 4.34315 16.1569C5.84344 17.6571 7.87827 18.5 10 18.5Z" fill="white"></path>
                    </svg>
                </i>
                Add skip tracing property
            </div>
        </a>
    </div>
    <hr class="mb-5">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="addresstext">
                <i class="me-2">
                    <svg width="14" height="17" viewBox="0 0 14 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 14.675L10.7125 10.9625C11.4467 10.2283 11.9466 9.29279 12.1492 8.27441C12.3517 7.25602 12.2477 6.20045 11.8503 5.24117C11.4529 4.28189 10.78 3.46198 9.91669 2.88513C9.05334 2.30827 8.03833 2.00038 7 2.00038C5.96167 2.00038 4.94666 2.30827 4.08332 2.88513C3.21997 3.46198 2.54706 4.28189 2.14969 5.24117C1.75231 6.20045 1.64831 7.25602 1.85084 8.27441C2.05337 9.29279 2.55333 10.2283 3.2875 10.9625L7 14.675ZM7 16.796L2.227 12.023C1.28301 11.079 0.64014 9.87626 0.379696 8.56689C0.119253 7.25752 0.25293 5.90032 0.763824 4.66693C1.27472 3.43353 2.13988 2.37933 3.24991 1.63764C4.35994 0.89594 5.66498 0.500061 7 0.500061C8.33502 0.500061 9.64006 0.89594 10.7501 1.63764C11.8601 2.37933 12.7253 3.43353 13.2362 4.66693C13.7471 5.90032 13.8808 7.25752 13.6203 8.56689C13.3599 9.87626 12.717 11.079 11.773 12.023L7 16.796ZM7 8.75C7.39783 8.75 7.77936 8.59197 8.06066 8.31066C8.34197 8.02936 8.5 7.64783 8.5 7.25C8.5 6.85218 8.34197 6.47065 8.06066 6.18934C7.77936 5.90804 7.39783 5.75 7 5.75C6.60218 5.75 6.22065 5.90804 5.93934 6.18934C5.65804 6.47065 5.5 6.85218 5.5 7.25C5.5 7.64783 5.65804 8.02936 5.93934 8.31066C6.22065 8.59197 6.60218 8.75 7 8.75ZM7 10.25C6.20435 10.25 5.44129 9.93393 4.87868 9.37132C4.31607 8.80871 4 8.04565 4 7.25C4 6.45435 4.31607 5.69129 4.87868 5.12868C5.44129 4.56607 6.20435 4.25 7 4.25C7.79565 4.25 8.55871 4.56607 9.12132 5.12868C9.68393 5.69129 10 6.45435 10 7.25C10 8.04565 9.68393 8.80871 9.12132 9.37132C8.55871 9.93393 7.79565 10.25 7 10.25Z"
                            fill="#27292D" />
                    </svg>
                </i>
                Search address
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class=" customdropdown" style=" position: relative; height:auto">
                <input type="text" value="" class="form-control form-control2" name="complete_address" placeholder="Search Address">
                @error('complete_address')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center">
            e.g. 3 State Road 1135, Williamston,nc, 23892 United States
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <h2 class="text-theme">State Road 2135, Williamston,nc, 23892 United States</h2>
            <div class="list-group">
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
                <a class="list-group-item list-group-item-action">Lorem : Ipsum is simply dummy text of the printing and typesetting industry</a>
            </div>
            <div class="mt-2">
                <a href="#" class="btn btnsize btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg ">
                    <div class="d-flex align-items-center justify-content-center"><i class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="20" height="21" ><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V288H216c-13.3 0-24 10.7-24 24s10.7 24 24 24H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM384 336V288H494.1l-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39H384zm0-208H256V0L384 128z"/></svg>
                            </i>
                            Export as CSV
                    </div>
                </a>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
