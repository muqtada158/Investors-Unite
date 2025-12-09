@extends('members.layouts.app')

@section('content')

<div class="main">
    <!-- SEARCH BAR START  -->

    <!-- SEARCH BAR END  -->
    <div class="row">
      <div class="col-md-12">
        <div class="border-top height-40"></div>
      </div>
    </div>


    <div class="row mt-0 m-0">

        @include('members.my-account.sidebar')

      <div class="profile-block-container profile-block-container-full-width ps-md-5 mob-padd">
        <div class="row">
          <div class="col-md-12">
            <div class="discriptionblock">
              <h2 class="mb-4 pb-1">Subscription</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md">
            <div class="mb-3">👉 Your current subscription is <strong>UNITE PLUS.</strong></div>
          </div>
          <div class="col-md-auto mt-3 mt-md-0"><a href="#"
              class="btn btn-danger custom-padding-btn w-mobile-100">Cancel Subscription</a></div>
        </div>
        <div class="row mt-4">
          <div class="col-md-6">
            <div class="graybgbox">
              <div class="row gx-2">
                <div class="col-auto">
                  <img src="{{asset('user/images/visa-img.png')}}" alt="">
                </div>
                <div class="col pl-mobile-10">
                  Visa Card ending with <strong>2233</strong>
                </div>
                <div class="col-auto">
                  <a href="#" class="iconlink mx-2">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M12.728 6.68601L11.314 5.27201L2 14.586V16H3.414L12.728 6.68601ZM14.142 5.27201L15.556 3.85801L14.142 2.44401L12.728 3.85801L14.142 5.27201ZM4.242 18H0V13.757L13.435 0.322007C13.6225 0.134536 13.8768 0.0292206 14.142 0.0292206C14.4072 0.0292206 14.6615 0.134536 14.849 0.322007L17.678 3.15101C17.8655 3.33853 17.9708 3.59284 17.9708 3.85801C17.9708 4.12317 17.8655 4.37748 17.678 4.56501L4.242 18Z"
                        fill="#3B89E7" />
                    </svg>
                  </a>
                  <a href="#" class="iconlink">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M15 4H20V6H18V19C18 19.2652 17.8946 19.5196 17.7071 19.7071C17.5196 19.8946 17.2652 20 17 20H3C2.73478 20 2.48043 19.8946 2.29289 19.7071C2.10536 19.5196 2 19.2652 2 19V6H0V4H5V1C5 0.734784 5.10536 0.48043 5.29289 0.292893C5.48043 0.105357 5.73478 0 6 0H14C14.2652 0 14.5196 0.105357 14.7071 0.292893C14.8946 0.48043 15 0.734784 15 1V4ZM16 6H4V18H16V6ZM7 9H9V15H7V9ZM11 9H13V15H11V9ZM7 2V4H13V2H7Z"
                        fill="#EA333E" />
                    </svg>

                  </a>
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-6">
            <div class="graybgbox">
              <div class="row gx-2">
                <div class="col-auto ">
                  <img src="{{asset('user/images/mastercard.png')}}" alt="">
                </div>
                <div class="col pl-mobile-10">
                  Visa Card ending with <strong>2233</strong>
                </div>
                <div class="col-auto">
                  <a href="#" class="iconlink mx-2">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M12.728 6.68601L11.314 5.27201L2 14.586V16H3.414L12.728 6.68601ZM14.142 5.27201L15.556 3.85801L14.142 2.44401L12.728 3.85801L14.142 5.27201ZM4.242 18H0V13.757L13.435 0.322007C13.6225 0.134536 13.8768 0.0292206 14.142 0.0292206C14.4072 0.0292206 14.6615 0.134536 14.849 0.322007L17.678 3.15101C17.8655 3.33853 17.9708 3.59284 17.9708 3.85801C17.9708 4.12317 17.8655 4.37748 17.678 4.56501L4.242 18Z"
                        fill="#3B89E7" />
                    </svg>
                  </a>
                  <a href="#" class="iconlink">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M15 4H20V6H18V19C18 19.2652 17.8946 19.5196 17.7071 19.7071C17.5196 19.8946 17.2652 20 17 20H3C2.73478 20 2.48043 19.8946 2.29289 19.7071C2.10536 19.5196 2 19.2652 2 19V6H0V4H5V1C5 0.734784 5.10536 0.48043 5.29289 0.292893C5.48043 0.105357 5.73478 0 6 0H14C14.2652 0 14.5196 0.105357 14.7071 0.292893C14.8946 0.48043 15 0.734784 15 1V4ZM16 6H4V18H16V6ZM7 9H9V15H7V9ZM11 9H13V15H11V9ZM7 2V4H13V2H7Z"
                        fill="#EA333E" />
                    </svg>

                  </a>
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-6 mt-4">
            <a href="#" class="btn btn-light w-100 custom-padding-btn"><i><img src="{{asset('user/images/plus.png')}}" alt=""></i> Add
              Card</a>
          </div>
        </div>
        <div class="row gx-2 gx-md-3 mt-md-5 mb-md-5 mt-5 mb-2 ">
          <div class="col-auto text-end">
            <a href="#" class="btn btn-primary  py-md-3 py-3 btn-lg px-md-5 px-5 box-shadow-blue">Save</a>
          </div>
          <div class="col-auto text-start">
            <a href="#" class="btn btn-secondary py-md-3 py-3 btn-lg px-md-5 px-5 ">Cancel</a>
          </div>
        </div>
      </div>

    </div>

  </div>

@endsection
