@extends('members.dashboard.layouts.app')

@section('content')
<div class="discriptionblock dashboard-container">
    <h2>Buyers</h2>
    <hr class="mb-5">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table custom-table data-table">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Property Address</th>
                            <th scope="col">Buying Price</th>
                            <th scope="col">Bought On</th>
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
                    url: "{{ route('dashboard.buyers') }}",
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'property_address', name: 'property_address'},
                    {data: 'buying_price', name: 'buying_price'},
                    {data: 'bought_on', name: 'bought_on'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endpush

