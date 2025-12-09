@extends('members.layouts.app')

@section('content')
    <div class="main">
        <div class="row">
            <div class="col-md-12">
                <div class="border-top height-40"></div>
            </div>
        </div>


        <div class="row mt-4 m-0">

            @include('members.my-account.sidebar')

            <div class="profile-block-container ps-md-5">
                <div class="row mt-0">
                    <div class="col-md-12">
                        <div class="discriptionblock">
                            <h2 class="mb-4 pb-1">Lender's Notebook</h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <button class="btn btn-primary  py-2 btn-lg px-4 w-100" data-bs-toggle="modal" data-bs-target="#new_note">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path fill="#ffffff"
                                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                    </svg>
                                    New Note
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table custom-table responsive table-responsive-sm data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.No</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Money Lended</th>
                                            <th scope="col">Interest Rate</th>
                                            <th scope="col">Comments</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="new_note" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-custom">
                    <div class="modal-body p-5">

                        <div class="card ">
                            <form class="form" action="{{route('add_edit_lender_notes')}}" method="POST">@csrf
                                <div class="property-type mb-3">
                                    <span class="ms-0">Date</span>
                                </div>
                                <div>
                                    <input type="date" name="date" class="from_1 set-width-100 input-value"
                                    value="{{ old('date', now()->format('Y-m-d')) }}">
                                </div>
                                <div class="property-type mt-25 mb-3">
                                    <span class="ms-0">User Name</span>
                                </div>
                                <div class="doller-icofn">
                                    <input type="text"  name="user_name" value="{{old('user_name')}}"
                                        placeholder="User Name  i.e: John" class="from_1 set-width-100 input-value">
                                </div>
                                <div class="property-type mt-25 mb-3">
                                    <span class="ms-0">Money Lended</span>
                                </div>
                                <div class="doller-icon">
                                    <input type="text"  name="money_lended" value="{{old('money_lended')}}"
                                        placeholder="Money Lended  i.e: 25000" class="usecommaval from_1 set-width-100 input-value">
                                </div>
                                <div class="property-type mt-25 mb-3">
                                    <span class="ms-0">Interest</span>
                                </div>
                                <div class="percentage-icon">
                                    <input type="text"  name="interest" value="{{old('interest')}}"
                                        placeholder="Interest i.e: 2.0" class="from_1 set-width-100 input-value">
                                </div>
                                <div class="property-type mt-25 mb-3">
                                    <span class="ms-0">Comments</span>
                                </div>
                                <div class="doller-icofn">
                                    <textarea name="comments" placeholder="Comments" class="from_1 set-width-100 input-value" name="comments" id="" cols="30" rows="5">{{old('comments')}}</textarea>
                                </div>
                                <div class="text-center">
                                    <button class="btn btnsize mt-40 btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg mx-2"
                                        type="submit" id data-btn-buynow="true">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="edit_note" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-custom">
                    <div class="modal-body p-5" id="get_edit_note_data">


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
                    url: "{{ route('lender_notebook') }}",
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'date', name: 'date'},
                    {data: 'user_name', name: 'user_name'},
                    {data: 'money_lended', name: 'money_lended'},
                    {data: 'interest', name: 'interest'},
                    {data: 'comments', name: 'comments', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                responsive: true
            });
        });
    </script>


    <script>
        function getEditData(id)
        {
            var csrfToken = "{{ csrf_token() }}";
            $.ajax({
                type: "POST",
                url: "{{ route('get_edit_data') }}",
                data: { 'id': id },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    $("#get_edit_note_data").html(response);
                },
                error: function(error) {
                    console.error("Error:", error);
                }
            });
        }
    </script>
    @endpush
