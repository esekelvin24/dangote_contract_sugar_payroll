@extends('../layouts.frontend')

@section('title-name')
Jenny's Glow - Shopping Cart
@endsection

@section('required_css')
@endsection

@section('content')
    @csrf
    <!--Breadcrumb Section Start-->
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
                            <li class="active">shopping cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Breadcrumb Section End-->
    @if(isset($_GET['success']))
        <section class="checkout-page space-100">
            <div class="theme-container container">
                <h3 style="text-align: center; color:lightseagreen">Your order completed successfully!</h3>
                <img style="display:block;width:200px; height: 200px; margin:0 auto !important;" src="{{asset('_img/complete.png')}}"/>
                <p style="text-align: center;"> You will be contacted by one of our customer representatives soon</p>
            </div>
        </section>
    @elseif(isset($empty))
        <section class="checkout-page space-100">
            <div class="theme-container container">
                No items added to cart yet
            </div>
        </section>
    @else
        <section id="cart" class="page-holder ">
            <div class="container">
                <div class="row ">
                    <div class="col-xs-12">
                        <div class="shopping-cart-page box">
                            <div class="icon-holder small badge-style">
                                <i class="fa fa-shopping-cart "></i>
                                <span class="triangle"></span>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th class="col-xs-12 col-md-2"></th>
                                        <th class="col-xs-12 col-md-5 hidden-xs">product</th>
                                        <th class="col-xs-12 col-md-2 price-column">price</th>
                                        <th class="col-xs-12 col-md-2">quantity</th>
                                        <th class="col-xs-12 col-md-1 price-column">total</th>
                                        <th class="col-xs-12 col-md-2">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product_Collection as $product)
                                    <tr id="{{$product->product_id}}">
                                        <td>
                                            <div class="thumb">
                                                <a class="media-link" href="{{route('details',$product->product_id)}}"><img style="width:100px !important;height:100px !important;" alt="" src="{{asset("uploads/$product->main_image")}}" /></a>
                                            </div>
                                        </td>
                                        <td class="hidden-xs">
                                            <div class="desc">
                                                <h3><a class="media-link" href="{{route('details',$product->product_id)}}">{{$product->product_name}}</a></h3>
                                                <div class="tag-line hidden-sm hidden-xs" style="text-align: justify">
                                                    {{$product->description}}
                                                </div>
                                                <div class="pid">{{$product->cat_name}}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="font-size: 16px;">
                                                N{{number_format($product->on_sale?$product->sale_amount:$product->amount,0)}}
                                                @if($product->on_sale)
                                                    <br/>
                                                    <del>{{$product->amount}}</del>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="le-quantity">
                                                <form>
                                                    <a class="minus" href="#reduce" data-which="{{$product->product_id}}"  data-amount="{{$product->on_sale?$product->sale_amount:$product->amount}}"></a>
                                                    <input name="quantity{{$product->product_id}}" readonly="readonly" type="text" value="{{$_SESSION['cart'][$product->product_id]}}" />
                                                    <a class="plus" href="#add" data-which="{{$product->product_id}}"  data-amount="{{$product->on_sale?$product->sale_amount:$product->amount}}"></a>
                                                </form>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="price{{$product->product_id}}">
                                                <?php
                                                $qty=$_SESSION['cart'][$product->product_id];
                                                $amt=$product->on_sale?$product->sale_amount:$product->amount;
                                                echo 'N'.number_format($qty*$amt,0);
                                                ?>
                                            </div>
                                        </td>

                                        <td style="padding: 20px !important;">
                                            <div class="delete">
                                                <a data-which="{{$product->product_id}}"  class="close-btn" href="#"></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <style>
                                span.error-message{
                                    color: red;
                                }
                                div.has-error{
                                    border:thin solid red;
                                    border-radius: 8px;
                                }
                            </style>
                            <div class="col-xs-12 col-md-12 shipping_info" style="margin: 10px 0 0 10px; display: none">
                                <div class="box">
                                    <div class="icon-holder small badge-style">
                                        <i class="fa fa-check-circle-o "></i>
                                        <span class="triangle"></span>
                                    </div>
                                    <div class="box-holder">
                                        <h2>contact info</h2>
                                        <div class="table-form ">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-4">
                                                    <div class="field-group">
                                                        <input
                                                                value="@if(isset($_SESSION['shipping_details']) && trim($_SESSION['shipping_details']['name'])!=''){{$_SESSION['shipping_details']['name']}}@endif"
                                                                type="text" name="name" class="le-input" placeholder="Full Name" >
                                                        <span class="error-message"></span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-4">
                                                    <div class="field-group">
                                                        <input
                                                                value="@if(isset($_SESSION['shipping_details']) && trim($_SESSION['shipping_details']['email'])!=''){{$_SESSION['shipping_details']['email']}}@endif"
                                                                type="text" name="email" class="le-input" placeholder="Email Address" >
                                                        <span class="error-message"></span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-4">
                                                    <div class="field-group">
                                                        <input
                                                                value="@if(isset($_SESSION['shipping_details']) && trim($_SESSION['shipping_details']['phone'])!=''){{$_SESSION['shipping_details']['phone']}}@endif"
                                                                type="text" name="phone" class="le-input" placeholder="Phone">
                                                        <span class="error-message"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-holder">
                                        <h2>shipping info</h2>
                                        <div class="table-form ">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-4">
                                                    <div class="field-group">
                                                        <label>address</label>
                                                        <textarea name="address" class="le-input" placeholder="Address Line">@if(isset($_SESSION['shipping_details']) && trim($_SESSION['shipping_details']['address'])!=''){{$_SESSION['shipping_details']['address']}}@endif</textarea>
                                                        <span class="error-message"></span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-4">
                                                    <div class="field-group">
                                                        <label>Country</label>
                                                        <select name="country" class="variation-btn inline selectpicker country" data-width="100%"  data-style=" le-btn no-shadow">
                                                            <option value="" selected>SELECT COUNTRY</option>
                                                            @foreach($country_collection as $country)
                                                                <option
                                                                        @if($country->country_id==162)
                                                                        {{"selected"}}
                                                                        @endif
                                                                        value="{{$country->country_id}}">{{$country->country_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="error-message"></span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-4">
                                                    <div class="field-group">
                                                        <label>State/Province</label>
                                                        <select name="state" class="variation-btn inline selectpicker capital" data-width="100%"  data-style=" le-btn no-shadow">
                                                            <option value="" selected>SELECT STATE</option>
                                                            @foreach($state_collection as $state)
                                                                <option value="{{$state->state_id}}">{{$state->state_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input value="" class="le-input" id="other_country_state" name="other_country_state" style="display: none" type="text" placeholder="Enter name of state/province">
                                                        <span class="error-message"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-form" style="margin-top: 20px">
                                <div class="row">
                                    <div class="col-xs-2 col-md-2 hidden-xs"></div>
                                    <div class="col-xs-2 col-md-2 hidden-xs"></div>
                                    <div class="col-xs-2 col-md-2 hidden-xs"></div>
                                    <div class="col-xs-2 col-md-2 hidden-sm hidden-xs "></div>
                                    <div class="col-xs-6 col-md-2" style="font-size: 16px; color:#0b2e13; text-align: right">
                                        Sub Total
                                    </div>
                                    <div class="col-xs-4 col-md-2 total" style="font-size: 18px; font-weight: bold;" data-total="<?php
                                    $sum=0;
                                    foreach($product_Collection as $p)
                                    {
                                        $qty=$_SESSION['cart'][$p->product_id];
                                        if($p->on_sale){
                                            $sum+=($p->sale_amount * $qty);
                                        }
                                        else{
                                            $sum+=($p->amount * $qty);
                                        }
                                    }
                                    echo $sum;
                                    ?>" >
                                        <?php
                                        $sum=0;
                                        foreach($product_Collection as $p)
                                        {
                                            $qty=$_SESSION['cart'][$p->product_id];
                                            if($p->on_sale){
                                                $sum+=($p->sale_amount * $qty);
                                            }
                                            else{
                                                $sum+=($p->amount * $qty);
                                            }
                                        }
                                        echo 'N '.number_format($sum,0);
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div id="transport" style="margin-top: 20px; display: none">
                                <div class="row">
                                    <div class="col-xs-2 col-md-2 hidden-xs"></div>
                                    <div class="col-xs-2 col-md-2 hidden-xs"></div>
                                    <div class="col-xs-2 col-md-2 hidden-xs"></div>
                                    <div class="col-xs-2 col-md-2 hidden-sm hidden-xs"></div>
                                    <div class="col-xs-6 col-md-2" style="font-size: 16px; color:#0b2e13; text-align: right;">
                                        Transport
                                    </div>
                                    <div class="col-xs-4 col-md-2 transport" style="font-size: 18px; font-weight: bold"></div>
                                </div>
                            </div>

                            @if($vat_collection[0]->value==1)
                            <div id="vat" style="margin-top: 20px; display: none">
                                <div class="row">
                                    <div class="col-xs-2 col-md-2 hidden-xs"></div>
                                    <div class="col-xs-2 col-md-2 hidden-xs"></div>
                                    <div class="col-xs-2 col-md-2 hidden-xs"></div>
                                    <div class="col-xs-2 col-md-2 hidden-sm hidden-xs"></div>
                                    <div class="col-xs-6 col-md-2" style="font-size: 16px; color:#0b2e13; text-align: right;">
                                        VAT ({{$vat_collection[1]->value}}%)
                                    </div>
                                    <div class="col-xs-4 col-md-2 vat" style="font-size: 18px; font-weight: bold"></div>
                                </div>
                            </div>
                            @endif

                            <div id="everything" data-shipping="" class="table-form" style="margin-top: 20px; display: none">
                                <div class="row">
                                    <div class="col-xs-2 col-md-2 hidden-xs"></div>
                                    <div class="col-xs-2 col-md-2 hidden-xs"></div>
                                    <div class="col-xs-2 col-md-2 hidden-xs"></div>
                                    <div class="col-xs-2 col-md-2 hidden-sm hidden-xs"></div>
                                    <div class="col-xs-6 col-md-2" style="font-size: 17px; color:#0b2e13; text-align: right; font-weight: bold">
                                        TOTAL
                                    </div>
                                    <div class="col-xs-4 col-md-2 everything" style="font-size: 22px; font-weight: bold; color: forestgreen"></div>
                                </div>
                            </div>

                            <div class="merged-buttons" style="margin-top: 30px !important;">
                                {{--<a href="{{route('shop')}}" class="le-btn small continue">continue shopping</a>--}}
                                <a href="#" class="le-btn small next">next step</a>
                                <a href="#" class="le-btn small checkout" style="display: none">Make Payment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection


@section('additional_js')
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script id="paystack"></script>
    <script>

        $('a.next').on('click',function(e){
            e.preventDefault();
            $('div.shipping_info').slideDown(800);
            $(this).remove();
            $('a.continue').fadeOut();
            $('a.checkout').fadeIn();
        });
        $('a.close-btn').on('click', function (e) {
            e.preventDefault();
            //Let's save request in sesison array first
            var product_id=$(this).data('which');
            var toks = $("input[name='_token']").val();
            $.ajax(
                {
                    type: "POST",
                    data: {product_id, _token: toks},
                    url: "{{route('remove')}}",
                    cache: false,
                    beforeSend: function () {
                        $(`tr#${product_id}`).block({message:'Removing product from Cart'});
                    },
                    success: function (r) {
                        window.location.reload();
                    }
                });
        });
        //Quantity element
        $('.le-quantity a').click(function(e){
            e.preventDefault();
            var currentQty= $(this).parent().parent().find('input').val();
            var product_id=$(this).data('which');
            var toks = $("input[name='_token']").val();
            var total=$(`div.total`).data('total');
            var amt=$(this).data('amount');

            if( $(this).hasClass('minus') && currentQty>0){
                if((parseInt(currentQty)-1)!=0) {
                    $(this).parent().parent().find('input').val(parseInt(currentQty) - 1);
                    $.ajax({
                        type: "POST",
                        data: {product_id, _token: toks, qty: -1},
                        url: "{{route('addItem')}}",
                        cache: false,
                        beforeSend: function () {
                            $(`tr#${product_id}`).block({message: 'updating Cart'});
                        },
                        success: function (r) {
                            $(`tr#${product_id}`).unblock();
                            $(`div.total`).text('N'+ (parseInt(total) - parseInt(amt)).toString().replace(/\B(?=(\d{3})+(?!\d))/g,",") );
                            $(`div.total`).data('total',parseInt(total) - parseInt(amt));
                            $(`div.price${product_id}`).text('N '+ (parseInt($(`input[name='quantity${product_id}']`).val())* parseInt(amt)).toString().replace(/\B(?=(\d{3})+(?!\d))/g,","));
                            if(  $.trim($('div#everything').data('shipping'))!="") {
                                @if($vat_collection[0]->value==1)
                                    var everything=$('div#everything').data('shipping') +  $(`div.total`).data('total');
                                    var the_vat=parseInt(everything*{{$vat_collection[1]->value/100}});
                                    var everything=$('div#everything').data('shipping') +  $(`div.total`).data('total') + the_vat;
                                    $('div.vat').text( "N "+ the_vat.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") );
                                    $('div.everything').text("N " + everything.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                                    $('div#vat').slideDown();
                                @else
                                    var everything=$('div#everything').data('shipping') +  $(`div.total`).data('total');
                                    var everything=$('div#everything').data('shipping') +  $(`div.total`).data('total');
                                    $('div.everything').text("N " + everything.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                                @endif

                            }

                        }
                    });
                }
            }
            else
            {

                if( $(this).hasClass('plus')){
                    $(this).parent().parent().find('input').val(parseInt(currentQty)+1);
                    $.ajax({
                        type: "POST",
                        data: {product_id, _token: toks,qty:1},
                        url: "{{route('addItem')}}",
                        cache: false,
                        beforeSend: function () {
                            $(`tr#${product_id}`).block({message:'updating Cart'});
                        },
                        success: function (r) {
                            $(`tr#${product_id}`).unblock();
                            $(`div.total`).text('N'+ (parseInt(total) + parseInt(amt)).toString().replace(/\B(?=(\d{3})+(?!\d))/g,",") );
                            $(`div.total`).data('total',parseInt(total) + parseInt(amt));
                            $(`div.price${product_id}`).text('N '+ (parseInt($(`input[name='quantity${product_id}']`).val()) * parseInt(amt)).toString().replace(/\B(?=(\d{3})+(?!\d))/g,","));
                            if( $.trim($('div#everything').data('shipping'))!="") {
                             @if($vat_collection[0]->value==1)
                                    var everything=$('div#everything').data('shipping') +  $(`div.total`).data('total');
                                    var the_vat=parseInt(everything*{{$vat_collection[1]->value/100}});
                                    var everything=$('div#everything').data('shipping') +  $(`div.total`).data('total') + the_vat;
                                    $('div.vat').text( "N "+ the_vat.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") );
                                    $('div.everything').text("N " + everything.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                                    $('div#vat').slideDown();
                             @else
                                var everything=$('div#everything').data('shipping') +  $(`div.total`).data('total');
                                var everything=$('div#everything').data('shipping') +  $(`div.total`).data('total');
                                $('div.everything').text("N " + everything.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                              @endif
                            }
                        }
                    });
                }
            }
        });
        //State Change
        $('body').on('change','select.capital',function(){
            var state_id=$('select.capital').val();
            if($.trim(state_id)){
                var toks = $("input[name='_token']").val();
                $.ajax(
                    {
                        type: "POST",
                        data: {state_id, _token: toks},
                        url: "{{route('get_shipping_fee')}}",
                        cache: false,
                        beforeSend: function () {$(`body`).block({message:'Just a second..acquiring shipping cost'});},
                        error:function(){$('body').unblock()},
                        success: function (r) {
                            r=parseInt(r);
                            $('body').unblock();
                            $('div.transport').text( "N "+ r.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") );
                            var everything= parseInt($('div.total').data('total')) + parseInt(r);
                            @if($vat_collection[0]->value==1)
                                var vat=parseInt(everything*{{$vat_collection[1]->value/100}});
                                var everything= parseInt($('div.total').data('total')) + parseInt(r) + vat;
                                $('div.vat').text( "N "+ vat.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") );
                                $('div#everything').data('shipping',parseInt(r));
                                $('div.everything').text( "N "+ everything.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") );
                                $('div#transport').slideDown();
                                $('div#everything').slideDown();
                                $('div#vat').slideDown();
                            @else
                                var everything= parseInt($('div.total').data('total')) + parseInt(r);
                                $('div#everything').data('shipping',parseInt(r));
                                $('div.everything').text( "N "+ everything.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") );
                                $('div#transport').slideDown();
                                $('div#everything').slideDown();
                            @endif
                        }
                    });
            }
        })
        //country change
        $('body').on('change','select.country',function(){
            var country_id=$(this).val();
            if($.trim(country_id) && country_id!=162){
                $('div.capital').slideUp(500);
                $('input#other_country_state').slideDown(500);
                var toks = $("input[name='_token']").val();
                $.ajax(
                    {
                        type: "POST",
                        data: {country_id, _token: toks},
                        url: "{{route('get_shipping_fee_country')}}",
                        cache: false,
                        beforeSend: function () {$(`body`).block({message:'Just a second..acquiring gloabal shipping cost'});},
                        error:function(){$('body').unblock();},
                        success: function (r) {
                            r=parseInt(r);
                            $('body').unblock();
                            $('div.transport').text( "N "+ r.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") );
                            var everything= parseInt($('div.total').data('total')) + parseInt(r);
                            @if($vat_collection[0]->value==1)
                                var vat=parseInt(everything*{{$vat_collection[1]->value/100}});
                                var everything= parseInt($('div.total').data('total')) + parseInt(r) + vat;
                                $('div.vat').text( "N "+ vat.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") );
                                $('div#everything').data('shipping',parseInt(r));
                                $('div.everything').text( "N "+ everything.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") );
                                $('div#everything').slideDown();
                                $('div#transport').slideDown();
                                $('div#vat').slideDown();
                            @else
                                var everything= parseInt($('div.total').data('total')) + parseInt(r);
                                $('div#everything').data('shipping',parseInt(r));
                                $('div.everything').text( "N "+ everything.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") );
                                $('div#everything').slideDown();
                                $('div#transport').slideDown();
                            @endif
                        }
                    });
            }else{
                $('div.capital').slideDown(500);
                $('input#other_country_state').slideUp(500);
            }
        })
        //final
        $('body').on('click','a.checkout', function (e) {
            e.preventDefault();
            //Let's save request in session array first
            var name=$("input[name='name']").val().replace(/[^a-z\d\s]+/gi, "");
            var email=$("input[name='email']").val();
            var phone=$("input[name='phone']").val().replace(/[^a-z\d\s]+/gi, "");
            var address=$("textarea[name='address']").val().replace(/[^a-z\d\s]+/gi, "");
            var country=$("select[name='country']").val().replace(/[^a-z\d\s]+/gi, "");
            var state=$("select[name='state']").val().replace(/[^a-z\d\s]+/gi, "");
            var _token = $("input[name='_token']").val();
            var other_country_state = $("input[name='other_country_state']").val();


            $.ajax(
                {
                    type: "POST",
                    data: {name, email, phone, address,country,state,_token,other_country_state},
                    url: "{{route('checkout')}}",
                    cache: false,
                    beforeSend: function () {
                        $(`body`).block({message:'Processing order'});
                    },
                    error:function(r){
                        $(`body`).unblock();
                        $('div.has-error').removeClass('has-error');
                        $('span.error-message').html('');
                        const errors = r.responseJSON.errors;
                        $.each(errors,function(index,value)
                        {
                            $(`textarea[name='${index}'],input[name='${index}'],select[name='${index}']`).next('span.error-message').html(''+value);
                            $(`textarea[name='${index}'],input[name='${index}'],select[name='${index}']`).closest('div.field-group').addClass('has-error');
                        });
                        //swal('','','');

                    },
                    success: function (r) {
                        $('div.has-error').removeClass('has-error');
                        $('span.error-message').html('');
                        $(`body`).unblock();
                        $('#paystack').html(r);
                        payWithPaystack();
                    }
                });
        });
    </script>
@endsection
