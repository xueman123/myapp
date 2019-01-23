@extends('layout.home')

@section('title')
<link href="/homes/css/main.min.css" rel="stylesheet" type="text/css">
<link href="/homes/css/main.min(1).css" rel="stylesheet" type="text/css">
<script src="/admins/assets/js/vendor/jquery-2.1.4.min.js"></script>



@section('daohang')


<div class="naver">
    <ul id="naver" class="clearfix">
    	@foreach($daohang as $k => $val)
	    	<li id="zxnav_0" data-id="0">
				<a href="/home/good?plate={{$val->id}}" target="_blank"><span>{{$val->pname}}</span></a>
				<input id="zxnav_0_flag" type="hidden" autocomplete="off" value="yes">
				<input id="zxnav_0_name" type="hidden" autocomplete="off" value="手机">
			</li>
    	@endforeach				
    </ul>
</div>


@endsection

@section('rexiao')
<div class="hr-10"></div>
<div class="g">
    <!--面包屑 -->
    <div class="breadcrumb-area fcn">
        <a href="/" title="首页">
            首页
        </a>
        &nbsp;&gt;&nbsp;
        <a href="/home/good?plate={{$plate->id}}" title="笔记本 &amp; 平板">
            {{$plate->pname}}
        </a>
        &nbsp;&gt;&nbsp;
        <a href="/home/goods/{{$goods['types']->id}}" title="笔记本电脑">
            {{$goods['types']->tname}}
        </a>
        &nbsp;&gt;&nbsp;
        <span id="bread-pro-name">
            {{$goods->gname}}
        </span>
    </div>
</div>

<div class="hr-10"></div>

<div class="product clearfix">
    <div class="left">
        <!-- 20170518-商品图片-start -->
        <div class="product-gallery positionStatic" style="top: 0px;">
            <div class="relative">
                <div class="product-gallery-img" id="pic-container">
                    <div id="wrap" style="position:relative;">
                        <a id="product-img" href=""
                        class="cloud-zoom" rel="adjustX: 10, adjustY:0, zoomWidth:400 , zoomHeight:400"
                        style="position: relative; display: block;">
                        <img src="{{$color[0]['colorpic'][0]->colorpic}}"
                            alt="" style="display: block;">
                        </a>
                    </div>
                </div>
            </div>


            <div class="product-gallery-nav">
                <a href="javascript:;" class="product-gallery-back" onclick="ec.product.imgSlider.prev()">
                </a>
                <!--不可点击添加class="disabled"-->
                <div class="product-gallery-thumbs">
                    <ul id="pro-gallerys" style="left: 0px;">
                        @foreach($color[0]['colorpic'] as $k => $v)
                        <li class="">
                            <a href="">
                                <img src="{{$v->colorpic}}"
                                alt="{{$goods->gname}}">
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <a href="javascript:;" class="product-gallery-forward" onclick="ec.product.imgSlider.next()">
                </a>
            </div>
        </div>
    <script>
        $('#pro-gallerys li').hover(function(){
            var url = $(this).find('img').attr('src');
            // console.log(url);
            $('#wrap').find('img').attr('src', url);
        }, function(){

        })
    </script>










        <!-- 20170518-商品图片-end -->
    </div>
    <div class="right relative">
        <div id="pro-add-success-mask" style="visibility:hidden;font-size:18px;width:348px;position: absolute;">
        </div>
        <div id="cart-tips" class="pro-popup-area hide">
            <div class="b">
                <div class="pro-add-success">
                    <dl>
                        <dt>
                            <s>
                            </s>
                        </dt>
                        <dd>
                            <div class="box-right-2">
                                <p>
                                    HUAWEI MateBook X
                                </p>
                            </div>
                            <div class="box-button">
                                <a class="box-cancel" href="javascript:;" onclick="$('#cart-tips').hide()">
                                    再逛逛
                                </a>
                                <a href="javascript:;" class="box-ok" onclick="ec.product.gotoshoppingCart()">
                                    去结算
                                </a>
                            </div>
                            <!-- <p>HUAWEI MateBook X</p>
                            <div class="pro-add-success-msg">成功加入购物车!</div>
                            <div class="pro-add-success-total">购物车中共&nbsp;<b id="cart-total">0</b>&nbsp;件商品，金额合计&nbsp;<b  id="cart-price">¥&nbsp;0</b></div>
                            <div class="pro-add-success-button"><a href="javascript:;" class="button-style-1 button-go-cart" onclick="ec.product.gotoshoppingCart()">去结算</a><a class="button-style-4 button-walking" href="javascript:;" onclick="$('#cart-tips').hide()">继续逛逛&nbsp;>></a></div> -->
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <!-- 20130913-弹出层-购买延保-start -->
        <div id="popup-extend" class="pro-popup-area hide">
            <div class="h">
                <a href="javascript:;" class="pro-popup-close" title="关闭" onclick="$('#popup-extend').hide()">
                    关闭
                </a>
            </div>
            <div class="b">
                <div class="pro-extend-area">
                    <h3>
                        购买延保
                    </h3>
                    <div class="pro-extend-search">
                        <div class="form-edit-area">
                            <form action="javascript:;" id="checkExtend-ID" onsubmit="return ec.product.checkExtend()">
                                <input type="hidden" id="extendSkuId">
                                <label style="display: block; position: absolute; cursor: text; float: left; z-index: 2; color: rgb(153, 153, 153);"
                                class="text vam" for="extend-text">
                                    输入IMEI/SN/MEID信息
                                </label>
                                <input type="text" class="text vam" id="extend-text" maxlength="50" style="z-index: 1;">
                                <input class="button-style-4 button-extend-search vam" type="submit" value="查看可购买的延保">
                            </form>
                        </div>
                    </div>
                    <div class="pro-extend-result hide" id="pro-extend-result-id">
                        <div id="extend-msg-succuss" class="hide">
                        </div>
                        <div id="extend-msg-error" class="hide">
                        </div>
                    </div>
                    <div class="pro-extend-tips">
                        温馨提示：IMEI/SN/MEID号可在产品外包装上找到，可拆卸电池的手机可将电池拆掉电池下面的标签上可以看到，手机上输入*#06#也可以显示。
                    </div>
                    <div class="pro-extend-button">
                        <a id="button-extend" class="button-style-disabled-1 button-go-extend-checkout-disabled"
                        href="javascript:;" title="提交订单" onclick="ec.product.extendBuy(this)">
                            <span>
                                提交订单
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- 20130913-弹出层-购买延保-end -->
        <!--弹出层-提示信息 -->
        <div id="popup-tips" class="pro-popup-area hide">
            <div class="h">
                <a href="javascript:;" class="pro-popup-close" title="关闭" onclick="$('#popup-tips').hide()">
                    <span>
                        关闭
                    </span>
                </a>
            </div>
            <div class="b">
                <div class="pro-add-error">
                    <div class="pro-add-error-msg" id="popup-tips-msg">
                        非常抱歉！该商品不能单独销售！
                    </div>
                    <div class="pro-add-error-button">
                        <a class="button-style-1 button-par-define" href="javascript:;" onclick="$('#popup-tips').hide()"
                        title="知道了">
                            知道了
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- 20170518-商品简介-start -->
        <div class="product-property clearfix relative" style="min-height: 463px; height: auto; padding-bottom: 103px;">
            <div id="product-property-recommand">
                <!-- 20170518-商品简介-商品信息-start -->
                <div class="product-meta">
                    <h1 id="pro-name">
                        {{$goods->gname}}
                    </h1>
                    <input class="hide" value="227874837" id="product_sku">
                    <input class="hide" value="417236260" id="product_productId">
                    <div class="product-slogan" id="skuPromWord" style="display: -webkit-box;">
                        <a href="javascript:;" class="product-slogan-btn" style="display: none;">
                        </a>
                        <span>
                            {{$goods->descr}}
                        </span>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-info-list clearfix">
                        <label>
                            价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格
                        </label>
                        <div class="product-price clearfix">
                            <div class="product-price-info">
                                <span id="pro-price-label" class="f24" style="display: none;">
                                </span>
                                <span id="pro-price" class="f24">
                                    <em>
                                        ¥
                                    </em>
                                    {{$goods->price}}.00
                                </span>
                                <input type="hidden" id="pro-price-hide" value="6188.00">
                                <s id="pro-price-old" style="display: none;">
                                </s>
                                <b id="pro-price-label-deposit" style="display:none">
                                    订金
                                </b>
                                <span id="pro-price-deposit" style="display:none">
                                </span>
                                <b id="pro-price-label-amount" style="display:none">
                                    可抵
                                </b>
                                <span id="pro-price-amount" style="display:none">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="product-info-list clearfix hide" id="couponBtn" style="display: none;">
                        <label>
                            优&nbsp;&nbsp;惠&nbsp;&nbsp;券
                        </label>
                        <div class="clearfix" id="couponTag">
                        </div>
                    </div>
                    <!-- 20170518-商品简介促销消息-start -->
                    <div class="product-info-list clearfix " id="product-info-list-new" 1="">
                        <label>
                            促&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;销
                        </label>
                        <div class="product-prom fl  show" id="product-prom-all">
                            
                            <div class="product-prom-item clearfix" style="display: block;">
                                <em class="tag">
                                    分期免息
                                </em>
                                <div class="product-prom-con" title="花呗、掌上生活、农行分期支付可享免息">
                                    <span class="product-prom-word">
                                        花呗、掌上生活、农行分期支付可享免息
                                    </span>
                                </div>
                            </div>
                            <div class="product-prom-item clearfix" style="display: block;">
                                <em class="tag">
                                    赠送积分
                                </em>
                                <div class="product-prom-con">
                                    购买即赠商城积分，积分可抵现~
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 20170518-商品简介促销消息-end -->
                </div>
                <!-- 20180206-商品简介-end -->
                <div class="hr-20">
                </div>
                <!-- 20170518-商品简介-服务说明-start -->
                <div class="product-pulldown clearfix" id="product-pulldown1">
                    <label>
                        服务说明
                    </label>
                    <div class="fl">
                        <!-- 20160914-商品详情-预计送达-start -->
                        
                        <!-- 20160914-商品详情-预计送达-end -->
                        <script>
                            $(function() {
                                //控制动态显示、隐藏详细地址信息
                                $("#address_normal_effective_time").find("dl>dd").hover(function() {
                                    //鼠标经过显示详细地址信息
                                    alert($(this).attr("id"));
                                    $(".tips").show();
                                },

                                function() {
                                    //鼠标离开详细地址信息
                                    alert($(this).attr("id"));
                                    $(".tips").hide();
                                });

                                /*
	 *
	 * 地址提示
	 *
 	* */
                                $('.product-address-prompt em').hover(function() {
                                    $(this).parent().children('p').addClass('show');
                                },
                                function() {
                                    $(this).parent().children('p').removeClass('show');
                                });
                            });
                        </script>
                        <div class="product-description clearfix">
                            <p>
                                满48元免运费
                                <em>
                                </em>
                                由华为商城负责发货，并提供售后服务
                            </p>
                        </div>
                    </div>
                </div>
                <!-- 20170518-商品简介-服务说明-end -->
                <!-- 20171024-商品简介-商品编码-start -->
                <div class="product-description clearfix">
                    <label>
                        商品编码
                    </label>
                    <div class="fl" id="pro-sku-code2">
                        {{$goods->id}}
                    </div>
                </div>
                <!-- 20171024-商品简介-商品编码-end -->
                <div class="hr-5">
                </div>
                <div class="line">
                </div>
                <div class="hr-16">
                </div>
                <div id="pro-skus" class="">
                    <dl class="product-choose clearfix  product-choosepic">
                        <label>
                            选择颜色
                        </label>
                        <div class="product-choose-detail ">
                            <ul>
                                @foreach($goods['color'] as $k => $v)
                                <li class="attr1 attr5 attr13" data-attrname="颜色" data-attrcode="152138"
                                data-attrid="1,5,13" data-skuid="280075090,55782697,557586395" id = {{$v->id}}>
                                    <div class="sku">
                                        <a href="javascript:;" title="深空灰">
                                            <img src="{{$v['colorpic'][0]->colorpic}}"
                                            alt="深空灰" >
                                            <p>
                                                <span>
                                                    {{$v -> color}}
                                                </span>
                                            </p>
                                        </a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </dl>
                </div>

                <script>
                    $('.product-choose-detail li').click(function(){
                        var id = $(this).attr('id');
                        $('#pro-gallerys').empty();
                        console.log(id);
                            $.get('/home/colorpic', {id:id} , function(data){
                            console.log(data);
                            // $('#wrap').find(img).attr('src', data[0].colorpic);
                                $('#wrap').find('img').attr('src', data[0].colorpic);

                            for (var i = 0; i < data.length; i++) {
                            var li = '<li class=""><a href="javascript:;"><img src="'+data[i].colorpic+'"alt=""></a></li>';
                                $('#pro-gallerys').append(li);
                                $(document).on('mouseover', '#pro-gallerys li', function(){
                                var url = $(this).find('img').attr('src');
                                $('#wrap').find('img').attr('src', url);
                                
                            })
                            }
                        })
                    })
                    

                   
                </script>

                <script>
                    
                </script>

                <!--联通合约机套餐-->
                <div id="contractLst" class="hide">
                    <dl class="product-choose clearfix">
                        <label>
                            合约机
                        </label>
                        <div class="product-choose-detail">
                            <ul id="contractList-ol">
                            </ul>
                        </div>
                    </dl>
                    <form action="/contract/choose-{id}" id="contractForm" class="hide">
                        <input type="hidden" value="" id="gifts" name="gifts">
                    </form>
                </div>
                <!-- 20170518-商品简介-保障服务-start -->
                <div class="product-pulldown clearfix hide" id="pro-service" style="display: none;">
                    <label>
                        保障服务
                    </label>
                    <!-- 延保 -->
                    <div class="product-service">
                        <span class="hide" id="extendSelect" skuid="" data-scode="" interest-price="">
                        </span>
                        <div class="product-service-detail">
                            <div class="product-service-list" id="extendProtected">
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- 意外保 -->
                    <div class="product-service">
                        <span class="hide" id="accidentSelect" skuid="" data-scode="" interest-price="">
                        </span>
                        <div class="product-service-detail">
                            <div class="product-service-list" id="accidentProtected">
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 20170518-商品简介-保障服务-end -->
                <input type="hidden" value="" id="interestOrderNow">
                <input type="hidden" value="" id="interestOrderNow2">
                <!-- 20181026-商品简介-分期免息-start -->
                <div class="product-choose clearfix" id="prd-noInterset" interest-allow="1"
                interest-button="">
                    <label>
                        分期免息
                    </label>
                    <div class="product-choose-detail relative product-choose-pulldown">
                        <ul>
                            <li class="" id="hbShow" style="display: list-item;">
                                <!-- 选中li添加class="selected" 点击打开套餐添加class="click"-->
                                <div class="sku">
                                    <a class="product-pulldown-btn" href="javascript:;">
                                        <p>
                                            <span>
                                                花呗分期
                                            </span>
                                        </p>
                                    </a>
                                </div>
                                <div class="product-stages product-package-mini" id="hbDetail" style="display: none;">
                                    <div class="product-stages-con">
                                        <div class="product-stages-main">
                                            <ul class="clearfix">
                                                <li>
                                                    <a href="javascript:;" onclick="ec.product.interest.checkOne(this);" interest-info="1:3">
                                                        <p class="price">
                                                            ¥&nbsp;2110.11
                                                            <em>
                                                                x
                                                            </em>
                                                            3期
                                                        </p>
                                                        <p>
                                                            手续费¥47.44/期
                                                        </p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" onclick="ec.product.interest.checkOne(this);" interest-info="1:6">
                                                        <p class="price">
                                                            ¥&nbsp;1031.33
                                                            <em>
                                                                x
                                                            </em>
                                                            6期
                                                        </p>
                                                        <p class="red">
                                                            免息，0手续费
                                                        </p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" onclick="ec.product.interest.checkOne(this);" interest-info="1:12">
                                                        <p class="price">
                                                            ¥&nbsp;554.34
                                                            <em>
                                                                x
                                                            </em>
                                                            12期
                                                        </p>
                                                        <p>
                                                            手续费¥38.68/期
                                                        </p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tips">
                                            <h2>
                                                花呗分期是什么？
                                            </h2>
                                            <p>
                                                花呗分期是蚂蚁金服（支付宝公司）提供的先消费后分期还款的赊购服务。
                                                <br>
                                                免息活动仅限单款商品的订单，对含多款商品的订单暂不支持。
                                            </p>
                                        </div>
                                    </div>
                                    <div class="product-package-mini-tool clearfix">
                                        <div class="fr">
                                            <a id="interestHBPayNow" href="javascript:;" class="product-package-mini-btn product-button02 disabled"
                                            onclick="ec.product.interest.payByInterest(1);" interest-info="">
                                                <span>
                                                    分期购买
                                                    <span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li id="hlShow" style="display: none;">
                                <div class="sku">
                                    <a class="product-pulldown-btn" href="javascript:;">
                                        <p>
                                            <span>
                                                掌上生活分期
                                            </span>
                                        </p>
                                    </a>
                                </div>
                                <div class="product-stages product-package-mini " id="hlDetail" style="display: none;">
                                    <div class="product-stages-con">
                                        <div class="product-stages-main">
                                            <ul class="clearfix">
                                            </ul>
                                        </div>
                                        <div class="tips">
                                            <h2>
                                                掌上生活分期是什么？
                                            </h2>
                                            <p>
                                                掌上生活分期是招商银行信用卡中心提供的消费分期服务。
                                                <br>
                                                免息活动仅限单款商品的订单，对含多款商品的订单暂不支持。
                                            </p>
                                        </div>
                                    </div>
                                    <div class="product-package-mini-tool clearfix">
                                        <div class="fr">
                                            <a id="interestPayHLNow" href="javascript:;" class="product-package-mini-btn product-button02 disabled"
                                            onclick="ec.product.interest.payByInterest(2);" interest-info="">
                                                <span>
                                                    分期购买
                                                    <span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- 20181026-商品简介-分期免息-end -->
                <!-- 20170518-商品简介-物流现货-start -->
                <div class="product-pulldown clearfix hide">
                    <label>
                        物流售后
                    </label>
                    <div class="product-pulldown-main relative">
                        <!--鼠标悬浮按钮的图标span选择后 class="product-pulldown-main relative" 改为 class="product-pulldown-main
                        product-pulldown-main-show relative"-->
                        <a href="#" class="product-pulldown-btn">
                            江苏省&gt;南京市&gt;玄武区
                            <span>
                            </span>
                        </a>
                        <div class="product-pulldown-detail">
                            <div class="product-pulldown-detailmain">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 20170518-商品简介-物流现货-end -->
                <!-- 推荐-start -->
                <div id="Recommend" class="clearfix">
                    <label>
                        推荐
                    </label>
                    <div class="product-choose-relation">
                        <ul class="clearfix">
                            @foreach($res as $k => $val)
                            <li>
                                <a href="/home/details/{{$v->id}}" target="_blank" onclick="pushProRelationMsg(28491724,1)">
                                    {{$val->gname}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- 推荐-end -->
                <div class="product-operation-main product-operation-location">
                    <!-- 20170518-商品简介-已选择商品-start -->
                    <div class="product-description clearfix">
                        <label>
                            已选择商品:
                        </label>
                        <div id="pro-select-sku" class="product-selected">
                            流光金 / I5/4GB/256GB
                        </div>
                    </div>
                    <!-- 20170518-商品简介-已选择商品-end -->
                    <!-- 20170518-商品简介-提示-end -->
                    <div id="product-tips" class="product-tips hide" style="display: none;">
                    </div>
                    <!-- 20170518-商品简介-提示-end -->
                    <!-- 20170518-商品简介-提交操作-start -->
                    <div id="product-operation" class="product-operation relative" style="display: block;">
                        <div class="clearfix">
                            <!-- 20170518-商品简介-购买数量-start -->
                            <div class="product-stock" id="pro-quantity-area">
                                <input id="pro-quantity" type="text" class="product-stock-text" placeholder="1"
                                value="1">
                                <p class="product-stock-btn">
                                    <a id="pro-quantity-plus" href="javascript:;">
                                        +
                                    </a>
                                    <a id="pro-quantity-minus" href="javascript:;" class="disabled">
                                        −
                                    </a>
                                </p>
                            </div>
                            <div class="product-stock hide" id="pro-quantity-area-nochange" style="display: none;">
                                <input type="text" class="product-stock-text" placeholder="1" value="1"
                                disabled="disabled">
                                <p class="product-stock-btn">
                                    <a href="javascript:;" class="disabled">
                                        +
                                    </a>
                                    <a href="javascript:;" class="disabled">
                                        −
                                    </a>
                                </p>
                            </div>
                            <!-- 20170518-商品简介-购买数量-end -->
                            <div class="product-buttonmain">
                                <!-- 20170518-商品简介-按钮-start -->
                                <div id="pro-operation" class="product-button clearfix" style="visibility: visible;">
                                    <a href="javascript:;" onclick="ec.product.addCart()" class="product-button01">
                                        <span>
                                            加入购物车
                                        </span>
                                    </a>
                                    <a href="javascript:;" onclick="ec.product.orderNow()" class="product-button02">
                                        <span>
                                            立即下单
                                        </span>
                                    </a>
                                </div>
                                <!-- 20170518-商品简介-按钮-end -->
                                <!-- 20170518-商品简介-协议-start -->
                                <div class="product-agreement hide" id="product-deposit-agreement-area">
                                    <input type="checkbox" id="pro-agreement-area-check" checked="">
                                    <span>
                                        同意
                                        <a href="javascript:;" onclick="ec.product.showDepositAgreement()">
                                            订金支付协议
                                        </a>
                                    </span>
                                </div>
                                <!-- 20170518-商品简介-协议-end -->
                                <!-- 20180212-商品简介-游客购买-start -->
                                <!-- 20180212-商品简介-游客购买-end -->
                            </div>
                        </div>
                        <div class="product-tips02 " id="goAddressId" style="display:none">
                            <lable>
                                温馨提示
                            </lable>
                            <p>
                                提前设置
                                <a href="/member/myAddress?t=453453454353" target="_blank" onclick="ec.product.pushAddress()">
                                    默认收货地址
                                </a>
                                ，购买更顺利~
                            </p>
                        </div>
                    </div>
                    <div class="product-deposit clearfix" id="buyProcessIDD" style="display:none">
                        <h2>
                            购买流程
                        </h2>
                        <ul>
                            <li>
                                1.&nbsp;&nbsp;&nbsp;支付订金（
                                <span id="startDateIDD">
                                    提前锁定购买资格
                                </span>
                                ）
                            </li>
                            <li>
                                2.&nbsp;&nbsp;&nbsp;支付尾款（
                                <span id="balanceStartDateIDD">
                                    暂无
                                </span>
                                ）
                            </li>
                            <li>
                                3.&nbsp;&nbsp;&nbsp;等待发货（按支付尾款时间顺序发货）
                            </li>
                        </ul>
                    </div>
                    <div class="gallery-scroll-bottom">
                    </div>
                </div>
                
            </div>
        </div>
        <!-- 20170518-商品简介-属性-end -->
    </div>
</div>

<script>
    // alert($);
    $('.product-choose-detail  li').click(function(){
        $(this).addClass('selected');
        $(this).siblings().removeClass('selected');
    })

    /*$('#pro-gallerys li:first').addClass('current');
    $('#pro-gallerys li')hover(function(){
        $(this).addClass('current');
    }, function(){
        $(this).removeClass('current');

    })*/
</script>



<div id="kindPicture-10086212102647">
    @if($goods['goodspic'])
        @foreach ($goods['goodspic'] as $k => $v)
            <p>
                <img src="https://res.vmallres.com/pimages/detailImg/2019/01/18/201901180906552293395.jpg"
                title="" alt="PC1月18日-31日.jpg">
            
            </p>
       
        @endforeach
    @endif
</div> 

@endsection