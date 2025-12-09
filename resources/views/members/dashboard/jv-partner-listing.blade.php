@extends('members.dashboard.layouts.app')

@section('content')
<div class="discriptionblock dashboard-container">
    <h2>My JV-Partners </h2>
    <hr class="mb-5">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="table-responsive">
                </table>
                <table class="table table-hover custom-table data-table text-center">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Property Type</th>
                            <th scope="col">Complete Address</th>
                            <th scope="col">Price</th>
                            <th scope="col">Expected Closing Date</th>
                            <th scope="col">JV Requests</th>
                            <th scope="col">JV Partners</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
@push('js')
        <script type="text/javascript">
            $(function () {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('dashboard.my_jv_partner') }}",
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {data: 'property_type', name: 'property_type'},
                        {data: 'complete_address', name: 'complete_address'},
                        {data: 'price', name: 'price'},
                        {data: 'expected_closing_date', name: 'expected_closing_date'},
                        {data: 'offer_received', name: 'offer_received', orderable: false, searchable: false},
                        {data: 'buynow', name: 'buynow', orderable: false, searchable: false},
                    ],
                });
            });
        </script>
    @endpush
