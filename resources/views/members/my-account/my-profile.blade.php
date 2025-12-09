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


        <div class="row mt-4 m-0">

            @include('members.my-account.sidebar')

            <div class="profile-block-container ps-md-5">
                <form action="{{ route('my_profile_edit') }}" method="POST" enctype="multipart/form-data"> @CSRF
                    <div class="row">
                        <div class="col-md-12">
                            <div class="avatar-upload">
                                <div class="avatar-edit">

                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image"
                                        onchange="loadFile(this)" />
                                    @error('image')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="imageUpload"><i class="me-2"><svg width="20" height="18"
                                                viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2 16H18V9H20V17C20 17.2652 19.8946 17.5196 19.7071 17.7071C19.5196 17.8946 19.2652 18 19 18H1C0.734784 18 0.48043 17.8946 0.292893 17.7071C0.105357 17.5196 0 17.2652 0 17V9H2V16ZM11 6V13H9V6H4L10 0L16 6H11Z"
                                                    fill="#3B89E7" />
                                            </svg>
                                        </i> Upload</label>
                                </div>
                                <div class="avatar-preview">
                                    @if ($member->image !== null)
                                        <div id="imagePreview" style="background-image: url('{{ $member->image }}');">
                                        @else
                                            <div id="imagePreview"
                                                style="background-image: url('{{ asset('user/images/userprofile2.png') }}');">
                                    @endif
                                    {{-- <div id="imagePreview" > --}}
                                </div>
                            </div>
                        </div>
                    </div>


                    <script>
                        // Image preview function
                        var loadFile = function(aug) {
                            var reader = new FileReader();
                            reader.onload = function(event) {
                                var imagePreviewDiv = document.getElementById("imagePreview");
                                imagePreviewDiv.style.backgroundImage = "url('" + event.target.result + "')";
                            };
                            if (aug.files && aug.files[0]) {
                                reader.readAsDataURL(aug.files[0]);
                            }
                        };
                    </script>




                    <div class="col-md-12 mb-5 mb-md-0">
                        <div class="row mt-5 gx-lg-5 mb-5 mb-md-0">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i
                                            class="me-2"><svg width="12" height="17" viewBox="0 0 12 17"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 16.5H10.5V15C10.5 14.4033 10.2629 13.831 9.84099 13.409C9.41903 12.9871 8.84674 12.75 8.25 12.75H3.75C3.15326 12.75 2.58097 12.9871 2.15901 13.409C1.73705 13.831 1.5 14.4033 1.5 15V16.5H0V15C0 14.0054 0.395088 13.0516 1.09835 12.3483C1.80161 11.6451 2.75544 11.25 3.75 11.25H8.25C9.24456 11.25 10.1984 11.6451 10.9017 12.3483C11.6049 13.0516 12 14.0054 12 15V16.5ZM6 9.75C5.40905 9.75 4.82389 9.6336 4.27792 9.40746C3.73196 9.18131 3.23588 8.84984 2.81802 8.43198C2.40016 8.01412 2.06869 7.51804 1.84254 6.97208C1.6164 6.42611 1.5 5.84095 1.5 5.25C1.5 4.65905 1.6164 4.07389 1.84254 3.52792C2.06869 2.98196 2.40016 2.48588 2.81802 2.06802C3.23588 1.65016 3.73196 1.31869 4.27792 1.09254C4.82389 0.866396 5.40905 0.75 6 0.75C7.19347 0.75 8.33807 1.22411 9.18198 2.06802C10.0259 2.91193 10.5 4.05653 10.5 5.25C10.5 6.44347 10.0259 7.58807 9.18198 8.43198C8.33807 9.27589 7.19347 9.75 6 9.75ZM6 8.25C6.79565 8.25 7.55871 7.93393 8.12132 7.37132C8.68393 6.80871 9 6.04565 9 5.25C9 4.45435 8.68393 3.69129 8.12132 3.12868C7.55871 2.56607 6.79565 2.25 6 2.25C5.20435 2.25 4.44129 2.56607 3.87868 3.12868C3.31607 3.69129 3 4.45435 3 5.25C3 6.04565 3.31607 6.80871 3.87868 7.37132C4.44129 7.93393 5.20435 8.25 6 8.25Z"
                                                    fill="#3B89E7" />
                                            </svg>
                                        </i> Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $member->name ?? old('name') }}" placeholder="Enter text here">
                                    @error('name')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="text-uppercase mb-3 form-label"><i
                                            class="me-2"><svg width="18" height="14" viewBox="0 0 18 14"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15.75 12.25H17.25V13.75H0.75V12.25H2.25V1C2.25 0.801088 2.32902 0.610322 2.46967 0.46967C2.61032 0.329018 2.80109 0.25 3 0.25H10.5C10.6989 0.25 10.8897 0.329018 11.0303 0.46967C11.171 0.610322 11.25 0.801088 11.25 1V12.25H14.25V6.25H12.75V4.75H15C15.1989 4.75 15.3897 4.82902 15.5303 4.96967C15.671 5.11032 15.75 5.30109 15.75 5.5V12.25ZM3.75 1.75V12.25H9.75V1.75H3.75ZM5.25 6.25H8.25V7.75H5.25V6.25ZM5.25 3.25H8.25V4.75H5.25V3.25Z"
                                                    fill="#3B89E7" />
                                            </svg>


                                        </i> Company name</label>
                                    <input type="text" name="company" class="form-control"
                                        value="{{ $member->company ?? old('company') }}" placeholder="Enter text here">
                                    @error('company')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="text-uppercase mb-3 form-label"><i
                                            class="me-2"><svg width="16" height="14" viewBox="0 0 16 14"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.25 0.25H14.75C14.9489 0.25 15.1397 0.329018 15.2803 0.46967C15.421 0.610322 15.5 0.801088 15.5 1V13C15.5 13.1989 15.421 13.3897 15.2803 13.5303C15.1397 13.671 14.9489 13.75 14.75 13.75H1.25C1.05109 13.75 0.860322 13.671 0.71967 13.5303C0.579018 13.3897 0.5 13.1989 0.5 13V1C0.5 0.801088 0.579018 0.610322 0.71967 0.46967C0.860322 0.329018 1.05109 0.25 1.25 0.25ZM14 3.4285L8.054 8.7535L2 3.412V12.25H14V3.4285ZM2.38325 1.75L8.04575 6.7465L13.6265 1.75H2.38325Z"
                                                    fill="#3B89E7" />
                                            </svg>

                                        </i> Email</label>
                                    <input type="email" readonly name="email" class="form-control"
                                        value="{{ $member->email }}" placeholder="Enter text here">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="text-uppercase mb-3 form-label"><i
                                            class="me-2"><svg width="16" height="14" viewBox="0 0 16 14"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.25 0.25H14.75C14.9489 0.25 15.1397 0.329018 15.2803 0.46967C15.421 0.610322 15.5 0.801088 15.5 1V13C15.5 13.1989 15.421 13.3897 15.2803 13.5303C15.1397 13.671 14.9489 13.75 14.75 13.75H1.25C1.05109 13.75 0.860322 13.671 0.71967 13.5303C0.579018 13.3897 0.5 13.1989 0.5 13V1C0.5 0.801088 0.579018 0.610322 0.71967 0.46967C0.860322 0.329018 1.05109 0.25 1.25 0.25ZM14 3.4285L8.054 8.7535L2 3.412V12.25H14V3.4285ZM2.38325 1.75L8.04575 6.7465L13.6265 1.75H2.38325Z"
                                                    fill="#3B89E7" />
                                            </svg>

                                        </i> Email For Notification</label>
                                    <input type="email" name="email_for_notification" class="form-control"
                                        value="{{ $member->email_for_notification ?? old('email_for_notification') }}"
                                        placeholder="Enter text here">
                                    @error('email_for_notification')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="text-uppercase mb-3 form-label"><i
                                            class="me-2">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.0245 6.0115C5.72825 7.24786 6.75214 8.27175 7.9885 8.9755L8.6515 8.047C8.75812 7.8977 8.91576 7.79266 9.0946 7.75175C9.27344 7.71084 9.46108 7.7369 9.622 7.825C10.6827 8.40469 11.8542 8.75333 13.0592 8.848C13.2473 8.8629 13.4229 8.94815 13.5509 9.08674C13.6789 9.22533 13.75 9.40708 13.75 9.59575V12.9423C13.75 13.1279 13.6812 13.3071 13.5568 13.4449C13.4324 13.5828 13.2612 13.6696 13.0765 13.6885C12.679 13.7297 12.2785 13.75 11.875 13.75C5.455 13.75 0.25 8.545 0.25 2.125C0.25 1.7215 0.27025 1.321 0.3115 0.9235C0.330441 0.738773 0.417238 0.567641 0.555092 0.443225C0.692946 0.31881 0.872055 0.24996 1.05775 0.25H4.40425C4.59292 0.249976 4.77467 0.321064 4.91326 0.449088C5.05185 0.577112 5.13709 0.752668 5.152 0.94075C5.24667 2.14584 5.59531 3.31726 6.175 4.378C6.2631 4.53892 6.28916 4.72656 6.24825 4.9054C6.20734 5.08424 6.1023 5.24188 5.953 5.3485L5.0245 6.0115ZM3.133 5.51875L4.558 4.501C4.15359 3.62807 3.87651 2.70163 3.73525 1.75H1.7575C1.753 1.8745 1.75075 1.99975 1.75075 2.125C1.75 7.717 6.283 12.25 11.875 12.25C12.0002 12.25 12.1255 12.2478 12.25 12.2425V10.2648C11.2984 10.1235 10.3719 9.84641 9.499 9.442L8.48125 10.867C8.0715 10.7078 7.6735 10.5198 7.29025 10.3045L7.24675 10.2797C5.77568 9.44254 4.55746 8.22432 3.72025 6.75325L3.6955 6.70975C3.48018 6.3265 3.29221 5.9285 3.133 5.51875Z"
                                                    fill="#3B89E7" />
                                            </svg>

                                        </i>Phone</label>
                                    <input type="tel" name="phone" class="form-control phone-number"
                                        value="{{ $member->phone ?? old('phone') }}" placeholder="Enter text here">
                                    @error('phone')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="text-uppercase mb-3 form-label"><i
                                            class="me-2">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.0245 6.0115C5.72825 7.24786 6.75214 8.27175 7.9885 8.9755L8.6515 8.047C8.75812 7.8977 8.91576 7.79266 9.0946 7.75175C9.27344 7.71084 9.46108 7.7369 9.622 7.825C10.6827 8.40469 11.8542 8.75333 13.0592 8.848C13.2473 8.8629 13.4229 8.94815 13.5509 9.08674C13.6789 9.22533 13.75 9.40708 13.75 9.59575V12.9423C13.75 13.1279 13.6812 13.3071 13.5568 13.4449C13.4324 13.5828 13.2612 13.6696 13.0765 13.6885C12.679 13.7297 12.2785 13.75 11.875 13.75C5.455 13.75 0.25 8.545 0.25 2.125C0.25 1.7215 0.27025 1.321 0.3115 0.9235C0.330441 0.738773 0.417238 0.567641 0.555092 0.443225C0.692946 0.31881 0.872055 0.24996 1.05775 0.25H4.40425C4.59292 0.249976 4.77467 0.321064 4.91326 0.449088C5.05185 0.577112 5.13709 0.752668 5.152 0.94075C5.24667 2.14584 5.59531 3.31726 6.175 4.378C6.2631 4.53892 6.28916 4.72656 6.24825 4.9054C6.20734 5.08424 6.1023 5.24188 5.953 5.3485L5.0245 6.0115ZM3.133 5.51875L4.558 4.501C4.15359 3.62807 3.87651 2.70163 3.73525 1.75H1.7575C1.753 1.8745 1.75075 1.99975 1.75075 2.125C1.75 7.717 6.283 12.25 11.875 12.25C12.0002 12.25 12.1255 12.2478 12.25 12.2425V10.2648C11.2984 10.1235 10.3719 9.84641 9.499 9.442L8.48125 10.867C8.0715 10.7078 7.6735 10.5198 7.29025 10.3045L7.24675 10.2797C5.77568 9.44254 4.55746 8.22432 3.72025 6.75325L3.6955 6.70975C3.48018 6.3265 3.29221 5.9285 3.133 5.51875Z"
                                                    fill="#3B89E7" />
                                            </svg>

                                        </i>Phone For Notification</label>
                                    <input type="tel" name="phone_for_notification" class="form-control phone-number"
                                        value="{{ $member->phone_for_notification ?? old('phone_for_notification') }}"
                                        placeholder="Enter text here">
                                    @error('phone')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr class="mt-3 mb-3">
                            <small>Note : If you dont want to update password leave it blank.</small>
                            <div class="col-lg-12 mt-4">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="text-uppercase mb-3 form-label"><i
                                            class="me-2">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#3B89E7"  d="M13.6667 8.99988L12 11.9999M12 11.9999L10.3333 8.99988M12 11.9999H9.5M12 11.9999H14.5M12 11.9999L10.3333 14.9999M12 11.9999L13.6667 14.9999M6.16667 8.99994L4.5 11.9999M4.5 11.9999L2.83333 8.99994M4.5 11.9999H2M4.5 11.9999H7M4.5 11.9999L2.83333 14.9999M4.5 11.9999L6.16667 14.9999M21.1667 8.99994L19.5 11.9999M19.5 11.9999L17.8333 8.99994M19.5 11.9999H17M19.5 11.9999H22M19.5 11.9999L17.8333 14.9999M19.5 11.9999L21.1667 14.9999" stroke="#3B89E7" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>


                                        </i>Current Password</label>
                                    <input type="password" name="current_password" class="form-control"
                                        placeholder="Enter text here">
                                    @error('current_password')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="text-uppercase mb-3 form-label"><i
                                            class="me-2">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#3B89E7"  d="M13.6667 8.99988L12 11.9999M12 11.9999L10.3333 8.99988M12 11.9999H9.5M12 11.9999H14.5M12 11.9999L10.3333 14.9999M12 11.9999L13.6667 14.9999M6.16667 8.99994L4.5 11.9999M4.5 11.9999L2.83333 8.99994M4.5 11.9999H2M4.5 11.9999H7M4.5 11.9999L2.83333 14.9999M4.5 11.9999L6.16667 14.9999M21.1667 8.99994L19.5 11.9999M19.5 11.9999L17.8333 8.99994M19.5 11.9999H17M19.5 11.9999H22M19.5 11.9999L17.8333 14.9999M19.5 11.9999L21.1667 14.9999" stroke="#3B89E7" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>


                                        </i>New Password</label>
                                    <input type="password" name="new_password" class="form-control"
                                        placeholder="Enter text here">
                                    @error('new_password')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="text-uppercase mb-3 form-label"><i
                                            class="me-2">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#3B89E7"  d="M13.6667 8.99988L12 11.9999M12 11.9999L10.3333 8.99988M12 11.9999H9.5M12 11.9999H14.5M12 11.9999L10.3333 14.9999M12 11.9999L13.6667 14.9999M6.16667 8.99994L4.5 11.9999M4.5 11.9999L2.83333 8.99994M4.5 11.9999H2M4.5 11.9999H7M4.5 11.9999L2.83333 14.9999M4.5 11.9999L6.16667 14.9999M21.1667 8.99994L19.5 11.9999M19.5 11.9999L17.8333 8.99994M19.5 11.9999H17M19.5 11.9999H22M19.5 11.9999L17.8333 14.9999M19.5 11.9999L21.1667 14.9999" stroke="#3B89E7" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>

                                        </i>Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Enter text here">
                                    @error('password_confirmation')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="nav-footer-seaction">
                            <div class="row gx-2 gx-md-3 mt-md-1 mb-md-1 mt-1 mb-1 ">
                                <div class="text-center">
                                    <button class="btn btn-primary  py-md-3 py-3 btn-lg px-md-5 px-5 box-shadow-blue"
                                        type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>

    </div>
@endsection
