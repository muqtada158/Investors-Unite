<div class="card ">
    <form class="form" action="{{route('add_edit_lender_notes',[$get_notes->id])}}" method="POST">@csrf
        <div class="property-type mb-3">
            <span class="ms-0">Date</span>
        </div>
        <div>
            <input type="date" name="date" class="from_1 set-width-100 input-value"
            value="{{ old('date', $get_notes->date) }}">
        </div>
        <div class="property-type mt-25 mb-3">
            <span class="ms-0">User Name</span>
        </div>
        <div class="doller-icofn">
            <input type="text"  name="user_name" value="{{$get_notes->user_name}}"
                placeholder="User Name  i.e: John" class="from_1 set-width-100 input-value">
        </div>
        <div class="property-type mt-25 mb-3">
            <span class="ms-0">Money Lended</span>
        </div>
        <div class="doller-icon">
            <input type="text"  name="money_lended" value="{{$get_notes->money_lended}}"
                placeholder="Money Lended  i.e: 25000" class="from_1 set-width-100 input-value usecommaval usecomma">
        </div>
        <div class="property-type mt-25 mb-3">
            <span class="ms-0">Interest</span>
        </div>
        <div class="percentage-icon">
            <input type="text"  name="interest" value="{{$get_notes->interest}}"
                placeholder="Interest i.e: 2.0" class="from_1 set-width-100 input-value">
        </div>
        <div class="property-type mt-25 mb-3">
            <span class="ms-0">Comments</span>
        </div>
        <div class="doller-icofn">
            <textarea name="comments" placeholder="Comments" class="from_1 set-width-100 input-value" name="comments" id="" cols="30" rows="5">{{$get_notes->comments}}</textarea>
        </div>
        <div class="text-center">
            <button class="btn btnsize mt-40 btn-mobile-block  box-shadow-blue btn-primary custom-padding-btn btn-lg mx-2"
                type="submit" id data-btn-buynow="true">Submit</button>
        </div>
    </form>

</div>
<script>
    $('.usecommaval').on('keyup', function() {
        var input = $(this);
        var number = input.val();
        var formattedNumber = addCommasToNumber(number);
        input.val(formattedNumber);
    });

    function addCommasToNumber(number) {
        var cleanedNumber = number.replace(/[^0-9]/g, '');
        return cleanedNumber.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
<script>
    $('.usecomma').each(function() {
        var number = $(this).val();
        var formattedNumber = addCommasToNumber(number);
        $(this).val(formattedNumber);
    });

    // JavaScript function to add commas to numbers
    function addCommasToNumber(number) {
        var cleanedNumber = number.replace(/[^0-9]/g, '');
        return cleanedNumber.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
