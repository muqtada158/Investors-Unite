@extends('members.layouts.app')

@section('content')
@push('css')
    <style>
        .form-check-input:checked {
            background-color: #3d75b9;
            border-color: #ffffff;
        }
        .my-input-value {
            position: relative;
            font-size: 17px;
            border: #D9D9D9 solid 1px;
            border-radius: 15px;
            padding: 15px 15px 15px 25px;
            width: 100%;
        }
    </style>
@endpush
<div class="main ">
    <div class="row">
        <div class="col-md-12">
            <div class="border-top height-40"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 discriptionblock">
            <h2>Sign up as a Private Money Lender</h2>
        </div>
    </div>
    <form action="{{route('member.register_money_lender')}}" method="post" enctype="multipart/form-data">@csrf
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="col-md-12 discriptionblock">
                    <h3 class="text-dark">QUESTIONS:</h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="graybgbox">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label mb-3 text-dark"><i
                                    class="me-2"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#3987e9" d="M312 24V34.5c6.4 1.2 12.6 2.7 18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8V232c0 13.3-10.7 24-24 24s-24-10.7-24-24V220.6c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2V24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5H192 32c-17.7 0-32-14.3-32-32V416c0-17.7 14.3-32 32-32H68.8l44.9-36c22.7-18.2 50.9-28 80-28H272h16 64c17.7 0 32 14.3 32 32s-14.3 32-32 32H288 272c-8.8 0-16 7.2-16 16s7.2 16 16 16H392.6l119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384l0 0-.9 0c.3 0 .6 0 .9 0z"/></svg>
                                    </i> Have you done any money lending on real estate deals as of now? If so, how many? <sup class="redcolor">*</sup></label>
                                    <div class="form-check">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="years_of_lending" id="inlineRadio1" value="None">
                                            <label class="form-check-label text-dark" for="inlineRadio1">&nbsp; None</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="years_of_lending"  id="inlineRadio2" value="1-3">
                                            <label class="form-check-label text-dark" for="inlineRadio2">&nbsp; 1-3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="years_of_lending"  id="inlineRadio3" value="4-10">
                                            <label class="form-check-label text-dark" for="inlineRadio3">&nbsp; 4-10</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="years_of_lending"  id="inlineRadio4" value="10+">
                                            <label class="form-check-label text-dark" for="inlineRadio4">&nbsp; 10+</label>
                                        </div>
                                    </div>
                                    @error('years_of_lending')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="graybgbox">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label mb-3 text-dark"><i
                                    class="me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#3598e7" d="M320 96H192L144.6 24.9C137.5 14.2 145.1 0 157.9 0H354.1c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128H320c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96H96c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4l0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V424c0 11 9 20 20 20s20-9 20-20V410.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l0 0-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V216z"/></svg>
                                    </i> How much money did you plan on lending out at one time? <sup class="redcolor">*</sup></label>
                                    <div class="sliderblock">
                                        <div class="row mt-3">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="">Minimum</label>
                                                <div class="doller-icon">
                                                    <select name="lending_min"  class="from_1 set-width-100 input-value">
                                                        <option value="0">0</option>
                                                        <option value="50000">50,000</option>
                                                        <option value="100000">100,000</option>
                                                        <option value="150000">150,000</option>
                                                        <option value="200000">200,000</option>
                                                        <option value="250000">250,000</option>
                                                        <option value="300000">300,000</option>
                                                        <option value="350000">350,000</option>
                                                        <option value="400000">400,000</option>
                                                        <option value="450000">450,000</option>
                                                        <option value="500000">500,000</option>
                                                        <option value="550000">550,000</option>
                                                        <option value="600000">600,000</option>
                                                        <option value="650000">650,000</option>
                                                        <option value="700000">700,000</option>
                                                        <option value="750000">750,000</option>
                                                        <option value="800000">800,000</option>
                                                        <option value="850000">850,000</option>
                                                        <option value="900000">900,000</option>
                                                        <option value="950000">950,000</option>
                                                        <option value="1000000">1.00M</option>
                                                        <option value="1250000">1.25M</option>
                                                        <option value="1500000">1.50M</option>
                                                        <option value="1750000">1.75M</option>
                                                        <option value="2000000">2.00M</option>
                                                        <option value="2250000">2.25M</option>
                                                        <option value="2500000">2.50M</option>
                                                        <option value="2750000">2.75M</option>
                                                        <option value="3000000">3.00M</option>
                                                        <option value="3250000">3.25M</option>
                                                        <option value="3500000">3.50M</option>
                                                        <option value="3750000">3.75M</option>
                                                        <option value="4000000">4.00M</option>
                                                        <option value="4250000">4.25M</option>
                                                        <option value="4500000">4.50M</option>
                                                        <option value="4750000">4.75M</option>
                                                        <option value="5000000">5.00M</option>
                                                        <option value="6000000">6.00M</option>
                                                        <option value="7000000">7.00M</option>
                                                        <option value="8000000">8.00M</option>
                                                        <option value="9000000">9.00M</option>
                                                        <option value="10000000">10.00M</option>
                                                        <option value="11000000">11.00M</option>
                                                        <option value="12000000">12.00M</option>
                                                        <option value="13000000">13.00M</option>
                                                        <option value="14000000">14.00M</option>
                                                        <option value="15000000">15.00M</option>
                                                        <option value="16000000">16.00M</option>
                                                        <option value="17000000">17.00M</option>
                                                        <option value="18000000">18.00M</option>
                                                    </select>
                                                </div>
                                                @error('lending_min')
                                                    <span class="text-danger" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="">Maximum</label>
                                                <div class="doller-icon">
                                                    <select name="lending_max"  class="to_1 set-width-100  input-value">
                                                        <option value="50000">50,000</option>
                                                        <option value="100000">100,000</option>
                                                        <option value="150000">150,000</option>
                                                        <option value="200000">200,000</option>
                                                        <option value="250000">250,000</option>
                                                        <option value="300000">300,000</option>
                                                        <option value="350000">350,000</option>
                                                        <option value="400000">400,000</option>
                                                        <option value="450000">450,000</option>
                                                        <option value="500000">500,000</option>
                                                        <option value="550000">550,000</option>
                                                        <option value="600000">600,000</option>
                                                        <option value="650000">650,000</option>
                                                        <option value="700000">700,000</option>
                                                        <option value="750000">750,000</option>
                                                        <option value="800000">800,000</option>
                                                        <option value="850000">850,000</option>
                                                        <option value="900000">900,000</option>
                                                        <option value="950000">950,000</option>
                                                        <option value="1000000">1.00M</option>
                                                        <option value="1250000">1.25M</option>
                                                        <option value="1500000">1.50M</option>
                                                        <option value="1750000">1.75M</option>
                                                        <option value="2000000">2.00M</option>
                                                        <option value="2250000">2.25M</option>
                                                        <option value="2500000">2.50M</option>
                                                        <option value="2750000">2.75M</option>
                                                        <option value="3000000">3.00M</option>
                                                        <option value="3250000">3.25M</option>
                                                        <option value="3500000">3.50M</option>
                                                        <option value="3750000">3.75M</option>
                                                        <option value="4000000">4.00M</option>
                                                        <option value="4250000">4.25M</option>
                                                        <option value="4500000">4.50M</option>
                                                        <option value="4750000">4.75M</option>
                                                        <option value="5000000">5.00M</option>
                                                        <option value="6000000">6.00M</option>
                                                        <option value="7000000">7.00M</option>
                                                        <option value="8000000">8.00M</option>
                                                        <option value="9000000">9.00M</option>
                                                        <option value="10000000">10.00M</option>
                                                        <option value="11000000">11.00M</option>
                                                        <option value="12000000">12.00M</option>
                                                        <option value="13000000">13.00M</option>
                                                        <option value="14000000">14.00M</option>
                                                        <option value="15000000">15.00M</option>
                                                        <option value="16000000">16.00M</option>
                                                        <option value="17000000">17.00M</option>
                                                        <option value="18000000">18.00M</option>

                                                    </select>
                                                </div>
                                                @error('lending_max')
                                                    <span class="text-danger" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="graybgbox">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label mb-3 text-dark"><i
                                    class="me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#3987e9" d="M323.4 85.2l-96.8 78.4c-16.1 13-19.2 36.4-7 53.1c12.9 17.8 38 21.3 55.3 7.8l99.3-77.2c7-5.4 17-4.2 22.5 2.8s4.2 17-2.8 22.5l-20.9 16.2L512 316.8V128h-.7l-3.9-2.5L434.8 79c-15.3-9.8-33.2-15-51.4-15c-21.8 0-43 7.5-60 21.2zm22.8 124.4l-51.7 40.2C263 274.4 217.3 268 193.7 235.6c-22.2-30.5-16.6-73.1 12.7-96.8l83.2-67.3c-11.6-4.9-24.1-7.4-36.8-7.4C234 64 215.7 69.6 200 80l-72 48V352h28.2l91.4 83.4c19.6 17.9 49.9 16.5 67.8-3.1c5.5-6.1 9.2-13.2 11.1-20.6l17 15.6c19.5 17.9 49.9 16.6 67.8-2.9c4.5-4.9 7.8-10.6 9.9-16.5c19.4 13 45.8 10.3 62.1-7.5c17.9-19.5 16.6-49.9-2.9-67.8l-134.2-123zM16 128c-8.8 0-16 7.2-16 16V352c0 17.7 14.3 32 32 32H64c17.7 0 32-14.3 32-32V128H16zM48 320a16 16 0 1 1 0 32 16 16 0 1 1 0-32zM544 128V352c0 17.7 14.3 32 32 32h32c17.7 0 32-14.3 32-32V144c0-8.8-7.2-16-16-16H544zm32 208a16 16 0 1 1 32 0 16 16 0 1 1 -32 0z"/></svg>
                                    </i> What kind of lending do you want to do? <sup class="redcolor">*</sup></label>
                                    <div class="form-check">
                                        {{-- <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type_of_lending" id="inlineradio5" value="Traditional Funding">
                                            <label class="form-check-label text-dark" for="inlineradio5">&nbsp; Traditional Funding</label>
                                        </div> --}}
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type_of_lending" id="inlineradio6" value="Short Term 1-2 months">
                                            <label class="form-check-label text-dark" for="inlineradio6">&nbsp; Short Term 1-2 months</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type_of_lending" id="inlineradio7" value="Medium Term 3-12 months">
                                            <label class="form-check-label text-dark" for="inlineradio7">&nbsp; Medium Term 3-12 months</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type_of_lending" id="inlineradio8" value="Long Term 1-30 years">
                                            <label class="form-check-label text-dark" for="inlineradio8">&nbsp; Long Term 1-30 years</label>
                                        </div>
                                    </div>
                                    @error('type_of_lending')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="graybgbox">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label mb-3 text-dark"><i
                                    class="me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#3987e9" d="M374.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-320 320c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l320-320zM128 128A64 64 0 1 0 0 128a64 64 0 1 0 128 0zM384 384a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg>
                                    </i> What interest rate will you be charging? <sup class="redcolor">*</sup></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="percentage-icon">
                                                <input type="text" class=" my-input-value " name="interest_rate" />
                                            </div>
                                            @error('interest_rate')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="col-md-12 discriptionblock">
                    <h3 class="text-dark">PERSONAL DETAILS:</h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="graybgbox">
                            <div class="row">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="form-label mb-3 text-dark"><i class="me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#3b89e7" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>
                                        </i> Name <sup class="redcolor">*</sup></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <input type="text" class=" my-input-value " name="name"/>
                                                    @error('name')
                                                        <span class="text-danger" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="form-label mb-3 text-dark"><i class="me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#3b89e7" d="M256 64C150 64 64 150 64 256s86 192 192 192c17.7 0 32 14.3 32 32s-14.3 32-32 32C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256v32c0 53-43 96-96 96c-29.3 0-55.6-13.2-73.2-33.9C320 371.1 289.5 384 256 384c-70.7 0-128-57.3-128-128s57.3-128 128-128c27.9 0 53.7 8.9 74.7 24.1c5.7-5 13.1-8.1 21.3-8.1c17.7 0 32 14.3 32 32v80 32c0 17.7 14.3 32 32 32s32-14.3 32-32V256c0-106-86-192-192-192zm64 192a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg>
                                        </i> Email <sup class="redcolor">*</sup></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <input type="email" class=" my-input-value " autocomplete="off" name="email" />
                                                    @error('email')
                                                        <span class="text-danger" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="form-label mb-3 text-dark"><i class="me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#3989e7" d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z"/></svg>
                                        </i> Password <sup class="redcolor">*</sup></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <input type="password" class=" my-input-value " autocomplete="off" name="password" />
                                                    @error('password')
                                                        <span class="text-danger" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="form-label mb-3 text-dark"><i class="me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#3989e7" d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z"/></svg>
                                        </i> Confirm Password <sup class="redcolor">*</sup></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <input type="password" class=" my-input-value " autocomplete="off" name="password_confirmation" />
                                                    @error('password_confirmation')
                                                        <span class="text-danger" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4 text-center">
                                        <button class="btn btn-primary box-shadow-blue custom-btn" type="submit">Sign Up</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
