<div class="home-slider-banner">
    <div class="container">
        <div class="row10">
            <div class="col-lg-8 silider-wrapp">
                <div class="home-slider">
                    <div class="slider-owl owl-slick equal-container nav-center"
                        data-slick='{"autoplay":true, "autoplaySpeed":9000, "arrows":false, "dots":true, "infinite":true, "speed":1000, "rows":1}'
                        data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1}}]'>

                        @foreach($trendyProducts->take(4) as $product)
                        <div class="slider-item style7">
                            <div class="slider-inner equal-element" style="background-image: url({{ $product->thumbnail_url }})">
                                <div class="slider-infor">
                                    <h5 class="title-small">
                                        Sale up to 40% off!
                                    </h5>
                                    <h3 class="title-big">
                                       $ {{ $product->name }}
                                    </h3>
                                    <div class="price">
                                        New Price:
                                        <span class="number-price">
                                                {{ $product->price }}
                                            </span>
                                    </div>
                                    <a href="#" class="button btn-shop-the-look bgroud-style">Shop now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-4 banner-wrapp">
                @foreach($trendyProducts->take(-2) as $product)
                <div class="banner">
                    <div class="item-banner style7">
                        <div class="inner" style="background-image: url({{ $product->thumbnail_url }})">
                            <div class="banner-content">
                                <h3 class="title">{{ $product->name }}</h3>
                                <a href="#" class="button btn-lets-do-it">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
