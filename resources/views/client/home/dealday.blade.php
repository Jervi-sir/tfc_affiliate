<div class="teamo-product produc-featured rows-space-65">
    <div class="container">
        <h3 class="custommenu-title-blog">
            Search Result
        </h3>
        <div id="bestseller" class="tab-panel active">
            <div class="teamo-product">
                <ul class="row list-products auto-clear equal-container product-grid">
                    @foreach ($products as $index => $item)
                    <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
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
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-count-down">
                                    <div class="teamo-countdown" data-y="2024" data-m="3" data-w="4" data-d="19"
                                         data-h="20" data-i="20" data-s="60"></div>
                                </div>
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
                    </li>
                    @endforeach
                </ul>
                {{-- Pagination links for General Products --}}
                @if ($products->hasPages())
                    <div class="pagination clearfix style2">
                        <div class="nav-link">
                            {{-- Previous Page Link --}}
                            @if ($products->onFirstPage())
                                <span class="page-numbers"><i class="icon fa fa-angle-left" aria-hidden="true"></i></span>
                            @else
                                <a href="{{ $products->previousPageUrl() }}" class="page-numbers"><i class="icon fa fa-angle-left" aria-hidden="true"></i></a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                @if ($page == $products->currentPage())
                                    <span class="page-numbers current">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($products->hasMorePages())
                                <a href="{{ $products->nextPageUrl() }}" class="page-numbers"><i class="icon fa fa-angle-right" aria-hidden="true"></i></a>
                            @else
                                <span class="page-numbers"><i class="icon fa fa-angle-right" aria-hidden="true"></i></span>
                            @endif
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

<style>
    .product-thumb .thumb-inner {
        height: 200px; /* Adjust this value to fit your design */
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-thumb img {
        height: 100%;
        width: auto;
        object-fit: cover; /* This property ensures the image covers the area without stretching */
    }
</style>
