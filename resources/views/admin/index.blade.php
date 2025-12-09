@extends('admin.layouts.app')


@section('content')
    <div class="discriptionblock dashboard-container">
        <h2>Dashboard</h2>
        <hr>
        <div class="row">
            <div class="col-md-auto">
                <div class="card-gray-2">
                    <h3>{{$buyers}}</h3>
                    <p>No Of Buyers</p>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="card-gray-2">
                    <h3>{{$dealers}}</h3>
                    <p>
                        No Of Property Dealers</p>
                </div>
            </div>
            {{-- <div class="col-md-auto">
                <div class="card-gray-2 card-blue-2">
                    <h3>$50,000</h3>
                    <p>Potential Profit</p>
                </div>
            </div> --}}
            {{-- <div class="col-md-auto ms-auto">

                <div class="mb-3 ">
                    <div class="d-flex align-items-center">
                        <span class="propertytext me-2">Filter by</span>
                        <div class="dropdown">
                            <a class="custom-btn-dropdown" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Last 7 days
                                <i class="ms-2">
                                    <img src="./images/down-arrow.png" style="width: 14px;" alt="">
                                </i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-latest" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Last 7 days</a></li>
                                <li>
                                    <a class="dropdown-item" href="#">This month</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Choose Date</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: '# of Subscriptions',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endpush
