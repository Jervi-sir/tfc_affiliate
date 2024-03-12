@extends('client.layouts.master')

@section('content')
<div>
<div class="fullwidth-template">
    {{--
        @include('client.home.homeSlide', ['trendyProducts' => $trendyProducts])
    --}}
    @include('client.home.dealday', ['products' => $products])

    {{--
        @include('client.home.banner')

        @include('client.home.tab')
    --}}

    <div class="teamo-iconbox-wrapp default">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="teamo-iconbox default">
                        <div class="iconbox-inner">
                            <div class="icon">
                                <span class="flaticon-delivery-truck"></span>
                            </div>
                            <div class="content">
                                <h4 class="title">
                                    Free Delivery On order over $90.00
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
