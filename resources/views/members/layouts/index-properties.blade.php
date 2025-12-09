<div id='tab2' class="content property-block-section active">

    <div class="fixeddiv">
        <div class="row gx-1">
            @if (isset($properties))
                <div class="col d-flex align-items-center">
                    <div class="propertytext">
                        <strong>{{ count($properties) }}</strong> Properties
                    </div>
                </div>
            @endif
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <span class="propertytext me-2">Sort by</span>
                    <div class="dropdown">
                        <a class="custom-btn-dropdown defaultone" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Newest
                            <i class="ms-2">
                                <img src="{{ asset('user/images/down-arrow.png') }}" style="width: 14px;"
                                    alt="" />
                            </i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-latest" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item sortby" href="javascript:void(0)" data-name="latest">Newest</a>
                            </li>
                            <li>
                                <a class="dropdown-item sortby" href="javascript:void(0)" data-name="price_high">Priced
                                    (High to low)</a>
                            </li>
                            <li>
                                <a class="dropdown-item sortby" href="javascript:void(0)" data-name="price_low">Priced
                                    (Low to High)</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 pt-5 pt-md-0 gx-2">
        @if (isset($properties) and count($properties) !== null)
            @foreach ($properties as $property)
                <div class="col-md-4 col-xl-6 col-sm-6">

                    <div class="property-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-img">
                                    <a href="javascript:void(0);" onclick="saved_deals({{ $property->id }},'index');"
                                        class="likebg">
                                        <img class="bookmark image-change"
                                            src="{{ check_saved_deals_index($property->id) }}" alt="">
                                    </a>
                                    <a href="{{ route('property_detail', [$property->id]) }}">
                                        <img class="featured-image" src="{{ asset($property->getImages[0]->image) }}"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="card-text">
                                    <div class="bluetext">
                                        {{ $property->complete_address }}
                                    </div>
                                    <div class="pricetext">${{ $property->price }}</div>
                                    <ul>
                                        <li>
                                            <i><img src="{{ asset('user/images/sqaure-fit.png') }}" style="width: 16px;"
                                                    alt="" /></i>
                                            <strong class="me-1">{{ $property->total_square_footage }}</strong>
                                            sqft
                                        </li>
                                        <li>
                                            <i><img src="{{ asset('user/images/bedroom.png') }}" style="width: 16px;"
                                                    alt="" /></i>
                                            <strong class="me-1">{{ $property->no_of_beds }}</strong>
                                            Bedrooms
                                        </li>
                                        <li>
                                            <i><img src="{{ asset('user/images/bathroom.png') }}" style="width: 16px;"
                                                    alt="" /></i>
                                            <strong class="me-1">{{ $property->no_of_baths }}</strong>
                                            Bathrooms
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.sortby').click(function(e) {
            e.preventDefault();
            $('.spinner-loader').show();
            $('#map').hide();
            $('#tab2').hide();
            let dataName = $(this).data('name');
            let text = $(this).text(); // Get the text of the clicked element
            $('.defaultone').text(text); // Update the text of the anchor
            console.log(dataName);
            var csrfToken = "{{ csrf_token() }}";
            let data = {
                'data': dataName
            };
            $.ajax({
                type: "POST",
                url: "{{ route('sortbyIndex') }}",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    console.log(response);
                    $('#map').show();
                    $('#tab2').show();
                    $("#tab2").html(response);
                    $('.defaultone').text(text); // Update the text of the anchor
                    $('.spinner-loader').hide();
                },
                error: function(error) {
                    $('#map').show();
                    $('#tab2').show();
                    $('.spinner-loader').hide();
                    console.error("Error:", error);
                }
            });
        });
    });
</script>
