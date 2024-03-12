@extends('client.layouts.master')

@section('content')
<div class="main-content main-content-checkout">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            Checkout
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <h3 class="custom_blog_title">
            Checkout
        </h3>
        <div class="checkout-wrapp">
            <form class="payment-method-wrapp" action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <div class="shipping-address-form  checkout-form">
                    <div class="row-col-1 row-col">
                        <div class="shipping-address">
                            <h3 class="title-form">
                                Shipping Address
                            </h3>
                            <p class="form-row form-row-first">
                                <label class="text">First name</label>
                                <input value="firstName" title="first" type="text" class="input-text" required>
                            </p>
                            <p class="form-row form-row-last">
                                <label class="text">Last name</label>
                                <input name="lastName" title="last" type="text" class="input-text" required>
                            </p>
                            <p class="form-row forn-row-col forn-row-col-1">
                                <label class="text">Country</label>
                                <select name="country" title="country" data-placeholder="United Kingdom" class="chosen-select"
                                        tabindex="1">
                                    <option value="Algeria">Algeria</option>
                                </select>
                            </p>
                            <p class="form-row forn-row-col forn-row-col-2">
                                <label class="text">State</label>
                                <select name="wilaya" title="state" data-placeholder="London" class="chosen-select" tabindex="1">
                                    <option value="United States">Ain Temouchent</option>
                                    <option value="United Kingdom">Alger</option>
                                    <option value="Afghanistan">Oran</option>
                                    <option value="Aland Islands">Tlemcen</option>
                                </select>
                            </p>
                            <p class="form-row forn-row-col forn-row-col-3">
                                <label class="text">Zip code</label>
                                <input name="zipCode" title="zip" type="text" class="input-text" required>
                            </p>
                            <div class="payment-method">
                                <p class="form-row form-row-card-number">
                                    <label class="text">Phone Number</label>
                                    <input name="phoneNumber" maxlength="10" type="text" class="input-text" placeholder="xxxx xx xx xx" required>
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="row-col-2 row-col">
                        <div class="your-order">
                            <h3 class="title-form">
                                Your Order
                            </h3>
                            <ul class="list-product-order">
                                {{--
                                <li class="product-item-order">
                                    <div class="product-thumb">
                                        <a href="#">
                                            <img src="assets/images/item-order2.jpg" alt="img">
                                        </a>
                                    </div>
                                    <div class="product-order-inner">
                                        <h5 class="product-name">
                                            <a href="#">3D Dining Chair</a>
                                        </h5>
                                        <span class="attributes-select attributes-color">Black,</span>
                                        <span class="attributes-select attributes-size">XXL</span>
                                        <div class="price">
                                            $45
                                            <span class="count">x1</span>
                                        </div>
                                    </div>
                                </li>
                                --}}
                            </ul>
                            <div class="order-total">
									<span class="title">
										Total Price:
									</span>
                                <span class="total-price">
										$ {{ $totalPrice }}
									</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-control">
                    <a href={{ route('home.home')}} class="button btn-back-to-shipping">Back to shipping</a>
                    <button type="submit" class="button btn-pay-now">Order now</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
