@extends('admin.layouts.app')

@section('content')
<div class="discriptionblock dashboard-container">
    <h2>One Time Payments</h2>
    <hr class="mb-5">
    <div class="row ">
        <div class="col-sm-auto">
            <a href="javascript:void(0)"  class="btn btnsize btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg " data-bs-toggle="modal" data-bs-target="#onetime">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="me-2"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#ffffff" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg>
                    </i>
                    Update One Time Payment
                </div>
            </a>
        </div>
    </div>
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


        <div class="modal fade" id="onetime" tabindex="-1" aria-labelledby="onetime" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-custom">
                    <div class="modal-body p-5">
                        <div class="card">
                            <div class="container text-center">
                                <h2>Update One Time Payment</h2>
                            </div>
                            <form action="{{route('admin.update_onetime_payment')}}" class="form" method="POST" enctype="multipart/form-data"> @csrf
                                <div class="">
                                    <div class="form-card">
                                        <div class="property-type  mt-25  mb-3">
                                            <span class="ms-0">Amount</span>
                                        </div>
                                        <div class="">
                                            <input class="form-control" type="text" id="one_time_payment" placeholder="Please enter one_time_payment" name="one_time_payment" value="{{ old('one_time_payment',$getMoneyLenderPayment->one_time_payment) }}">
                                        </div>
                                        @error('one_time_payment')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-buttons text-center">
                                            <button class="btn btnsize mt-40 btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg mx-2" type="update" onclick="showSpinner(this)">Submit <i class="fas fa-spinner fa-spin myspinner d-none"></i></button>
                                            <button type="button" class="btn btnsize mt-40 btn-mobile-block  box-shadow-grey btn-secondary custom-padding-btn btn-lg mx-2" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                        url: "{{ route('admin.one_time_payment_listing') }}",
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
