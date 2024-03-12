@extends('client.layouts.master')

@section('content')
    <div class="site-content">
        <main class="site-main  main-container no-sidebar">
            <div class="container">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="">
                                <span>
                                    Home
                                </span>
                            </a>
                        </li>
                        <li class="trail-item trail-end active">
                            <span>
                                Shopping Cart
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="main-content-cart main-content col-sm-12">
                        <h3 class="custom_blog_title">
                            Shopping Cart
                        </h3>
                        <div class="page-main-content">
                            <div class="shoppingcart-content">
                                <div class="cart-form">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-remove"></th>
                                                <th class="product-thumbnail"></th>
                                                <th class="product-name"></th>
                                                <th class="product-price"></th>
                                                <th class="product-quantity"></th>
                                                <th class="product-subtotal"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartItems as $item)
                                            <tr class="cart_item">
                                                <td class="product-remove">
                                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="remove" onclick="return confirm('Are you sure?')">Remove</button>
                                                    </form>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="#">
                                                        <img src={{ $item->product->thumbnail_url }} alt="img"
                                                            class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                    </a>
                                                </td>
                                                <td class="product-name" data-title="Product">
                                                    <a href="#" class="title">{{ $item->product->name }}</a>
                                                </td>
                                                <td class="product-quantity" data-title="Quantity">
                                                    <div class="quantity">
                                                        <div class="control">
                                                            <input type="text" data-step="1" data-min="0"
                                                                value={{ $item->quantity }} title="Qty" class="input-qty qty"
                                                                size="4" disabled>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product-price" data-title="Price">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol">
                                                            $
                                                        </span>
                                                        {{ $item->product->price }}
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                                <div class="control-cart">
                                    <a href={{route('home.home')}} class="button btn-continue-shopping">
                                        Continue Shopping
                                    </a>
                                    @if ($cartItems->count() > 0)
                                    <a href={{route('checkout.show')}} class="button btn-cart-to-checkout">
                                        Checkout
                                    </a>
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
