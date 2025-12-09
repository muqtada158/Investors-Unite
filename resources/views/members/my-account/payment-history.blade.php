@extends('members.layouts.app')

@section('content')

<div class="main ">

    <div class="row">
        <div class="col-md-12">
            <div class="border-top height-40"></div>
        </div>
    </div>
    <div class="row mt-4 m-0">

        @include('members.my-account.sidebar')

        <div class="profile-block-container ps-md-5">
            <div class="row">
                <div class="col-md-12">
                    <table class="table custom-table table-responsive-sm data-table">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Date</th>
                                <th scope="col">Payment Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Reciept</th>
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
                    url: "{{ route('payment_history') }}",
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'created_at', name: 'created_at', searchable: false},
                    {data: 'payment_type', name: 'payment_type'},
                    {data: 'amount', name: 'amount', searchable: false},
                    {data: 'status', name: 'status', searchable: false},
                    {data: 'stripe_receipt_url', name: 'stripe_receipt_url', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endpush

