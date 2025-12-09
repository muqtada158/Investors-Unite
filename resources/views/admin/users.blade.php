@extends('admin.layouts.app')

@section('content')

<div class="discriptionblock dashboard-container">
    <h2>All Users</h2>
    <hr class="mb-5">

    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-sm-6">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label class="form-label" for="type">Filter By User Type</label>
                </div>
                <div class="col-auto">
                    <select class="form-select" id="type" name="type">
                        <option selected hidden disabled>Please Select Type</option>
                        <option value="1">Buyer</option>
                        <option value="2">Seller</option>
                        <option value="3">Property-Dealer</option>
                        <option value="4">Money-Lender</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="reset" class="btn btn-outline-secondary waves-effect" id="reset">Reset</button>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table custom-table data-table">
            <thead>
              <tr>
                <th scope="col">Sno</th>
                <th scope="col">Name</th>
                {{-- <th scope="col">Phone</th> --}}
                <th scope="col">Email</th>
                {{-- <th scope="col">Company</th> --}}
                <th scope="col">User Type <i><svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path d="M7 12H11V10H7V12ZM0 0V2H18V0H0ZM3 7H15V5H3V7Z" fill="#27292D" />
                    </svg>
                  </i></th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
@push('js')

<script>
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.users') }}",
                    data: function (d) {
                        d.type 	= $('#type').val();
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'name', name: 'name'},
                    // {data: 'phone', name: 'phone'},
                    {data: 'email', name: 'email'},
                    // {data: 'company', name: 'company'},
                    {data: 'type', name: 'type'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            // console.log(table);
            $(document).ready(function()
            {
                $('#type').on('change', function() {
                    table.draw();
                });
                $( "#reset" ).click(function() {
                    $("#type").prop('selectedIndex', 0);
                    table.draw();
                });
            })
        });
</script>

@endpush
