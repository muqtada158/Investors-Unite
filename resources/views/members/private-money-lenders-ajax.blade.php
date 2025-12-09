    @forelse ($lenders as $lender)

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
              <div class="card-text row align-items-center mt-3">
                <div class="col-md-12">
                    <div class="row">
                        <div class="profile-image text-center">
                            <img class="img-thumbnail" src="{{$lender->member->image != null ? asset($lender->member->image) : ''}}" alt="Lender image">
                            <p><strong>{{$lender->member->name}}</strong></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p><strong>Loan Amount</strong></p>
                            <p><strong>TimeFrame</strong></p>
                            <p><strong>Interest / Points</strong></p>
                        </div>
                        <div class="col-sm-6 text-end">
                            <p >$<span class="usecomma">{{$lender->lending_min}}</span> - $<span class="usecomma">{{$lender->lending_max}}</span></p>
                            <p>{{$lender->years_of_lending}} Years</p>
                            <p>{{$lender->interest_rate}} %</p>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ url('direct-message/' . $lender->member->id) }}" class="btn btn-primary">Direct Message <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M16.1 260.2c-22.6 12.9-20.5 47.3 3.6 57.3L160 376V479.3c0 18.1 14.6 32.7 32.7 32.7c9.7 0 18.9-4.3 25.1-11.8l62-74.3 123.9 51.6c18.9 7.9 40.8-4.5 43.9-24.7l64-416c1.9-12.1-3.4-24.3-13.5-31.2s-23.3-7.5-34-1.4l-448 256zm52.1 25.5L409.7 90.6 190.1 336l1.2 1L68.2 285.7zM403.3 425.4L236.7 355.9 450.8 116.6 403.3 425.4z"/></svg></a>
            </div>
          </div>
    </div>

    @empty
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <p>No Data Found...</p>
                </div>
            </div>
        </div>
    @endforelse

    <script>
        $('.usecomma').each(function() {
            var number = $(this).text();
            var formattedNumber = addCommasToNumber(number);
            $(this).text(formattedNumber);
        });

        function addCommasToNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
