@extends('members.layouts.app')

@push('css')
    <style>
        .w-100 {
            width: 100% !important;
            height: 150px;
        }

    </style>
@endpush
@section('content')

<div class="main">
    <!-- SEARCH BAR START  -->

    <!-- SEARCH BAR END  -->
    <div class="row">
      <div class="col-md-12">
        <div class="border-top height-40"></div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="discriptionblock">
          <h2 class="mb-4 pb-1">My Saved Deals</h2>
        </div>
      </div>
      <div class="col-auto">

      </div>
    </div>


    <div class="row gx-3">
        @forelse ($saved_deals as $deals)
            <div class="col-lg-6 mb-3">
                <div class="customcard">
                    <div class="row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <div class="card-image">
                                <img class="w-100" src="{{asset($deals->getProperty->getImages[0]->image)}}" alt="">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="card-content">
                                <div class="mb-2">Deal saved on: <strong>{{ $deals->created_at->format('d-m-Y') }} </strong></div>
                                <div class="mb-2">Address: <strong>{{$deals->getProperty->complete_address}}</strong></div>
                                <div class="mb-2">Listing Agent: <strong>{{$deals->getProperty->getMember->name}}</strong></div>
                                <div class="mb-2">Company Name: <strong>{{$deals->getProperty->getMember->company}}</strong></div>
                                <div class="mb-2">Price: <strong class="usecomma">{{$deals->getProperty->price}}</strong></div>
                                <div class="row gx-2 mt-3 ">
                                    <div class="col-auto">
                                        <a href="{{route('direct-message')}}" class="btn btnsize btn-primary py-3 btn-lg px-3 px-xxl-3 mb-2"><i
                                                class="me-2">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0.602515 6.30833C0.177515 6.13749 0.182515 5.88333 0.630848 5.73416L16.5358 0.432493C16.9767 0.285826 17.2292 0.532493 17.1058 0.96416L12.5608 16.8692C12.4358 17.31 12.165 17.33 11.9633 16.9275L8.16668 9.33332L0.602515 6.30833ZM4.67752 6.14166L9.37418 8.02082L11.9075 13.0892L14.8625 2.74749L4.67668 6.14166H4.67752Z"
                                                        fill="white" />
                                                </svg>

                                            </i>Direct Message </a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{route('property_detail',[$deals->getProperty->id])}}" class="btn btnsize btn-secondary py-3 btn-lg px-3 px-xxl-3"><i
                                                class="me-2"><svg width="18" height="17" viewBox="0 0 18 17"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.00008 16.8333C4.39758 16.8333 0.666748 13.1025 0.666748 8.49999C0.666748 3.89749 4.39758 0.166656 9.00008 0.166656C13.6026 0.166656 17.3334 3.89749 17.3334 8.49999C17.3334 13.1025 13.6026 16.8333 9.00008 16.8333ZM9.00008 15.1667C10.7682 15.1667 12.4639 14.4643 13.7141 13.214C14.9644 11.9638 15.6667 10.2681 15.6667 8.49999C15.6667 6.73188 14.9644 5.03619 13.7141 3.78594C12.4639 2.5357 10.7682 1.83332 9.00008 1.83332C7.23197 1.83332 5.53628 2.5357 4.28604 3.78594C3.03579 5.03619 2.33341 6.73188 2.33341 8.49999C2.33341 10.2681 3.03579 11.9638 4.28604 13.214C5.53628 14.4643 7.23197 15.1667 9.00008 15.1667ZM8.16675 4.33332H9.83341V5.99999H8.16675V4.33332ZM8.16675 7.66666H9.83341V12.6667H8.16675V7.66666Z"
                                                        fill="#27292D" />
                                                </svg>
                                            </i>Listing Details </a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{route('saved_deals_remove',[$deals->getProperty->id])}}" class="btn btnsize btn-secondary py-3 btn-lg px-3 px-xxl-3"><i
                                                class="me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" fill="#27292D"  viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                            </i>Remove This Deal </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        <div class="col-lg-6 mb-3">
            <div class="customcard">
                <div class="row">
                    <div class="col-sm-auto mb-3 mb-sm-0">
                        <div class="card-image">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-content">
                            <p>You have made no saved deals...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforelse
        {{ $saved_deals->links('pagination::bootstrap-5') }}
    </div>




  </div>

@endsection
