@extends('template.master')
@section('form-content')
    <h3 class="form-title"></h3>
    @foreach ($courses as $course)
        <p>This is user {{ $course['id'] }}</p>
    <div class="events__body__item">
        <div class="events__body__item__head">
            <input class="coursetitle" name="coursetitle" type="hidden" value="{{ $course['name'] }}">
            <h4 class="events__body__item__body__header__small" style="color: #00817d">{{ $course['name'] }} - {{ $course['price'] }} Euros</h4>
            <div class="events__body__item__head__image" >
                <img src="{{ $course['image'] }}">
            </div>
            <hr class="events__body__item__hr">
        </div>
        <p class="events__body__item__body__copy">
            {{ $course['detail'] }}
        </p>
        <a class="ibtn btn btn-light" href="/payment/{{ $course['id'] }}">Pay Now</a>
        <hr class="events__body__item__hr">
    </div>
    @endforeach
@endsection
