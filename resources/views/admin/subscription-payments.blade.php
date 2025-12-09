@extends('admin.layouts.app')

@section('content')
<div class="discriptionblock dashboard-container">
    <h2>Subscription Payments</h2>
    <hr class="mb-5">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="table-responsive">
                </table>
                <table class="table custom-table data-table">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Time / Date</th>
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
                        url: "{{ route('admin.subscription_payment_listing') }}",
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {data: 'getMember.name', name: 'getMember.name'},
                        {data: 'getMember.email', name: 'getMember.email'},
                        {data: 'stripe_amount', name: 'stripe_amount'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                // console.log(table);
            });
        </script>
    @endpush
