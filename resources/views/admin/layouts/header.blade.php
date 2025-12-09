
    <style>
        .custom-menu-dropdown ul {
            height: auto;
            position: relative !important;
            inset: 0px auto auto 0px !important;
            margin: -15px 0px 0px 25px !important;
            border: 0px;
        }
        li.custom-dropdown-li {
            margin: 10px 0px 15px 0px !important;
        }
    </style>


<div class="custom-sidebar">
    <div class="mb-40">
        <a href="{{route('index')}}">
            <img src="{{asset('admin/images/logo.png')}}" class="backend-logo" alt="">
        </a>
    </div>
    <ul id="style-1">
        <li>
            <a href="{{route('admin.dashboard')}}" class="{{request()->route()->getName() === 'admin.dashboard' ? 'active' : ''}}">Dashboard</a>
        </li>
        <li>
            <a href="{{route('admin.users')}}" class="{{request()->route()->getName() === 'admin.users' ? 'active' : ''}}">All Users</a>
        </li>
        <li>
            <a href="{{route('admin.properties')}}" class="{{request()->route()->getName() === 'admin.properties' ? 'active' : ''}}">All Properties</a>
        </li>
        <li>
            <a href="{{route('admin.package_listing')}}" class="{{request()->route()->getName() === 'admin.package_listing' ? 'active' : ''}}">Packages</a>
        </li>
        <li>
            <a href="{{route('admin.coupons_listing')}}" class="{{request()->route()->getName() === 'admin.coupons_listing' ? 'active' : ''}}">Coupons</a>
        </li>
        <li>
            <a href="{{route('admin.subscription_listing')}}" class="{{request()->route()->getName() === 'admin.subscription_listing' ? 'active' : ''}}">Subscriptions</a>
        </li>
        <li>
            <a href="{{route('admin.one_time_payment_listing')}}" class="{{request()->route()->getName() === 'admin.one_time_payment_listing' ? 'active' : ''}}">One Time Payments</a>
        </li>
        <li>
            <a href="{{route('admin.subscription_payment_listing')}}" class="{{request()->route()->getName() === 'admin.subscription_payment_listing' ? 'active' : ''}}">Subscription Payments</a>
        </li>
        <li class="dropdown custom-menu-dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">CMS</a>
            <ul class="dropdown-menu">
                <li class="custom-dropdown-li"><a href="#">About us</a></li>
                <li class="custom-dropdown-li"><a href="#">Contact us</a></li>
                <li class="custom-dropdown-li {{request()->route()->getName() === 'admin.faqs' ? 'active' : ''}}"><a href="{{route('admin.faqs')}}">FAQ's</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('admin.contactus')}}" class="{{request()->route()->getName() === 'admin.contact' ? 'active' : ''}}">Contact-Us</a>
        </li>
        <li>
            <a href="#">Settings</a>
        </li>
    </ul>
    <a href="#" class="logout-text" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
