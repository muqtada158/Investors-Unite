@extends('members.dashboard.layouts.app')

@section('content')
<div class="discriptionblock dashboard-container">
    <h2>Inventory</h2>
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
                            <th scope="col">Price</th>
                            <th scope="col">Purchasing Date</th>
                            <th scope="col">Purchasing Status</th>
                            <th scope="col">User</th>
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
                        url: "{{ route('dashboard.inventory') }}",
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {data: 'property_type', name: 'property_type',orderable: false},
                        {data: 'complete_address', name: 'complete_address',orderable: false},
                        {data: 'price', name: 'price',orderable: false},
                        {data: 'purchasing_date', name: 'purchasing_date', orderable: false},
                        {data: 'property_status', name: 'property_status',orderable: false, searchable: false },
                        {data: 'property_user', name: 'property_user',orderable: false, searchable: false },
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                // console.log(table);
            });
        </script>
    @endpush

