    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
    {{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    {{-- <script src="https://kit.fontawesome.com/ad153db3f4.js"></script> --}}
    <script src="{{asset('user/js/bootstrap.js')}}"></script>
    <script src="{{asset('user/js/jquery.tag.js')}}"></script>
    <script src="{{asset('user/js/slick.js')}}"></script>
    <script src="{{asset('user/js/showMore.min.js')}}"></script>

       {{-- data tables --}}
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
       <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
       <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



    <!-- Load FilePond library starts -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <!-- Load FilePond library ends -->

    {{-- sweet alert starts--}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    @if (Session::has('message'))
        let type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
            Toast.fire({
                    icon: 'info',
                    title: '{{ Session::get('message') }}'
                })
                break;
            case 'success':
            Toast.fire({
                    icon: 'success',
                    title: '{{ Session::get('message') }}'
                })
                break;
            case 'warning':
            Toast.fire({
                    icon: 'warning',
                    title: '{{ Session::get('message') }}'
                })
                break;
            case 'error':
            Toast.fire({
                    icon: 'error',
                    title: '{{ Session::get('message') }}'
                })
                break;
            default:
                break;
        }
    @endif
    </script>
    {{-- sweet alert ends --}}


    <script>
        function readMoreFunction() {
            var contentText = document.getElementById("content");
            var btnText = document.getElementById("buttonReadMore");

            if (contentText.style.height === "100%") {

                btnText.innerHTML = "View all";
                contentText.style.height = "0";
            } else {

                btnText.innerHTML = "View less";
                contentText.style.height = "100%";
            }
        }

        (function() {
            tabs = document.querySelector('.tabs'),
                tab = document.querySelectorAll('li'),
                contents = document.querySelectorAll('.content');
            tabs.addEventListener('click', function(e) {

                console.log(e.target.nodeName)

                if (e.target.nodeName === 'LI') {

                    // change tabs block
                    tab.forEach(element => {
                        element.classList.remove('active');
                    });
                    e.target.classList.toggle('active');

                    // change content block
                    contents.forEach(element => {
                        element.classList.remove('active');
                    });

                    var tabId = '#' + e.target.dataset.tabId;
                    console.log(tabId)
                    document.querySelector(tabId).classList.add('active');
                }
            });
        })();
    </script>

    <script>
        //var $range = $(".js-range-slider");
        var $range_1 = $(".js-range-slider-1"),

            $from_1 = $(".from_1"),
            $to_1 = $(".to_1"),
            range,
            min = $range_1.data("min"),
            max = $range_1.data("max"),
            from,
            to;

        var updateValues_1 = function() {
            $from_1.prop("value", from);
            $to_1.prop("value", to);
        };

        $range_1.ionRangeSlider({
            onChange: function(data) {
                from = data.from;
                to = data.to;
                updateValues_1();
            },
        });




        var $range = $(".js-range-slider"),

            $from = $(".from"),
            $to = $(".to"),
            range,
            min = $range.data("min"),
            max = $range.data("max"),
            from,
            to;

        var updateValues = function() {
            $from.prop("value", from);
            $to.prop("value", to);
        };

        $range.ionRangeSlider({
            onChange: function(data) {
                from = data.from;
                to = data.to;
                updateValues();
            },
        });









        // $(function() {
        //     $(".likebg").click(function() {
        //         $(this).toggleClass("press", 1000);
        //     });
        // });

        $(document).ready(function() {
            $(".burger").click(function() {
                $(this).toggleClass("active");
                $(".mobilenav").toggleClass("active");
            })
            $(".btn-filter").click(function() {
                $('.property-seaction-block').toggleClass("active");
                $(".overflowbg").toggleClass("active");
            })
            $(".overflowbg").click(function() {
                $('.property-seaction-block').toggleClass("active");
                $(".overflowbg").toggleClass("active");
            })



            $(".custom-card-block").on('click', function() {
                $(".custom-card-block.active").removeClass("active");
                // adding classname 'active' to current click li
                $(this).addClass("active");
            });
        })
    </script>


    {{-- ajax function starts --}}
    <script>
        function AjaxRequest(url,data)
        {
            var res;
            $.ajax({
                url: url,
                data: data,
                async: false,
                error: function(jqXHR, textStatus, errorThrown) {
                    res = jqXHR;
                },
                dataType: 'json',
                success: function(data) {
                    res= data;

                },
                type: 'POST'
            });
            return res;
        }
    </script>
    {{-- ajax function ends --}}


    {{-- for property detail page saved deals --}}
    <script>

        function saved_deals(property_id, page_name) {
            var anchorElement = $(event.target).closest('.likebg'); // Get the closest parent anchor element

            var url = '{{ route('saved_deals_create', ['property_id' => ':property_id']) }}';
            url = url.replace(':property_id', property_id);

            $.ajax({
                url: url,
                type: "GET",
                cache: false,
                processData: false,
                success: function(response) {
                    if (response.status == 1) {
                        Toast.fire({
                            icon: response.notification['alert-type'],
                            title: response.notification['message']
                        });

                        if (page_name === 'index') {
                            anchorElement.find(".image-change").attr('src', '{{ asset("user/images/bookmark1.png") }}');
                        } else {
                            $('.image-change').attr('src', '{{ asset("user/images/save-img-hover.png") }}');
                        }
                    } else {
                        Toast.fire({
                            icon: response.notification['alert-type'],
                            title: response.notification['message']
                        });

                        if (page_name === 'index') {
                            anchorElement.find(".image-change").attr('src', '{{ asset("user/images/bookmark.png") }}');
                        } else {
                            $('.image-change').attr('src', '{{ asset("user/images/save-img.png") }}');
                        }
                    }
                },
                error: function(xhr, status, error) {
                    var response = xhr.responseJSON;
                    if (xhr.status == 401) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Unauthorized! Kindly Login first'
                        });
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Something went wrong, cannot save this deal. Please try again later.'
                        });
                    }
                }
            });
        }

    </script>
    <script>
        $(function(){
            $(document).on('click','#delete',function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "Delete This Data?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            }
                        })
            });
        });
    </script>
    {{-- <script>
        $('.usecomma').each(function() {
            var number = $(this).text();
            var formattedNumber = addCommasToNumber(number);
            $(this).text(formattedNumber);
        });

        // JavaScript function to add commas to numbers
        function addCommasToNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
    <script>
        $('.usecommaval').on('keyup', function() {
            var input = $(this);
            var number = input.val();
            var formattedNumber = addCommasToNumber(number);
            input.val(formattedNumber);
        });

        function addCommasToNumber(number) {
            var cleanedNumber = number.replace(/[^0-9]/g, '');
            return cleanedNumber.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script> --}}
    <script>
        function formatCurrency(input) {
            // Remove existing commas and non-numeric characters
            const value = input.value.replace(/[^\d]/g, '');

            // Format the value as a currency
            const formattedValue = Number(value).toLocaleString('en-US');

            // Update the input value with the formatted currency
            input.value = formattedValue;
        }
        window.onload = function() {
            const priceInputs = document.getElementsByClassName('conversion');
            for (let i = 0; i < priceInputs.length; i++) {
                formatCurrency(priceInputs[i]);
            }
        };
    </script>

    <script>
        function formatPhoneNumber(input) {
    // Remove all non-digit characters
    var cleaned = input.replace(/\D/g, '');

    // Limit the input to 10 digits
    var formattedNumber = cleaned.slice(0, 10);

    // Format the number as (XXX) XXX-XXXX
    var match = formattedNumber.match(/^(\d{0,3})(\d{0,3})(\d{0,4})$/);
    if (match) {
        formattedNumber = '';
        if (match[1]) {
            formattedNumber += '(' + match[1];
        }
        if (match[2]) {
            formattedNumber += ') ' + match[2];
        }
        if (match[3]) {
            formattedNumber += '-' + match[3];
        }
    }

    return formattedNumber;
}

// Attach event listener to input fields with class 'phone-number'
$('.phone-number').on('input', function() {
    // Get the input value
    var inputValue = $(this).val();

    // Format the input value
    var formattedValue = formatPhoneNumber(inputValue);

    // Update the input value with the formatted number
    $(this).val(formattedValue);
});

    </script>

    <script>
        $(document).ready(function() {
        function toggle_preloader() {
            var $loader = $('#test');
            if ($loader.is(':visible')) {
                $loader.hide(); // If loader is visible, hide it
            } else {
                $loader.show(); // If loader is hidden, show it
            }
        }
        });
    </script>
@stack('js')
