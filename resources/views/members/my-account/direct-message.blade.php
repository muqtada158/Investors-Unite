@extends('members.layouts.app')

@section('content')

<div class="main">
    <!-- SEARCH BAR START  -->

    <!-- SEARCH BAR END  -->
    <div class="row">
      <div class="col-md-12">
        <div class="border-top height-40 h-0"></div>
      </div>
    </div>


    <div class="row mt-md-0 mx-0">

        @include('members.my-account.sidebar')

      <div class="direct-message">
        <ul>
          <li><a href="#" class="active">Tim Smith</a></li>
          <li><a href="#">John </a></li>
          <li><a href="#">Tim Smith <span>04</span></a></li>
          <li><a href="#">Tim Smith</a></li>
          <li><a href="#">Tim Smith</a></li>
          <li><a href="#">Tim Smith</a></li>
          <li><a href="#">Tim Smith</a></li>
          <li><a href="#">Tim Smith</a></li>

        </ul>
      </div>

      <div class="chat-maincontainer">

        <div class="card-custom-profile">
          <div class="btnblock-back">
            <a href="#" class="backbtn d-md-none"><i class="me-1"><svg width="8" height="14" viewBox="0 0 8 14"
                  fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M2.82832 6.99999L7.77832 11.95L6.36432 13.364L0.000320156 6.99999L6.36432 0.635986L7.77832 2.04999L2.82832 6.99999Z"
                    fill="#27292D" />
                </svg>
              </i> Back</a>
          </div>
          <div class="chatblock">
            <div class="chat-section">
              <div class="chat-left">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s.
              </div>
              <div class="chat-right">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s.
              </div>
              <div class="chat-left">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s.
              </div>
              <div class="chat-right">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s.
              </div>
              <div class="chat-left">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s.
              </div>
              <div class="chat-right">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s.
              </div>
            </div>
            <div class="chat-input-type">
              <input type="text" class="chatinput" placeholder="Enter text here...">
              <input type="button" class="btn-black" value="Send">
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

@endsection
