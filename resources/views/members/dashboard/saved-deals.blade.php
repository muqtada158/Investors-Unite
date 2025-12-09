@extends('members.dashboard.layouts.app')

@section('content')
<div class="discriptionblock dashboard-container">
    <h2>My Saved Deals</h2>
    <hr class="mb-5">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="table-responsive">
                </table>
                <table class="table custom-table data-table">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Property Type</th>
                            <th scope="col">Complete Address</th>
                            <th scope="col">No Of Beds</th>
                            <th scope="col">No Of Baths</th>
                            <th scope="col">Price</th>
                            <th scope="col">Expected Closing Date</th>
                            <th scope="col">Action</th>
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
                        url: "{{ route('dashboard.saved_deals') }}",
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {data: 'property_type', name: 'property_type'},
                        {data: 'complete_address', name: 'complete_address'},
                        {data: 'no_of_beds', name: 'no_of_beds'},
                        {data: 'no_of_baths', name: 'no_of_baths'},
                        {data: 'price', name: 'price'},
                        {data: 'expected_closing_date', name: 'expected_closing_date'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                // console.log(table);
            });
        </script>
    @endpush
