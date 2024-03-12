@extends('client.layouts.master')

@section('content')
<div class="main-content main-content-checkout">
    <div class="container">
        <div class="checkout-wrapp">
            <div class="end-checkout-wrapp">
                <div class="end-checkout checkout-form">
                    <div class="icon">
                    </div>
                    <h3 class="title-checkend">
                        Congratulation! Your order has been processed.
                    </h3>
                    <div class="sub-title">
                        Aenean dui mi, tempus non volutpat eget, molestie a orci.
                        Nullam eget sem et eros laoreet rutrum.
                        Quisque sem ante, feugiat quis lorem in.
                    </div>
                    <a href={{ route('home.home') }} class="button btn-return">Return to Store</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
