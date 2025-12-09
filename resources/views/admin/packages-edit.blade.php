@extends('admin.layouts.app')


@push('css')
<style>
    img.user-image {
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(30, 30, 30, 0.1);
    }

    .card-img-top {
        padding: 4%;
        border-radius: 20px;
    }

    .card-title, .card-text {
        text-align: center;
    }

    .card-title {
        font-weight: 700;
    }

    .card-text {
        font-size: 15px;
        font-weight: 400;
    }
</style>
@endpush

@section('content')

    <div class="discriptionblock dashboard-container">
        <h2>Packages > Edit</h2>
        <hr>
        <form action="{{route('admin.store_package',[$package->id])}}" method="post" enctype="multipart/form-data">@csrf
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i>Title</label>
                        <input type="text" class="form-control" placeholder="Enter value here" value="{{$package->title}}"  name="title">
                        @error('title')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">

                            <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Listing Detail</label>

                            @foreach (json_decode($package->listing_details) as $listings)
                                <div id="formContainer" class="clonedDiv">
                                    <input type="text" class="form-control mb-4" value="{{$listings}}" placeholder="Enter value here"   name="listing_details[]">
                                </div>
                            @endforeach

                            @error('listing_details')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror


                        <button id="addButton" class="btn btn-primary">+</button>
                    </div>
                    <div class="mb-4">
                        <label for="togglePrice" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Change Price</label>
                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input" name="price_change" type="checkbox" value="1" id="togglePrice">
                        </div>
                        <input type="text" class="form-control" placeholder="Enter value here" value="{{$package->price}}" name="price" id="priceInput" disabled>
                        @error('price')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fa fa-question-circle text-dark" aria-hidden="true"></i> Interval</label>
                        <select name="interval" id="interval" class="form-control" >
                            <option hidden disabled selected>Please select interval</option>
                            <option value="day" {{$package->interval == 'day' ? 'selected' : ''}}>Daily</option>
                            <option value="week" {{$package->interval == 'week' ? 'selected' : ''}}>Weekly</option>
                            <option value="month" {{$package->interval == 'month' ? 'selected' : ''}}>Monthly</option>
                            <option value="year" {{$package->interval == 'year' ? 'selected' : ''}}>Yearly</option>
                        </select>
                        @error('interval')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label text-uppercase mb-3"><i class="fas fa-eye text-dark"></i></i> Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input text-dark" type="checkbox" id="flexSwitchCheckDefault" name="status" value="1" {{$package->status == 1 ? 'checked' : ''}}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit"
                            class="btn btnsize btn-primary box-shadow-blue py-3 btn-lg px-4 px-xxl-5 mb-2">Submit </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @endsection

    @push('js')
    <script>
        var count = 0;
            $('#addButton').click(function(event) {
                event.preventDefault();
                count++;
                var idToCopy = 'formContainer'; // Specify the ID of the div to copy
                var divToCopy = $('#' + idToCopy); // Get the div to copy using the ID

                // Clone the div
                var newDiv = divToCopy.clone();

                // Increment the name attributes of the inputs
                newDiv.find('input').each(function() {
                    var currentName = $(this).attr('name');
                    // var incrementedName = currentName + '_' + count;
                    // $(this).attr('name', incrementedName);
                    $(this).val(''); // Clear the input values in the cloned div
                });

                // Create a delete button
                var deleteButton = $('<button>').text('x').addClass('btn btn-danger mb-4').click(function() {
                    $(this).closest('.clonedDiv')
                .remove(); // Remove the parent div when the delete button is clicked
                });

                // Append the delete button to the cloned div
                newDiv.append(deleteButton);
                newDiv.find('.delete_button').append(deleteButton);

                // Add a class to the cloned div for easier selection
                newDiv.addClass('clonedDiv');

                // Find the previously cloned div and insert the new div after it
                var lastClonedDiv = $('.clonedDiv').last();
                if (lastClonedDiv.length == 0) {
                    // If no previously cloned divs, insert after formContainer
                    newDiv.insertAfter('#formContainer');
                } else {
                    // Insert the new div after the last cloned div
                    newDiv.insertAfter(lastClonedDiv);
                }
            });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePrice = document.getElementById('togglePrice');
            const priceInput = document.getElementById('priceInput');

            togglePrice.addEventListener('change', function() {
                if (this.checked) {
                    priceInput.removeAttribute('disabled');
                } else {
                    priceInput.setAttribute('disabled', true);
                }
            });
        });
    </script>
    @endpush
