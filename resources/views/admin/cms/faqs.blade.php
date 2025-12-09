@extends('admin.layouts.app')

@section('content')
<div class="discriptionblock dashboard-container">
    <h2>Faqs</h2>
    <hr class="mb-5">
    <div class="row ">
        <div class="col-sm-auto">
            <a href="{{route('admin.faqs_create')}}" class="btn btnsize btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg ">
                <div class="d-flex align-items-center justify-content-center">
                    <i class="me-2"><svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9 9.5V5.5H11V9.5H15V11.5H11V15.5H9V11.5H5V9.5H9ZM10 20.5C4.477 20.5 0 16.023 0 10.5C0 4.977 4.477 0.5 10 0.5C15.523 0.5 20 4.977 20 10.5C20 16.023 15.523 20.5 10 20.5ZM10 18.5C12.1217 18.5 14.1566 17.6571 15.6569 16.1569C17.1571 14.6566 18 12.6217 18 10.5C18 8.37827 17.1571 6.34344 15.6569 4.84315C14.1566 3.34285 12.1217 2.5 10 2.5C7.87827 2.5 5.84344 3.34285 4.34315 4.84315C2.84285 6.34344 2 8.37827 2 10.5C2 12.6217 2.84285 14.6566 4.34315 16.1569C5.84344 17.6571 7.87827 18.5 10 18.5Z"
                                fill="white" />
                        </svg>
                    </i>
                    Add Faqs
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
                            <th scope="col">Question</th>
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
                        url: "{{ route('admin.faqs') }}",
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {data: 'question', name: 'question'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                // console.log(table);
            });
        </script>
    @endpush
