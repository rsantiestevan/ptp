@extends('template.master')
@section('form-content')
    <div class="row">
        <article class="card">
            <div class="card-body p-5">
                <p></p>
                <p class="alert alert-success">Some text success or error</p>

                <form role="form" id="paycometPaymentForm" action="/payment"  method="POST"
                    @csrf
                    <input type="hidden" name="amount" value="1234">
                    <input type="hidden" data-paycomet="jetID" value="{{ $payJetID }}">
                    <div class="form-group">
                        <label for="username">Confirm your personal information</label>
                        <div class="input-group">
                            <input type="text" name="user_name" class="form-control" placeholder="Full name" required>
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group.// -->
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="user_email" class="form-control" placeholder="Email address" required>
                        </div> <!-- input-group.// -->
                        <div class="input-group">
                            <input type="password" name="user_password" class="form-control" placeholder="Password" required>
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group.// -->
                    <div class="form-group">
                        <label for="username">{{ $courseName }} ({{ $coursePrice }} Euros)</label>
                        <div class="input-group">
                            <div class="more-info">EU {{ $coursePrice }}</div>
                            <input type="hidden" name="amount" value="{{ $coursePrice }}">
                            <input type="hidden" name="price" value="{{ $coursePrice }}" />
                            <input type="hidden" name="quantity" value="1" />
                            <input type="hidden" name="currency" value="EU" />
                            <input type="hidden" name="course_id" value="{{ $courseId }}" />
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group.// -->
                    <div class="form-group">
                        <label for="username">Full name (on the card)</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="username" data-paycomet="cardHolderName" placeholder="" required="">
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group.// -->

                    <div class="form-group">
                        <label for="cardNumber">Card number</label>
                        <div class="input-group">
                            <input paycomet-style="width: 100%; height: 21px; font-size:14px; padding-left:7px; padding-top:8px; border:0px;" name="pan" paycomet-name="pan" paycomet-placeholder="Introduce tu tarjeta...">
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group.// -->

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label><span class="hidden-xs">Expiration</span> </label>
                                <div class="form-inline">
                                    <select class="form-control" style="width:45%" name="dateMonth" data-paycomet="dateMonth">
                                        <option>MM</option>
                                        <option value="01">01 - January</option>
                                        <option value="02">02 - February</option>
                                        <option value="03">03 - March</option>
                                        <option value="04">04 - April</option>
                                        <option value="05">05 - May</option>
                                        <option value="06">06 - June</option>
                                        <option value="07">07 - July</option>
                                        <option value="08">08 - August</option>
                                        <option value="09">09 - September</option>
                                        <option value="10">10 - October</option>
                                        <option value="11">11 - November</option>
                                        <option value="12">12 - December</option>
                                    </select>
                                    <span style="width:10%; text-align: center"> / </span>
                                    <select class="form-control" style="width:45%" name="dateYear" data-paycomet="dateYear">
                                        <option>YY</option>
                                        <option value="23">2023</option>
                                        <option value="24">2024</option>
                                        <option value="25">2025</option>
                                        <option value="26">2026</option>
                                        <option value="27">2027</option>
                                        <option value="28">2028</option>
                                        <option value="29">2029</option>
                                        <option value="30">2030</option>
                                        <option value="31">2031</option>
                                        <option value="32">2032</option>
                                        <option value="33">2033</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV</label>
                                <input name="cvc2" paycomet-name="cvc2" paycomet-style="border:0px; width: 100%; height: 21px; font-size:12px; padding-left:7px; padding-tap:8px;" paycomet-placeholder="CVV2" class="form-control" required="" type="text">
                            </div> <!-- form-group.// -->
                        </div>

                    </div> <!-- row.// -->
                    <button class="subscribe btn btn-primary btn-block" type="submit"> Confirm </button>
                </form>
                <div id="paymentErrorMsg">
                </div>
            </div> <!-- card-body.// -->
        </article> <!-- card.// -->
    </div>
@endsection
@section('script-content')
    <script src="https://api.paycomet.com/gateway/paycomet.jetiframe.js?lang=es"></script>
@endsection
