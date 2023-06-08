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
    <form method="POST" action="/payment">
        @csrf
        <div class="tab-content" id="stepsTabContent">
            <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
                <div class="form-subtitle">1. {{ $courseName }}</div>
                <div class="inline-el-holder">
                    <div class="inline-el">
                        <div class="rad-with-details">
                            <input type="radio" id="rad1" name="rad" required checked><label for="rad1"></label>
                            <div class="more-info">EU {{ $coursePrice }}</div>
                            <input type="hidden" name="price" value="{{ $coursePrice }}" />
                            <input type="hidden" name="quantity" value="1" />
                            <input type="hidden" name="currency" value="EU" />
                            <input type="hidden" name="course_id" value="{{ $courseId }}" />
                        </div>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="form-subtitle">2. Enter payment details</div>
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
                <!--
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
            <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                <div class="form-subtitle">3. Confirm your personal information</div>
                <input type="text" name="user_name" class="form-control" placeholder="Full name" required>
                <input type="text" name="user_email" class="form-control" placeholder="Email address" required>
                <input type="password" name="user_password" class="form-control" placeholder="Password" required>
                <div class="form-button">
                    <button id="submit" type="submit" class="ibtn">Process payment</button>
                </div>
            </div>
        </div>
    </form>
@endsection
