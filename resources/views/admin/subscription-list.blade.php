@extends('admin.layouts.app')

@section('content')
<div class="discriptionblock dashboard-container">
    <h2>Subscriptions</h2>
    <hr class="mb-5">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="table-responsive">
                </table>
                <table class="table custom-table data-table">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Package</th>
                            <th scope="col">Billing-Name</th>
                            <th scope="col">Billing-Email</th>
                            <th scope="col">Subscription Starts On</th>
                            <th scope="col">Subscription Expires On</th>
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
                        url: "{{ route('admin.subscription_listing') }}",
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {data: 'package', name: 'package'},
                        {data: 'billing_name', name: 'billing_name'},
                        {data: 'billing_email', name: 'billing_email'},
                        {data: 'subscription_start_date', name: 'subscription_start_date'},
                        {data: 'subscription_expire_date', name: 'subscription_expire_date'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                // console.log(table);
            });
        </script>
    @endpush
