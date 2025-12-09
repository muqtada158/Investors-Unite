<header>
    <div class="row">
        <div class="col d-flex align-items-center">
            <a href="#" class="mobileicon burger">
                <div class="strip burger-strip">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </a>
            <ul class="custom-nav mobilenav">
                <li>
                    <a href="{{route('index')}}">Home</a>
                </li>
                @if (auth()->guard('member')->check())

                    @if (auth()->guard('member')->user()->type === 3)
                        <li>
                            <a href="{{ route('my_offers') }}">My Offers</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.saved_deals') }}">Saved Deals</a>
                        </li>
                        <li>
                            <a href="{{route('dashboard.inventory')}}">Inventory</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('my_offers') }}">My Offers</a>
                        </li>
                        <li>
                            <a href="{{ route('saved_deals') }}">Saved Deals</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('inventory') }}">Inventory</a>
                        </li> --}}
                    @endif

                <li class="d-block d-xl-none">
                    <a href="#">About us</a>
                </li>
                <li class="d-block d-xl-none">
                    <a href="{{ route('contact_us') }}">Contact us</a>
                </li>
                @endif

            </ul>
        </div>
        <div class="col-auto text-center">
            <a href="{{ route('index') }}"> <img src="{{ asset('user/images/logo.png') }}" class="customlogo"
                    alt="" /></a>
        </div>
        <div class="col d-flex align-items-center justify-content-end">
            <ul class="custom-nav">
                <li class="d-none d-xl-block">
                    <a href="{{route('find_funding_today')}}">Find Funding</a>
                </li>
                <li class="d-none d-xl-block">
                    <a href="#">About us</a>
                </li>
                <li class="d-none d-xl-block">
                    <a href="{{ route('contact_us') }}">Contact us</a>
                </li>

                <li class="dotnone">
                    <div class="dropdown">
                        <div class="custom-dropdown" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="userimg">
                                {{-- @if (auth()->guard('member')->check() == true AND $member->image !== null)
                                    <img src="{{ asset(auth()->guard('member')->user()->image) }}" alt="" />
                                @else
                                    <img src="{{ asset('user/images/userprofile2.png') }}" alt="" />
                                @endif --}}
                                <img src="{{ isset(auth()->guard('member')->user()->image) == null ? asset('user/images/userprofile2.png') : auth()->guard('member')->user()->image}}" alt="" />
                            </div>
                            <div class="usertext">My Account</div>
                            <div class="arrowdown">
                                <img src="{{ asset('user/images/down-arrow.png') }}" style="width: 14px;"
                                    alt="" />
                            </div>
                        </div>
                        <ul class="dropdown-menu filter-dropdown-open w-255 custom-dropdown-menu"
                            aria-labelledby="dropdownMenuLink2">

                            @if (auth()->guard('member')->check() === true)

                            @if (auth()->guard('member')->user()->type == 3)
                                <li>
                                    <a class="dropdown-item {{request()->route()->getName() === 'dashboard.dashboard' ? 'active' : ''}}" href="{{route('dashboard.dashboard')}}"><i class="me-2" style="width:20px; display: inline-block;">
                                        <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.75 13.75H1.25C1.05109 13.75 0.860322 13.671 0.71967 13.5303C0.579018 13.3897 0.5 13.1989 0.5 13V7.36525C0.499988 7.25808 0.522943 7.15216 0.567318 7.05461C0.611693 6.95706 0.676458 6.87016 0.75725 6.79975L3.5 4.408V1C3.5 0.801088 3.57902 0.610322 3.71967 0.46967C3.86032 0.329018 4.05109 0.25 4.25 0.25H14.75C14.9489 0.25 15.1397 0.329018 15.2803 0.46967C15.421 0.610322 15.5 0.801088 15.5 1V13C15.5 13.1989 15.421 13.3897 15.2803 13.5303C15.1397 13.671 14.9489 13.75 14.75 13.75ZM5.75 12.25H8V7.7065L5 5.0905L2 7.7065V12.25H4.25V9.25H5.75V12.25ZM9.5 12.25H14V1.75H5V3.34525C5.1755 3.34525 5.35175 3.40675 5.49275 3.5305L9.24275 6.79975C9.32354 6.87016 9.38831 6.95706 9.43268 7.05461C9.47706 7.15216 9.50001 7.25808 9.5 7.36525V12.25ZM11 6.25H12.5V7.75H11V6.25ZM11 9.25H12.5V10.75H11V9.25ZM11 3.25H12.5V4.75H11V3.25ZM8 3.25H9.5V4.75H8V3.25Z"
                                            fill="#9CA3AB" ></path>
                                        </svg>
                                    </i>Dashboard</a>
                                </li>
                            @endif

                            <li><a class="dropdown-item {{request()->route()->getName() === 'my_profile' ? 'active' : ''}}" href="{{route('my_profile')}}"><i class="me-2"
                                        style="width:20px; display: inline-block;">
                                        <svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 16.5H10.5V15C10.5 14.4033 10.2629 13.831 9.84099 13.409C9.41903 12.9871 8.84674 12.75 8.25 12.75H3.75C3.15326 12.75 2.58097 12.9871 2.15901 13.409C1.73705 13.831 1.5 14.4033 1.5 15V16.5H0V15C0 14.0054 0.395088 13.0516 1.09835 12.3483C1.80161 11.6451 2.75544 11.25 3.75 11.25H8.25C9.24456 11.25 10.1984 11.6451 10.9017 12.3483C11.6049 13.0516 12 14.0054 12 15V16.5ZM6 9.75C5.40905 9.75 4.82389 9.6336 4.27792 9.40746C3.73196 9.18131 3.23588 8.84984 2.81802 8.43198C2.40016 8.01412 2.06869 7.51804 1.84254 6.97208C1.6164 6.42611 1.5 5.84095 1.5 5.25C1.5 4.65905 1.6164 4.07389 1.84254 3.52792C2.06869 2.98196 2.40016 2.48588 2.81802 2.06802C3.23588 1.65016 3.73196 1.31869 4.27792 1.09254C4.82389 0.866396 5.40905 0.75 6 0.75C7.19347 0.75 8.33807 1.22411 9.18198 2.06802C10.0259 2.91193 10.5 4.05653 10.5 5.25C10.5 6.44347 10.0259 7.58807 9.18198 8.43198C8.33807 9.27589 7.19347 9.75 6 9.75ZM6 8.25C6.79565 8.25 7.55871 7.93393 8.12132 7.37132C8.68393 6.80871 9 6.04565 9 5.25C9 4.45435 8.68393 3.69129 8.12132 3.12868C7.55871 2.56607 6.79565 2.25 6 2.25C5.20435 2.25 4.44129 2.56607 3.87868 3.12868C3.31607 3.69129 3 4.45435 3 5.25C3 6.04565 3.31607 6.80871 3.87868 7.37132C4.44129 7.93393 5.20435 8.25 6 8.25Z"
                                                fill="#9CA3AB" />
                                        </svg>

                                    </i>My profile</a></li>
                            @if (auth()->guard('member')->user()->type == 4)
                            <li>
                                <a class="dropdown-item {{request()->route()->getName() === 'lender_details' ? 'active' : ''}}" href="{{route('lender_details')}}">
                                    <i class="me-2" style="width:20px; display: inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="15" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#9ca3ab" d="M312 24V34.5c6.4 1.2 12.6 2.7 18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8V232c0 13.3-10.7 24-24 24s-24-10.7-24-24V220.6c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2V24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5H192 32c-17.7 0-32-14.3-32-32V416c0-17.7 14.3-32 32-32H68.8l44.9-36c22.7-18.2 50.9-28 80-28H272h16 64c17.7 0 32 14.3 32 32s-14.3 32-32 32H288 272c-8.8 0-16 7.2-16 16s7.2 16 16 16H392.6l119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384l0 0-.9 0c.3 0 .6 0 .9 0z"/></svg>
                                    </i> Lender's Details
                                </a>
                            </li>
                            @endif

                            @if (auth()->guard('member')->user()->type == 4)
                                <li>
                                    <a class="dropdown-item {{request()->route()->getName() === 'lender_notebook' ? 'active' : ''}}" href="{{route('lender_notebook')}}">
                                        <i class="me-2" style="width:20px; display: inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="15" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#9ca3ab" d="M280 64h40c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64h40 9.6C121 27.5 153.3 0 192 0s71 27.5 78.4 64H280zM64 112c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320c8.8 0 16-7.2 16-16V128c0-8.8-7.2-16-16-16H304v24c0 13.3-10.7 24-24 24H192 104c-13.3 0-24-10.7-24-24V112H64zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg>
                                            </i> Lender's Notebook
                                    </a>
                                </li>
                            @endif

                            <li>
                                <a class="dropdown-item {{request()->route()->getName() === 'direct-message' ? 'active' : ''}}" href="{{route('direct-message')}}"><i class="me-2"
                                        style="width:20px; display: inline-block">
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.32225 10.75H14V1.75H2V11.7887L3.32225 10.75ZM3.84125 12.25L0.5 14.875V1C0.5 0.801088 0.579018 0.610322 0.71967 0.46967C0.860322 0.329018 1.05109 0.25 1.25 0.25H14.75C14.9489 0.25 15.1397 0.329018 15.2803 0.46967C15.421 0.610322 15.5 0.801088 15.5 1V11.5C15.5 11.6989 15.421 11.8897 15.2803 12.0303C15.1397 12.171 14.9489 12.25 14.75 12.25H3.84125Z"
                                                fill="#9CA3AB" />
                                        </svg>


                                    </i>Direct messages</a>
                            </li>
                            @if (auth()->guard('member')->user()->type !== 4)
                            <li>
                                <a class="dropdown-item {{request()->route()->getName() === 'subscription' ? 'active' : ''}}" href="{{route('subscription')}}">
                                    <i class="me-2" style="width:20px; display: inline-block">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7 0H11V18H7V0ZM16 3H18V15H16V3ZM2 3H0V15H2V3Z" fill="#9CA3AB" />
                                        </svg>

                                    </i>Subscriptions
                                </a>
                            </li>
                            @endif
                            @if (auth()->guard('member')->user()->type == 3)
                                <li>
                                    <a class="dropdown-item {{request()->route()->getName() === 'notifications' ? 'active' : ''}}" href="{{route('notifications')}}">
                                        <i class="me-2" style="width:20px; display: inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#9ca3ab" d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112v25.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V208c0-61.9 50.1-112 112-112zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z"/></svg>
                                        </i> Notifications
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item {{request()->route()->getName() === 'support' ? 'active' : ''}}" href="{{route('support')}}">
                                    <i class="me-2" style="width:20px; display: inline-block">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 0.5C12.1422 0.5 15.5 3.85775 15.5 8C15.5 12.1422 12.1422 15.5 8 15.5C3.85775 15.5 0.5 12.1422 0.5 8C0.5 3.85775 3.85775 0.5 8 0.5ZM8 11.75C7.53082 11.7505 7.06572 11.6627 6.629 11.4912L4.952 13.169C5.87499 13.7146 6.92782 14.0016 8 14C9.07217 14.0016 10.125 13.7146 11.048 13.169L9.371 11.4912C8.93427 11.6627 8.46918 11.7505 8 11.75ZM2 8C2 9.113 2.303 10.1547 2.831 11.048L4.50875 9.371C4.33727 8.93427 4.2495 8.46918 4.25 8C4.25 7.51625 4.3415 7.05425 4.50875 6.629L2.831 4.952C2.28542 5.87499 1.99838 6.92782 2 8ZM13.169 4.952L11.4912 6.629C11.6585 7.05425 11.75 7.51625 11.75 8C11.75 8.48375 11.6585 8.94575 11.4912 9.371L13.169 11.048C13.7146 10.125 14.0016 9.07217 14 8C14.0016 6.92782 13.7146 5.87499 13.169 4.952ZM8 5.75C7.40326 5.75 6.83097 5.98705 6.40901 6.40901C5.98705 6.83097 5.75 7.40326 5.75 8C5.75 8.59674 5.98705 9.16903 6.40901 9.59099C6.83097 10.0129 7.40326 10.25 8 10.25C8.59674 10.25 9.16903 10.0129 9.59099 9.59099C10.0129 9.16903 10.25 8.59674 10.25 8C10.25 7.40326 10.0129 6.83097 9.59099 6.40901C9.16903 5.98705 8.59674 5.75 8 5.75ZM8 2C6.92782 1.99838 5.87499 2.28542 4.952 2.831L6.629 4.50875C7.06572 4.33727 7.53082 4.2495 8 4.25C8.48375 4.25 8.94575 4.3415 9.371 4.50875L11.048 2.831C10.125 2.28542 9.07217 1.99838 8 2Z"
                                                fill="#9CA3AB" />
                                        </svg>
                                    </i> Support
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{request()->route()->getName() === 'payment_history' ? 'active' : ''}}" href="{{route('payment_history')}}">
                                    <i class="me-2" style="width:20px; display: inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#9ca3ab" d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM80 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 96H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm0 32v64H288V256H96zM240 416h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>

                                    </i> Payment History
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{request()->route()->getName() === 'settings' ? 'active' : ''}}" href="#"><i class="me-2"
                                        style="width:20px; display: inline-block">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.50498 11.75C1.18794 11.2017 0.941483 10.6156 0.771484 10.0055C1.14146 9.81733 1.45218 9.53047 1.66926 9.17667C1.88633 8.82287 2.00131 8.41592 2.00146 8.00084C2.00162 7.58575 1.88695 7.17871 1.67014 6.82475C1.45332 6.47079 1.14282 6.1837 0.772984 5.99525C1.11201 4.76937 1.75753 3.64996 2.64873 2.7425C2.9968 2.96879 3.4007 3.09437 3.81572 3.10534C4.23074 3.1163 4.6407 3.01222 5.00023 2.80463C5.35976 2.59703 5.65485 2.294 5.85283 1.92908C6.05081 1.56416 6.14396 1.15158 6.12198 0.737001C7.35357 0.418717 8.64591 0.419234 9.87723 0.738501C9.85545 1.15307 9.94879 1.56559 10.1469 1.93041C10.345 2.29522 10.6403 2.59811 10.9999 2.80555C11.3595 3.01299 11.7694 3.11689 12.1844 3.10576C12.5994 3.09464 13.0033 2.96891 13.3512 2.7425C13.7855 3.185 14.171 3.68825 14.495 4.25C14.8197 4.81175 15.0627 5.3975 15.2285 5.9945C14.8585 6.18268 14.5478 6.46953 14.3307 6.82333C14.1136 7.17713 13.9987 7.58408 13.9985 7.99917C13.9983 8.41425 14.113 8.82129 14.3298 9.17525C14.5466 9.52921 14.8571 9.8163 15.227 10.0048C14.888 11.2306 14.2424 12.35 13.3512 13.2575C13.0032 13.0312 12.5993 12.9056 12.1842 12.8947C11.7692 12.8837 11.3593 12.9878 10.9997 13.1954C10.6402 13.403 10.3451 13.706 10.1471 14.0709C9.94916 14.4358 9.856 14.8484 9.87798 15.263C8.6464 15.5813 7.35406 15.5808 6.12273 15.2615C6.14452 14.8469 6.05118 14.4344 5.85305 14.0696C5.65492 13.7048 5.35972 13.4019 5.00011 13.1945C4.64051 12.987 4.23053 12.8831 3.81553 12.8942C3.40053 12.9054 2.9967 13.0311 2.64873 13.2575C2.20548 12.8052 1.82118 12.2987 1.50498 11.75ZM5.74998 11.897C6.5492 12.358 7.15012 13.0978 7.43748 13.9745C7.81173 14.0098 8.18748 14.0105 8.56173 13.9753C8.84928 13.0984 9.45048 12.3586 10.25 11.8978C11.0489 11.4355 11.9904 11.2846 12.8937 11.474C13.1112 11.168 13.2987 10.8418 13.4547 10.5005C12.8393 9.81308 12.4993 8.92266 12.5 8C12.5 7.055 12.8525 6.17225 13.4547 5.4995C13.2976 5.15836 13.1093 4.83248 12.8922 4.526C11.9894 4.71523 11.0486 4.56461 10.25 4.103C9.45076 3.64203 8.84985 2.90224 8.56248 2.0255C8.18823 1.99025 7.81248 1.9895 7.43823 2.02475C7.15068 2.90161 6.54949 3.64142 5.74998 4.10225C4.95107 4.56449 4.00959 4.71539 3.10623 4.526C2.88916 4.83222 2.70133 5.15815 2.54523 5.4995C3.16066 6.18692 3.50065 7.07734 3.49998 8C3.49998 8.945 3.14748 9.82775 2.54523 10.5005C2.70234 10.8416 2.89064 11.1675 3.10773 11.474C4.01052 11.2848 4.95139 11.4354 5.74998 11.897ZM7.99998 10.25C7.40325 10.25 6.83095 10.0129 6.40899 9.59099C5.98704 9.16903 5.74998 8.59674 5.74998 8C5.74998 7.40326 5.98704 6.83097 6.40899 6.40901C6.83095 5.98705 7.40325 5.75 7.99998 5.75C8.59672 5.75 9.16902 5.98705 9.59097 6.40901C10.0129 6.83097 10.25 7.40326 10.25 8C10.25 8.59674 10.0129 9.16903 9.59097 9.59099C9.16902 10.0129 8.59672 10.25 7.99998 10.25ZM7.99998 8.75C8.1989 8.75 8.38966 8.67098 8.53031 8.53033C8.67097 8.38968 8.74998 8.19891 8.74998 8C8.74998 7.80109 8.67097 7.61032 8.53031 7.46967C8.38966 7.32902 8.1989 7.25 7.99998 7.25C7.80107 7.25 7.61031 7.32902 7.46965 7.46967C7.329 7.61032 7.24998 7.80109 7.24998 8C7.24998 8.19891 7.329 8.38968 7.46965 8.53033C7.61031 8.67098 7.80107 8.75 7.99998 8.75Z"
                                                fill="#9CA3AB" />
                                        </svg>


                                    </i> Settings</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="me-2" style="width:20px; display: inline-block">
                                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.75 15.5C0.551088 15.5 0.360322 15.421 0.21967 15.2803C0.0790178 15.1397 0 14.9489 0 14.75V1.25C0 1.05109 0.0790178 0.860322 0.21967 0.71967C0.360322 0.579018 0.551088 0.5 0.75 0.5H11.25C11.4489 0.5 11.6397 0.579018 11.7803 0.71967C11.921 0.860322 12 1.05109 12 1.25V3.5H10.5V2H1.5V14H10.5V12.5H12V14.75C12 14.9489 11.921 15.1397 11.7803 15.2803C11.6397 15.421 11.4489 15.5 11.25 15.5H0.75ZM10.5 11V8.75H5.25V7.25H10.5V5L14.25 8L10.5 11Z"
                                                fill="#9CA3AB" />
                                        </svg>


                                    </i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                            @else

                            <li>
                                <a class="dropdown-item" href="{{route('member.login-view')}}">
                                    <i class="me-2" style="width:20px; display: inline-block">
                                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.75 15.5C0.551088 15.5 0.360322 15.421 0.21967 15.2803C0.0790178 15.1397 0 14.9489 0 14.75V1.25C0 1.05109 0.0790178 0.860322 0.21967 0.71967C0.360322 0.579018 0.551088 0.5 0.75 0.5H11.25C11.4489 0.5 11.6397 0.579018 11.7803 0.71967C11.921 0.860322 12 1.05109 12 1.25V3.5H10.5V2H1.5V14H10.5V12.5H12V14.75C12 14.9489 11.921 15.1397 11.7803 15.2803C11.6397 15.421 11.4489 15.5 11.25 15.5H0.75ZM10.5 11V8.75H5.25V7.25H10.5V5L14.25 8L10.5 11Z"
                                                fill="#9CA3AB" />
                                        </svg>


                                    </i> Sign in / Sign up
                                </a>
                            </li>

                            @endif

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
