@extends('members.dashboard.layouts.app')

@section('content')
    <div class="discriptionblock dashboard-container">
        <h2>Enter the complete address of the property.</h2>
        <hr>
        <form action="{{route('dashboard.property_step_2_create_edit')}}" method="post"> @csrf
            <div class="row mt-4">
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
                        Your complete address
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class=" customdropdown" style=" position: relative; height:auto">

                            <input type="text" id="pac-input" value="{{session()->get('property_detail.complete_address')}}" class="form-control form-control2" name="complete_address">
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                            <input type="hidden" name="city" id="city">
                            <input type="hidden" name="state" id="state">
                            <input type="hidden" name="zipcode" id="zipcode">
                            <div id="map"></div>
                            <div id="infowindow-content">
                              <span id="place-name" class="title"></span><br />
                              <span id="place-address"></span>
                            </div>

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
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <a href="{{route('dashboard.property_step_1')}}" class="btn me-2 btnsize btn-secondary py-3 btn-lg px-4 px-xxl-5 mb-2"><svg
                            width="14" height="13" viewBox="0 0 14 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.5235 5.66667H13.6668V7.33334H3.5235L7.9935 11.8033L6.81516 12.9817L0.333496 6.50001L6.81516 0.0183411L7.9935 1.19667L3.5235 5.66667Z"
                                fill="#27292D" />
                        </svg>
                        Previous
                    </a>
                    <button type="submit"
                        class="btn btnsize btn-primary box-shadow-blue py-3 btn-lg px-4 px-xxl-5 mb-2">Next <svg
                            width="14" height="13" viewBox="0 0 14 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.4768 5.66667L6.00683 1.19667L7.18516 0.0183411L13.6668 6.50001L7.18516 12.9817L6.00683 11.8033L10.4768 7.33334H0.333496V5.66667H10.4768Z"
                                fill="white" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2I1Nb_PhENZEhGnfwEUdVXL3iGSF_M8c&callback=initMap&libraries=places&v=weekly&solution_channel=GMP_CCS_autocomplete_v1"
defer
></script>
<script>
 function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 40.749933, lng: -73.98633 },
        zoom: 13,
        mapTypeControl: false
    });

    marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    const card = document.getElementById('pac-card');
    const input = document.getElementById('pac-input');
    const useLocationBias = document.getElementById('use-location-bias-checkbox');
    const useStrictBounds = document.getElementById('use-strict-bounds-checkbox');

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);

    const autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    autocomplete.addListener('place_changed', () => {
        const place = autocomplete.getPlace();

        if (!place.geometry || !place.geometry.location) {
            window.alert("No details available for input: '" + place.name + "'");
            return;
        }

        const lat = place.geometry.location.lat();
        const lng = place.geometry.location.lng();
        const city = getComponentValue(place.address_components, 'locality');
        const state = getComponentValue(place.address_components, 'administrative_area_level_1');
        const zipcode = getComponentValue(place.address_components, 'postal_code');

        $('#latitude').val(lat);
        $('#longitude').val(lng);
        $('#city').val(city);
        $('#state').val(state);
        $('#zipcode').val(zipcode);

        // console.log('Latitude:', lat);
        // console.log('Longitude:', lng);
        // console.log('ZIP Code:', zipcode);
        // console.log('City:', city);
        // console.log('State:', state);

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    });

    useLocationBias.addEventListener('change', () => {
        autocomplete.setOptions({ locationRestriction: { radius: '50' } });
    });

    useStrictBounds.addEventListener('change', () => {
        autocomplete.setOptions({ strictBounds: useStrictBounds.checked });
    });
}

function getComponentValue(components, type) {
    for (let i = 0; i < components.length; i++) {
        if (components[i].types.includes(type)) {
            return components[i].long_name;
        }
    }
    return '';
}


</script>
@endpush
