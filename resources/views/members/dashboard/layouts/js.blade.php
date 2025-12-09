    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{asset('admin/js/bootstrap.js')}}"></script>
    <script src="{{asset('admin/js/jquery.uploader.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- data tables --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <!-- Load FilePond library starts -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>


    <script>

        FilePond.registerPlugin(FilePondPluginImagePreview);
        const input = document.querySelector('input[type="file"]');
            // Create a FilePond instance
            FilePond.create(input, {
                storeAsFile: true,
                acceptedFileTypes: ['image/*', 'video/*']
            });
        FilePond.parse(document.body);
        $('.filepond--credits').hide();

     </script>
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

    {{-- delete data popup stars --}}
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
                        // Swal.fire(
                        //     'Deleted!',
                        //     'Your file has been deleted.',
                        //     'success'
                        // )
                        }
                    })
        });
    });
    </script>
    {{-- delete data popup ends --}}

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
        function AjaxRequestGet(url,data)
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
                type: 'Get'
            });
            return res;
        }
    </script>
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
    {{-- ajax function ends --}}
    @stack('js')
