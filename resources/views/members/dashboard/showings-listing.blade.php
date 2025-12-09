@extends('members.dashboard.layouts.app')

@section('content')
<div class="discriptionblock dashboard-container">
    <h2>My Showings</h2>
    <hr class="mb-5">

    <div class="row mt-2">
        <div class="col-md-12">
            <div class="table-responsive">
                </table>
                <table class="table custom-table data-table">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">User</th>
                            <th scope="col">Property Address</th>
                            <th scope="col">Scheduled Date</th>
                            <th scope="col">Scheduled Time</th>
                            <th scope="col">Status</th>
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
                        url: "{{ route('dashboard.listing_showing') }}",
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {data: 'user', name: 'getBuyer.name'},
                        {data: 'complete_address', name: 'getProperty.complete_address'},
                        {data: 'date', name: 'date'},
                        {data: 'time', name: 'time'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
            });
        </script>



@endpush
