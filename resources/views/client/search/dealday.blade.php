<div class="teamo-product produc-featured rows-space-65">
    <div class="container">
        <h3 class="custommenu-title-blog">
            Deal of the day
        </h3>
        <div class="owl-products owl-slick equal-container nav-center"
            data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":true, "infinite":false, "speed":800, "rows":1}'
            data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":4}},{"breakpoint":"1200","settings":{"slidesToShow":3}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'>
            @foreach ($products as $index => $item)
            <div class="product-item style-5">
                <div class="product-inner equal-element">
                    <div class="product-top">
                        <div class="flash">
                            <span class="onnew">
                                <span class="text">
                                    new
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="product-thumb">
                        <div class="thumb-inner">
                            <a href={{ route('products.show', ['product' => $item])}}>
                                <img src={{ $item->thumbnail_url }} alt="img">
                            </a>
                            {{--
                            <div class="thumb-group">
                                <div class="yith-wcwl-add-to-wishlist">
                                    <div class="yith-wcwl-add-button">
                                        <a href="#">Add to Wishlist</a>
                                    </div>
                                </div>
                                <a href="#" class="button quick-wiew-button">Quick View</a>
                                <div class="loop-form-add-to-cart">
                                    <button class="single_add_to_cart_button button">Add to cart</button>
                                </div>
                            </div>
                            --}}
                        </div>
                        <div class="product-count-down">
                            <div class="teamo-countdown" data-y="2024" data-m="3" data-w="4" data-d="20"
                                data-h="20" data-i="20" data-s="60"></div>
                        </div>
                    </div>
                    <div class="product-info">
                        <h5 class="product-name product_title">
                            <a href="#">{{ $item->name }}</a>
                        </h5>
                        <div class="group-info">
                            <div class="price">
                                <del>
                                    $ {{ $item->price }}
                                </del>
                                <ins>
                                    $ {{ $item->price - 15}}
                                </ins>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
