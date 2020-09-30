@extends('../layouts.frontend')

@section('title-name')
Jenny's World : Our Products
@endsection

@section('required_css')
@endsection


@section('content')
    @csrf
    <!--Breadcrumb Section-->
    <section id="breadcrumb">
        <div class="container">
            <div class="le-breadcrumb inline">
                <div class="iconic-nav-bar">
                    <div class="icon-holder">
                        <i class="fa fa-chain"></i>
                        <span class="triangle"></span>
                    </div>
                    <div class="bar">
                        <ul>
                            <li><a href="{{route('home')}}">homepage</a></li>
                            <li><a href="{{route('shop')}}">products</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Breadcrumb Section End-->

    @if(!$products_collection->isEmpty())
        <section id="products-grid-sidebar" class="section-products-grid">
            <div class="container">
                <div class="col-xs-12 col-md-3">
                    <div class="sidebar">
                       <div class="price-filter widget" >
                            <div class="icon-holder small">
                                <i class="fa fa-dollar"></i>
                                <span class="triangle"></span>
                            </div>
                            <h2>price filter</h2>
                            <div class="price-range-holder">
                                <input type="text" class="price-slider" value="" >
                                <span class="min-max">Price: N<span class="p1">500</span> - N<span class="p2">50000</span></span>
                                <span class="filter-button">
                                    <form action="{{route('shop_filter_price')}}" method="post">
                                    @csrf
                                     <input type="hidden" name="min_price" value="500">
                                     <input type="hidden" name="max_price" value="50000">
                                    <button class="btn btn-success btn-sm filter" style="color: white">filter</button>
                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-9 ">
                    {{--<div class="row">
                        <div class="mosaic-holder col-xs-12">
                            <div class="mosaic-banner big  ">
                                <img alt="" src="{{asset('assets/images/banner1.jpg')}}" />
                                <div class="caption ">
                                    <h1 >
                                        <span class="light ">Give your skin a lift!</span><br>
                                        Browse through our store
                                    </h1>
                                </div>


                            </div>
                        </div>
                    </div>--}}
                    <div class="controller-nav-bar row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <select class="ctrl-item selectpicker capital"   data-style="btn-inverse">
                                <option @if(isset($type) && $type=="asc"){{"selected"}}@endif value="asc">sort by price - Ascending</option>
                                <option @if(isset($type) && $type=="desc"){{"selected"}}@endif value="desc">sort by price - Descending</option>
                            </select>
                        </div>
                    </div>

                    <div class="product-grid tab-content">
                        <!--grid view starts here-->

                        <div id="grid-view" class="tab-pane active">
                            <div  class="products-holder simple-grid">
                                <div class="row ">
                                    @foreach($products_collection as $product)
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
                                            <div class="product-item" id="{{$product->product_id}}">
                                                <div class="head">
                                                    @if($product->on_sale)
                                                        <div class="le-ribbon red right"><span>sale!</span></div>
                                                    @endif
                                                    <div class="thumb">
                                                        <a href="{{route('details',$product->product_id)}}">
                                                        <img width="433px" height="325px" class="{{$product->product_id}}" alt="" src="{{asset("uploads/$product->main_image")}}" />
                                                        </a>
                                                    </div>

                                                    <div class="price">
                                                        @if($product->on_sale)
                                                        <div class="price-old">
                                                            <span class="currency">&#8358;</span>{{$product->amount}}
                                                        </div>
                                                        @endif
                                                        <div class="price-current">
                                                            <span class="currency">&#8358;</span>{{number_format($product->on_sale?$product->sale_amount:$product->amount,0)}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="body">
                                                    <h3><a href="{{route('details',$product->product_id)}}">{{$product->product_name}}</a></h3>
                                                    <div class="merged-buttons">
                                                        <button data-which="{{$product->product_id}}" class="btn-add-to-cart le-btn btn-iconic">Add to cart</button>
                                                        <button data-where="{{route('details',$product->product_id)}}" class="details btn-add-to-wishlist le-btn btn-iconic">View</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="pagination-wrapper space-50">
                                    {{$products_collection->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section id="products-grid-sidebar" class="section-products-grid">
            <div class="container">
                <div class="row">
                    @if(isset($from_price))
                    No Products found within the selected price range.
                    @elseif(isset($from_cat))
                    No Products found for selected category
                    @else
                    No Products added yet, check back later.
                    @endif
                </div>
            </div>
        </section>
    @endif
@endsection


@section('additional_js')
    <script>
        var r="{{route('shop_filter_price_order')}}";
        $('button.details').on('click', function (e) {
            var whr=$(this).data('where');
            window.location.href=whr;
        });
        $('button.btn-add-to-cart').on('click', function (e) {
            e.preventDefault();
            //Let's save request in session array first
            var product_id=$(this).data('which');
            //var product_amount=$(this).data('amount');
            var toks = $("input[name='_token']").val();
            $.ajax(
                {
                    type: "POST",
                    data: {
                        product_id,
                        // product_amount,
                        qty:1,
                        _token: toks,
                    },
                    url: "{{route('addItem')}}",
                    cache: false,
                    beforeSend: function () {
                        $(`div#${product_id}`).block({message:'Adding item to cart'});
                    },
                    success: function (r) {
                        $(`div#${product_id}`).unblock();
                        $('span.item-count').text(r.split('/')[0]);
                        //$('span.total-price').text('N'.r.split('/')[1]);
                        var cart = $('a.cart_add_effect');
                        var new_position=cart.offset();
                        $('html, body').stop().animate({ scrollTop: new_position.top }, 800);
                        var imgtodrag = $('img.'+product_id);
                        if (imgtodrag) {
                            var imgclone = imgtodrag.clone()
                                .offset({
                                    top: imgtodrag.offset().top,
                                    left: imgtodrag.offset().left
                                })
                                .css({
                                    'opacity': '0.5',
                                    'position': 'absolute',
                                    'height': '150px',
                                    'width': '150px',
                                    'z-index': '100'
                                })
                                .appendTo($('body'))
                                .animate({
                                    'top': cart.offset().top + 10,
                                    'left': cart.offset().left + 10,
                                    'width': 75,
                                    'height': 75
                                }, 1000, 'easeInOutExpo');

                            setTimeout(function () {
                                cart.effect("shake", {
                                    times: 3
                                }, 1000);
                            }, 1500);

                            imgclone.animate({
                                'width': 0,
                                'height': 0
                            }, function () {
                                $(this).detach();
                                $.notify("Item has been added to cart successfully",
                                    {
                                        className:'success',
                                        clickToHide: false,
                                        autoHide: true,
                                        globalPosition: 'bottom center'
                                    }
                                );
                                //swal('Awesome!','Item has been added to cart successfully','success');
                            });
                        }


                    }
                });



        });
        if ($('.price-slider').length > 0) {
            $('.price-slider').slider({
                min: 500,
                max: 50000,
                step: 500,
                value: [500, 50000],
                handle: 'square'
            }).on('slide',function (ev) {
                $("span.p1").text(ev.value[0]);
                $("input[name='min_price']").val(ev.value[0]);
                $("span.p2").text(ev.value[1]);
                $("input[name='max_price']").val(ev.value[1]);
            })
        };
        $('select.capital').change(function(){
            var order_type=$(this).val();
            window.location.replace(`${r}/${order_type}`);
        });
    </script>
@endsection
