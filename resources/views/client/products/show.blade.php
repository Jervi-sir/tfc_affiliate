@extends('client.layouts.master')

@section('content')
<div class="main-content main-content-details single no-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            {{ $product->name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area content-details full-width col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="site-main">
                    <div class="details-product">
                        <div class="details-thumd">
                            <div class="image-preview-container image-thick-box image_preview_container">
                                <img id="img_zoom" data-zoom-image="assets/images/details-item-1.jpg"
                                     src={{ $product->thumbnail_url }} alt="img">
                                <a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                            {{--
                            <div class="product-preview image-small product_preview">
                                <div id="thumbnails" class="thumbnails_carousel owl-carousel" data-nav="true"
                                     data-autoplay="false" data-dots="false" data-loop="false" data-margin="10"
                                     data-responsive='{"0":{"items":3},"480":{"items":3},"600":{"items":3},"1000":{"items":3}}'>
                                    <a href="#" data-image="assets/images/details-item-1.jpg"
                                       data-zoom-image="assets/images/details-item-1.jpg" class="active">
                                        <img src="assets/images/details-item-1.jpg"
                                             data-large-image="assets/images/details-item-1.jpg" alt="img">
                                    </a>
                                    <a href="#" data-image="assets/images/details-item-2.jpg"
                                       data-zoom-image="assets/images/details-item-2.jpg">
                                        <img src="assets/images/details-item-2.jpg"
                                             data-large-image="assets/images/details-item-2.jpg" alt="img">
                                    </a>
                                    <a href="#" data-image="assets/images/details-item-3.jpg"
                                       data-zoom-image="assets/images/details-item-3.jpg">
                                        <img src="assets/images/details-item-3.jpg"
                                             data-large-image="assets/images/details-item-3.jpg" alt="img">
                                    </a>
                                    <a href="#" data-image="assets/images/details-item-4.jpg"
                                       data-zoom-image="assets/images/details-item-4.jpg">
                                        <img src="assets/images/details-item-4.jpg"
                                             data-large-image="assets/images/details-item-4.jpg" alt="img">
                                    </a>
                                </div>
                            </div>
                            --}}

                        </div>
                        <div class="details-infor">
                            <h1 class="product-title">
                                {{ $product->name }}
                            </h1>
                            <div class="stars-rating">
                                <div class="star-rating">
                                    <span class="star-5"></span>
                                </div>
                                <div class="count-star">
                                    ({{ $product->quantity }})
                                </div>
                            </div>
                            <div class="availability">
                                availability:
                                <a href="#">in Stock</a>
                            </div>
                            <div class="price">
                                <span>$ {{ $product->price }}</span>
                            </div>

                            <div class="group-button">
                                <div class="yith-wcwl-add-to-wishlist">
                                    <div class="yith-wcwl-add-button">
                                        <a href="#">Add to Wishlist</a>
                                    </div>
                                </div>
                                <div class="size-chart-wrapp">
                                    <div class="btn-size-chart">
                                        <a id="size_chart" href="assets/images/size-chart.jpg" class="fancybox">View
                                            Size Chart</a>
                                    </div>
                                </div>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="quantity-add-to-cart">
                                        <div class="quantity">
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="text" name="quantity" data-step="1" min="1" max="{{ $product->quantity }}" value="1" title="Qty"
                                                       class="input-qty qty" size="4">
                                                <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                            </div>
                                        </div>
                                        <button type="submit" class="single_add_to_cart_button button">Add to cart</button>
                                    </div>
                                </form>
                                <form id="generateAffiliateLinkForm" style="margin-top: 20px">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="button" class="btn btn-primary" onclick="generateAffiliateLink()">Generate an Affiliate Link</button>
                                </form>

                                <script>
                                    function generateAffiliateLink() {
                                        $.ajax({
                                            url: "{{ route('affiliate-links.generate') }}",
                                            type: "POST",
                                            data: {
                                                _token: $('input[name="_token"]').val(),
                                                product_id: $('input[name="product_id"]').val(),
                                            },
                                            success: function(response) {
                                                // Display the popup with the link
                                                alert("Your affiliate link: " + response
                                                .link); // Example, replace with your popup implementation

                                                // Copy link to clipboard
                                                navigator.clipboard.writeText(response.link).then(function() {
                                                    console.log('Copying to clipboard was successful!');
                                                }, function(err) {
                                                    console.error('Could not copy text: ', err);
                                                });
                                            },
                                            error: function(xhr, status, error) {
                                                // Handle error
                                                console.error(error);
                                            }
                                        });
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                    <div class="tab-details-product">
                        <ul class="tab-link">
                            <li class="active">
                                <a data-toggle="tab" aria-expanded="true" href="#product-descriptions">Descriptions </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" aria-expanded="true" href="#reviews">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-container">
                            <div id="product-descriptions" class="tab-panel active">
                                {{ $product->description }}
                            </div>
                            <div id="reviews" class="tab-panel">
                                <div class="reviews-tab">
                                    <div class="comments">
                                        <h2 class="reviews-title">
                                            1 review for
                                            <span>Areca palm</span>
                                        </h2>
                                        <ol class="commentlist">
                                            <li class="conment">
                                                <div class="conment-container">
                                                    <a href="#" class="avatar">
                                                        <img src="assets/images/avartar.jpeg" alt="img">
                                                    </a>
                                                    <div class="comment-text">
                                                        <div class="stars-rating">
                                                            <div class="star-rating">
                                                                <span class="star-5"></span>
                                                            </div>
                                                            <div class="count-star">
                                                                (1)
                                                            </div>
                                                        </div>
                                                        <p class="meta">
                                                            <strong class="author">Cobus Bester</strong>
                                                            <span>-</span>
                                                            <span class="time">June 7, 2013</span>
                                                        </p>
                                                        <div class="description">
                                                            <p>Simple and effective design. One of my favorites.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="review_form_wrapper">
                                        <div class="review_form">
                                            <div class="comment-respond">
                                                <span class="comment-reply-title">Add a review </span>
                                                <form class="comment-form-review">
                                                    <p class="comment-notes">
                                                        <span class="email-notes">Your email address will not be published.</span>
                                                        Required fields are marked
                                                        <span class="required">*</span>
                                                    </p>
                                                    <div class="comment-form-rating">
                                                        <label>Your rating</label>
                                                        <p class="stars">
                                        						<span>
                                        							<a class="star-1" href="#"></a>
                                        							<a class="star-2" href="#"></a>
                                        							<a class="star-3" href="#"></a>
                                        							<a class="star-4" href="#"></a>
                                        							<a class="star-5" href="#"></a>
                                        						</span>
                                                        </p>
                                                    </div>
                                                    <p class="comment-form-comment">
                                                        <label>
                                                            Your review
                                                            <span class="required">*</span>
                                                        </label>
                                                        <textarea title="review" id="comment" name="comment" cols="45"
                                                                  rows="8"></textarea>
                                                    </p>
                                                    <p class="comment-form-author">
                                                        <label>
                                                            Name
                                                            <span class="">*</span>
                                                        </label>
                                                        <input title="author" id="author" name="author" type="text"
                                                               value="">
                                                    </p>
                                                    <p class="comment-form-email">
                                                        <label>
                                                            Email
                                                            <span class="">*</span>
                                                        </label>
                                                        <input title="email" id="email" name="email" type="email"
                                                               value="">
                                                    </p>
                                                    <p class="form-submit">
                                                        <input name="submit" type="submit" id="submit" class="submit"
                                                               value="Submit">
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear: left;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
