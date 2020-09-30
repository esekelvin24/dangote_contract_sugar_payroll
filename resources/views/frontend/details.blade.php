@extends('../layouts.frontend')

@section('title-name')
Product Details: {{$product_collection[0]->product_name}}
@endsection

@section('required_css')
@endsection


@section('content')
    @csrf
    <!--Breadcrumb Section Start-->
    <section id="breadcrumb" >
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
                            <li class="active">{{$product_collection[0]->product_name}}</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--Breadcrumb Section End-->
@foreach($product_collection as $product)
    <section id="single-product-wide" class="page-holder full-width">
        <div class="container">
            <div class="col-xs-12">
                <div id="single-product" class="row">
                    <div class="no-margin col-xs-12 col-sm-5 gallery-holder">
                        <div class="product-item-holder size-big single-product-gallery small-gallery">
                            <div class="icon-holder small">
                                <i class="fa fa-search-plus"></i>
                                <span class="triangle"></span>
                            </div>

                            <div class="single-product-slider">
                                <div class="single-product-gallery-item" id="num1">
                                    <a data-rel="prettyphoto" href="{{asset("uploads/$product->main_image")}}">
                                        <img class="lazy {{$product->product_id}}" alt="" src="{{asset("uploads/$product->main_image")}}" />
                                    </a>
                                </div>

                                <?php
                                if($product->images!=NULL)
                                {
                                    $f=2;
                                    $other_pic_array=explode(';',$product->images);
                                    foreach($other_pic_array as $other_pic)
                                    {
                                  ?>
                                <div class="single-product-gallery-item" id="num{{$f}}">
                                    <a data-rel="prettyphoto" href="{{asset("uploads/$other_pic")}}">
                                        <img class="lazy" alt="" src="{{asset("uploads/$other_pic")}}" />
                                    </a>
                                </div>
                                <?php
                                    $f++;
                                   }
                                }
                                ?>

                            </div>


                            <div class="gallery-thumbs">


                                <ul>
                                    <li class="active">
                                        <a class="horizontal-thumb" href="#num1">
                                            <img class="lazy" alt="" src="{{asset("uploads/$product->main_image")}}" />
                                        </a>
                                    </li>

                                    <?php
                                    if($product->images!=NULL)
                                    {
                                        $f=2;
                                        $other_pic_array=explode(';',$product->images);
                                        foreach($other_pic_array as $other_pic)
                                        {
                                            ?>
                                    <li>
                                        <a class="horizontal-thumb " href="#num{{$f}}">
                                            <img class="lazy" alt="" src="{{asset("uploads/$other_pic")}}" />
                                        </a>
                                    </li>
                                    <?php
                                    $f++;
                                      }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="no-margin col-xs-12 col-sm-7 body-holder">
                        <div class="body">
                            <h3>{{$product->product_name}}</h3>
                            <div class="desc">
                                <p>
                                    {{$product->description}}
                                </p>
                            </div>


                            <div class="price">
                                <div class="price-current">
                                    <span class="currency">&#8358;</span>{{number_format($product->on_sale?$product->sale_amount:$product->amount,0)}}
                                </div>
                                @if($product->on_sale)
                                    <div class="price-old">
                                        <span class="currency">&#8358;</span>{{number_format($product->amount,0)}}
                                    </div>
                                @endif
                            </div>

                            <div class="buttons-holder">

                                {{--<select class="variation-btn inline selectpicker capital" title="Size"  data-width="70px" data-style="btn-inverse">
                                    <option>39</option>
                                    <option>40</option>
                                    <option>41</option>
                                    <option>42</option>
                                    <option>43</option>
                                </select>--}}

                                <div class="inline qnt-holder">
                                    <div class="le-quantity">
                                        <form>
                                            <a class="minus" href="#reduce"></a>
                                            <input name="quantity" readonly="readonly" type="text" value="1" />
                                            <a class="plus" href="#add"></a>
                                        </form>
                                    </div>
                                </div>

                                <div class="merged-buttons">
                                    <button data-which="{{$product->product_id}}" class="btn-add-to-cart le-btn btn-iconic ">Add to cart</button>
                                </div>
                            </div>


                            <div class="social-row">
                                <span class="st_facebook_hcount" ></span>
                                <span class="st_twitter_hcount"></span>
                                <span class="st_pinterest_hcount" ></span>
                            </div>
                        </div>
                    </div>

                </div>

                @if($product->description!=NULL)
                <section class="section-review-comment">
                    <div class="tabbable tabs-left">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 no-margin">
                                <ul class="nav nav-tabs ">
                                    <li><a href="#description" data-toggle="tab">description</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-8 no-margin ">
                                <!-- Tab panes -->
                                <div class="tab-content ">
                                    <div class="tab-pane active" id="description">
                                        <h3>Description</h3>
                                        <hr>
                                        <p>
                                            {{$product->description}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @endif
            </div>
        </div>
    </section>
@endforeach

@endsection

@section('required_js')
@endsection

@section('additional_js')
    <script>
        $('button.btn-add-to-cart').on('click', function (e) {
            e.preventDefault();
            var product_id=$(this).data('which');
            var $this=$(this);
            qtyy=$("input[name='quantity']").val();

            var toks = $("input[name='_token']").val();
            $.ajax(
                {
                    type: "POST",
                    data: {
                        product_id,
                        qty:qtyy,
                        _token: toks,
                    },
                    url: "{{route('addItem')}}",
                    cache: false,
                    beforeSend: function () {
                        $(`div#single-product`).block({message:'Adding item to cart'});
                    },
                    success: function (r) {
                        $(`div#single-product`).unblock();
                        $('span.item-count').text(r.split('/')[0]);
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
        //Quantity element
        $('.le-quantity a').click(function(e){

            e.preventDefault();
            var currentQty= $(this).parent().parent().find('input').val();

            if( $(this).hasClass('minus') && currentQty>0 && parseInt(currentQty)-1 != 0 ){
                $(this).parent().parent().find('input').val(parseInt(currentQty)-1);
            }else{

                if( $(this).hasClass('plus')){

                    $(this).parent().parent().find('input').val(parseInt(currentQty)+1);
                }
            }

        });
    </script>
@endsection
