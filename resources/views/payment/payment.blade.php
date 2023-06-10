@extends('template.master')
@section('form-content')
    <h3 class="form-title">You’re almost there</h3>
    <ul class="nav nav-tabs" id="stepsTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="step1-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true">Step1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="step2-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="false">Step2</a>
        </li>
    </ul>
    <form role="form" id="paycometPaymentForm"  method="POST" action="/payment">
        @csrf
        <div class="tab-content" id="stepsTabContent">
            <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
                <div class="form-subtitle">1. {{ $courseName }}</div>
                <div class="inline-el-holder">
                    <div class="inline-el">
                        <div class="rad-with-details">
                            <input type="radio" id="rad1" name="rad" checked><label for="rad1"></label>
                            <div class="more-info">EU {{ $coursePrice }}</div>
                            <input type="hidden" name="amount" value="{{ $coursePrice }}">
                            <input type="hidden" name="price" value="{{ $coursePrice }}" />
                            <input type="hidden" name="quantity" value="1" />
                            <input type="hidden" name="currency" value="EU" />
                            <input type="hidden" name="course_id" value="{{ $courseId }}" />
                            <input type="hidden" name="pay_jet_ID" data-paycomet="jetID" value="{{ $payJetID }}">
                        </div>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="form-subtitle">2. Enter payment details</div>
                <div class="form-group">
                    <label for="username">Full name (on the card)</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="username" data-paycomet="cardHolderName" placeholder="" required="">
                    </div> <!-- input-group.// -->
                </div> <!-- form-group.// -->

                <div class="form-group">
                    <label for="cardNumber">Card number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                        </div>
                        <div id="paycomet-pan" style="padding:0px; height:36px;"></div>
                        <input paycomet-style="width: 100%; height: 21px; font-size:14px; padding-left:7px; padding-top:8px; border:0px;" paycomet-name="pan" paycomet-placeholder="Introduce tu tarjeta...">
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
                            <label data-toggle="tooltip" title=""
                                   data-original-title="3 digits code on back side of the card">CVV <i
                                    class="fa fa-question-circle"></i></label>
                            <div id="paycomet-cvc2" style="height: 36px; padding:0px;"></div>
                            <input paycomet-name="cvc2" paycomet-style="border:0px; width: 100%; height: 21px; font-size:12px; padding-left:7px; padding-tap:8px;" paycomet-placeholder="CVV2" class="form-control" required="" type="text">
                        </div> <!-- form-group.// -->
                    </div>
                    <!--
                    <label>Card number</label>
                    <div class="input-with-ccicon">
                        <input type="text" name="card_number" class="form-control input-credit-card" placeholder="1234 1234 1234 1234" required>
                        <i id="ccicon"></i>
                    </div>
                    <div class="inline-el-holder">
                        <div class="inline-el">
                            <label>Expiry date</label>
                            <input type="text" name="card_expiry" class="form-control sm-content" placeholder="MM/YY" required>
                        </div>
                        <div class="inline-el">
                            <label>CVV</label>
                            <input type="text" name="card_cvv" class="form-control sm-content" placeholder="123" required>
                        </div>
                    </div>
                    <div class="inline-el-holder">
                        <div class="inline-el">
                            <label>Country</label>
                            <input type="text" class="form-control" placeholder="Bahrain">
                        </div>
                        <div class="inline-el">
                            <label>Billing ZIP</label>
                            <input type="text" class="form-control sm-content" placeholder="12345">
                        </div>
                    </div>
                    -->
                <div class="form-button text-right">
                    <button id="btn-next" class="ibtn btn-tab-next">Next</button>
                </div>
            </div>
            </div>
            <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                <div class="form-subtitle">3. Confirm your personal information</div>
                <input type="text" name="user_name" class="form-control" placeholder="Full name" required>
                <input type="text" name="user_email" class="form-control" placeholder="Email address" required>
                <input type="password" name="user_password" class="form-control" placeholder="Password" required>
                <div class="form-button">
                    <button id="submit" type="submit" class="ibtn">Process payment</button>
                </div>
                <div id="paymentErrorMsg">
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script-content')
    <script src="https://api.paycomet.com/gateway/paycomet.jetiframe.js?lang=es"></script>
@endsection
