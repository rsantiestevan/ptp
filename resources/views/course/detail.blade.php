@extends('template.master')
@section('form-content')
<h3 class="form-title"></h3>
<div class="events__body__item">
    <div class="events__body__item__head">
        <input class="coursetitle" name="coursetitle" type="hidden" value="{{ $courseName }}">
        <h4 class="events__body__item__body__header__small" style="color: #00817d">{{ $courseName }}</h4>
        <div class="events__body__item__head__image" style="background-image: url({{ $courseImage }})">
            <img src="{{ $courseImage }}">
        </div>
        <hr class="events__body__item__hr">
    </div>
    <hr class="events__body__item__hr">
    <p class="events__body__item__body__copy">
        {{ $courseDetail }}
    </p>
    <a class="ibtn" href="/payment/{{ $courseId }}">Pay Now</a>
</div>

@endsection
