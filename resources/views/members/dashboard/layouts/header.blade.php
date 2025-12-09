<div class="custom-sidebar">
    <div class="mb-40">
        <a href="{{route('index')}}">
            <img src="{{asset('admin/images/logo.png')}}" class="backend-logo" alt="">
        </a>
    </div>
    <ul id="style-1">
        <li>
            <a href="{{route('dashboard.dashboard')}}" class="{{request()->route()->getName() === 'dashboard.dashboard' ? 'active' : ''}}">Dashboard</a>
        </li>
        <li>
            <a href="{{route('dashboard.buyers')}}" class="{{request()->route()->getName() === 'dashboard.buyers' ? 'active' : ''}}">Buyers</a>
        </li>
        <li>
            <a href="{{route('dashboard.property_listing')}}" class="{{request()->route()->getName() === 'dashboard.property_listing' ? 'active' : ''}}">My Properties</a>
        </li>
        <li>
            <a href="{{route('dashboard.listing_showing')}}">My Showings</a>
        </li>
        <li>
            <a href="{{route('dashboard.my_jv_partner')}}" class="{{request()->route()->getName() === 'dashboard.my_jv_partner' ? 'active' : ''}}">My JV Partners</a>
        </li>
        <li>
            <a href="{{route('dashboard.saved_deals')}}" class="{{request()->route()->getName() === 'dashboard.saved_deals' ? 'active' : ''}}">Saved Deals</a>
        </li>
        <li>
            <a href="{{route('dashboard.offers_recevied')}}" class="{{request()->route()->getName() === 'dashboard.offers_recevied' ? 'active' : ''}}">Offers Received</a>
        </li>
        <li>
            <a href="{{route('dashboard.inventory')}}"  class="{{request()->route()->getName() === 'dashboard.inventory' ? 'active' : ''}}">Inventory</a>
        </li>
        {{-- <li>
            <a href="{{route('dashboard.skip_tracing')}}"  class="{{request()->route()->getName() === 'dashboard.skip_tracing' ? 'active' : ''}}">Skip Tracing</a>
        </li> --}}
        <li>
            <a href="#">Contract Examples</a>
        </li>
        <li>
            <a href="#">Settings</a>
        </li>
        <li>
            <a href="{{route('index')}}">Go To Website</a><br>
        </li>
    </ul>

    <a href="#" class="logout-text" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
