<header class="header style7">
    @if(session('affiliate_id'))
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <div class="header-message">
                    You are under an affiliate mode
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="container">
        <div class="main-header">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                    <div class="logo">
                        <a href="index.html">
                            <img src={{ asset("assets/images/logo.png")}} alt="img">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
                    <div class="block-search-block">
                        <form action="{{ route('search.results') }}" method="GET" class="form-search form-search-width-category">
                            @csrf
                            <div class="form-content">
                                <div class="inner">
                                    <input type="text" class="input" name="query" value=""
                                        placeholder="Search here" required>
                                </div>
                                <button class="btn-search" type="submit">
                                    <span class="icon-search"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 col-ts-12">
                    <div class="header-control">
                        @auth
                        @php
                                $user = auth()->user(); // Or any method you use to get the specific user

                                $cartItems = $user->carts()->with('product')->where('status', 'unpaid')->get();

                                $totalPrice = $cartItems->reduce(function ($carry, $item) {
                                    return $carry + ($item->quantity * $item->product->price);
                                }, 0);
                        @endphp
                        <div class="block-minicart teamo-mini-cart block-header teamo-dropdown">
                            <span>$ {{ $totalPrice }}</span>
                        </div>
                        <div class="block-minicart teamo-mini-cart block-header teamo-dropdown">
                            <a href={{ route('cart.show') }} class="shopcart-icon" {{--data-teamo="teamo-dropdown"--}}>
                                Cart
                                <span class="count">

                                </span>
                            </a>
                            <div class="shopcart-description teamo-submenu">
                                <div class="content-wrap">
                                    <h3 class="title">Shopping Cart</h3>
                                    <ul class="minicart-items">
                                        <li class="product-cart mini_cart_item">
                                            <a href="#" class="product-media">
                                                <img src="assets/images/item-minicart-1.jpg" alt="img">
                                            </a>
                                            <div class="product-details">
                                                <h5 class="product-name">
                                                    <a href="#">European Pan Palm</a>
                                                </h5>
                                                <div class="variations">
                                                    <span class="attribute_color">
                                                        <a href="#">Black</a>
                                                    </span>
                                                    ,
                                                    <span class="attribute_size">
                                                        <a href="#">300ml</a>
                                                    </span>
                                                </div>
                                                <span class="product-price">
                                                    <span class="price">
                                                        <span>$45</span>
                                                    </span>
                                                </span>
                                                <span class="product-quantity">
                                                    (x1)
                                                </span>
                                                <div class="product-remove">
                                                    <a href=""><i class="fa fa-trash-o"
                                                            aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="product-cart mini_cart_item">
                                            <a href="#" class="product-media">
                                                <img src="assets/images/item-minicart-2.jpg" alt="img">
                                            </a>
                                            <div class="product-details">
                                                <h5 class="product-name">
                                                    <a href="#">Soap Ferns Solutions</a>
                                                </h5>
                                                <div class="variations">
                                                    <span class="attribute_color">
                                                        <a href="#">Black</a>
                                                    </span>
                                                    ,
                                                    <span class="attribute_size">
                                                        <a href="#">300ml</a>
                                                    </span>
                                                </div>
                                                <span class="product-price">
                                                    <span class="price">
                                                        <span>$45</span>
                                                    </span>
                                                </span>
                                                <span class="product-quantity">
                                                    (x1)
                                                </span>
                                                <div class="product-remove">
                                                    <a href=""><i class="fa fa-trash-o"
                                                            aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="product-cart mini_cart_item">
                                            <a href="#" class="product-media">
                                                <img src="assets/images/item-minicart-3.jpg" alt="img">
                                            </a>
                                            <div class="product-details">
                                                <h5 class="product-name">
                                                    <a href="#">Ferns Solutions Soap</a>
                                                </h5>
                                                <div class="variations">
                                                    <span class="attribute_color">
                                                        <a href="#">Black</a>
                                                    </span>
                                                    ,
                                                    <span class="attribute_size">
                                                        <a href="#">300ml</a>
                                                    </span>
                                                </div>
                                                <span class="product-price">
                                                    <span class="price">
                                                        <span>$45</span>
                                                    </span>
                                                </span>
                                                <span class="product-quantity">
                                                    (x1)
                                                </span>
                                                <div class="product-remove">
                                                    <a href=""><i class="fa fa-trash-o"
                                                            aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="subtotal">
                                        <span class="total-title">Subtotal: </span>
                                        <span class="total-price">
                                            <span class="Price-amount">
                                                $135
                                            </span>
                                        </span>
                                    </div>
                                    <div class="actions">
                                        <a class="button button-viewcart" href="shoppingcart.html">
                                            <span>View Bag</span>
                                        </a>
                                        <a href="checkout.html" class="button button-checkout">
                                            <span>Checkout</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endauth
                        @guest
                        <div class="block-account block-header teamo-dropdown">
                            <a href={{ route('login') }} {{--data-teamo="teamo-dropdown"--}}>
                                <span class="flaticon-user"></span>
                            </a>
                            <div class="header-account teamo-submenu">
                                <div class="header-user-form-tabs">
                                    <ul class="tab-link">
                                        <li class="active">
                                            <a data-toggle="tab" aria-expanded="true"
                                                href="#header-tab-login">Login</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" aria-expanded="true"
                                                href="#header-tab-rigister">Register</a>
                                        </li>
                                    </ul>
                                    <div class="tab-container">
                                        <div id="header-tab-login" class="tab-panel active">
                                            <form method="post" class="login form-login">
                                                <p class="form-row form-row-wide">
                                                    <input type="email" placeholder="Email" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="password" class="input-text" placeholder="Password">
                                                </p>
                                                <p class="form-row">
                                                    <label class="form-checkbox">
                                                        <input type="checkbox" class="input-checkbox">
                                                        <span>
                                                            Remember me
                                                        </span>
                                                    </label>
                                                    <input type="submit" class="button" value="Login">
                                                </p>
                                                <p class="lost_password">
                                                    <a href="#">Lost your password?</a>
                                                </p>
                                            </form>
                                        </div>
                                        <div id="header-tab-rigister" class="tab-panel">
                                            <form method="post" class="register form-register">
                                                <p class="form-row form-row-wide">
                                                    <input type="email" placeholder="Email" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="password" class="input-text" placeholder="Password">
                                                </p>
                                                <p class="form-row">
                                                    <input type="submit" class="button" value="Register">
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endguest
                        <a class="menu-bar mobile-navigation menu-toggle" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav-container rows-space-20">
        <div class="container">
            <div class="header-nav-wapper main-menu-wapper">
                {{--
                <div class="vertical-wapper block-nav-categori">
                    <a href={{ route('home.home') }}  class="block-title">
                        <span class="icon-bar">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="text">Home</span>
                    </a>
                    <div class="block-content verticalmenu-content">
                        <ul class="teamo-nav-vertical vertical-menu teamo-clone-mobile-menu">
                            <li class="menu-item">
                                <a href="#" class="teamo-menu-item-title" title="New Arrivals">New Arrivals</a>
                            </li>
                            <li class="menu-item">
                                <a title="Hot Sale" href="#" class="teamo-menu-item-title">Hot Sale</a>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a title="Accessories" href="#" class="teamo-menu-item-title">Accessories</a>
                                <span class="toggle-submenu"></span>
                                <ul role="menu" class=" submenu">
                                    <li class="menu-item">
                                        <a title="Audio" href="#" class="teamo-item-title">Audio</a>
                                    </li>
                                    <li class="menu-item">
                                        <a title="Cacti" href="#" class="teamo-item-title">Cacti</a>
                                    </li>
                                    <li class="menu-item">
                                        <a title="New Arrivals" href="#" class="teamo-item-title">New
                                            Arrivals</a>
                                    </li>
                                    <li class="menu-item">
                                        <a title="Accessories" href="#"
                                            class="teamo-item-title">Accessories</a>
                                    </li>
                                    <li class="menu-item">
                                        <a title="Storage" href="#" class="teamo-item-title">Storage</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a title="Cacti" href="#" class="teamo-menu-item-title">Cacti</a>
                            </li>
                            <li class="menu-item">
                                <a title="Palms" href="#" class="teamo-menu-item-title">Palms</a>
                            </li>
                            <li class="menu-item">
                                <a title="Ferns" href="#" class="teamo-menu-item-title">Ferns</a>
                            </li>
                            <li class="menu-item">
                                <a title="Hanging plants" href="#" class="teamo-menu-item-title">Hanging
                                    plants</a>
                            </li>
                            <li class="menu-item">
                                <a title="Variegated" href="#" class="teamo-menu-item-title">Variegated</a>
                            </li>
                        </ul>
                    </div>
                </div>
                --}}
                <div class="header-nav">
                    <div class="container-wapper">
                        <ul class="teamo-clone-mobile-menu teamo-nav main-menu " id="menu-main-menu">
                            <li class="menu-item">
                                <a href={{ route('home.home') }} class="teamo-menu-item-title" title="Home">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href={{ route('cart.show')}} class="teamo-menu-item-title" title="Shop">Cart</a>
                            </li>
                            <li class="menu-item">
                                <a href={{ route('admin.dashboard')}} class="teamo-menu-item-title" title="About">Dashboard</a>
                            </li>
                            <li class="menu-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit" >
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header-device-mobile">
    <div class="wapper">
        <div class="item mobile-logo">
            <div class="logo">
                <a href="#">
                    <img src="assets/images/logo.png" alt="img">
                </a>
            </div>
        </div>
        <div class="item item mobile-search-box has-sub">
            <a href="#">
                <span class="icon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </span>
            </a>
            <div class="block-sub">
                <a href="#" class="close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <div class="header-searchform-box">
                    <form class="header-searchform">
                        <div class="searchform-wrap">
                            <input type="text" class="search-input" placeholder="Enter keywords to search...">
                            <input type="submit" class="submit button" value="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="item mobile-settings-box has-sub">
            <a href="#">
                <span class="icon">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </span>
            </a>
            <div class="block-sub">
                <a href="#" class="close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <div class="block-sub-item">
                    <h5 class="block-item-title">Currency</h5>
                    <form class="currency-form teamo-language">
                        <ul class="teamo-language-wrap">
                            <li class="active">
                                <a href="#">
                                    <span>
                                        English (USD)
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>
                                        French (EUR)
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>
                                        Japanese (JPY)
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <div class="item menu-bar">
            <a class=" mobile-navigation  menu-toggle" href="#">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    </div>
</div>
