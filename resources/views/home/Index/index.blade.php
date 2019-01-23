@extends('layout.home')

@section('title' , $title)

@section('lunbo')

<div class="naver-main">
	<div class="layout">
	
	
	   <!-- 20130909-导航-start -->
               <!-- 20130909-导航-end -->
		<!-- 20140823-分类-start -->
		<div class="category category-index" id="category-block">
			<!-- 20170223-分类-start -->
	<div class="b">
		<ol class="category-list">
			<!-- 鼠标悬停增加ClassName： hover -->
            @foreach ($plate as $key => $value)	
			<li id="zxnav_0" class="category-item ">
			    <input id="zxnav_0_flag" type="hidden" autocomplete="off" value="no">
			    <input id="zxnav_0_name" type="hidden" autocomplete="off" value="手机">
			    <div class="category-item-bg">
			        <div class="category-info">
			            <div class="category-info-detail">
			                
			                <div class="category-title">
			                    <a href="#" target="_blank">
			                        <span>
			                            {{$value->pname}}
			                        </span>
			                    </a>
			                </div>
			                
			            </div>
			        </div>
			    </div>
			    <div class="category-panels category-panels-3 none">
			    @foreach ($value['types'] as $k => $val)    
			    @if($k%4 == 0) 
			       <ul class="subcate-list clearfix">
			    @endif  
			            <li class="subcate-item">
			                <input id="child_name" type="hidden" value="荣耀">
			                <input id="child_status" type="hidden" value="1">
			                <input id="child_type" type="hidden" value="1">
			                <a href="/home/goods/{{$val->id}}" target="_blank">
			                    <img src="{{$val->typepic}}">
			                    <span>
			                        {{$val->tname}}
			                    </span>
			                </a>
			            </li>
			    @if($k%4 == 3)     
			        </ul>
			    @endif  
			    @endforeach  
			    </div>
			</li>
			@endforeach
				
		</ol>
	</div>
<!-- 20170223-分类-end -->
		
		<!-- 20140823-分类-end -->
		
		</div>
	</div>
</div>
<script>
    (function() {
        // 重置首页导航为纵向排列
        $('.category-panels').each(function() {
            var panel = $(this);
            var olis = panel.find('ul.subcate-list li');
            var cols = Math.ceil(olis.length / 4);
            panel.children().remove();
            panel.addClass('category-panels-' + cols);
            for (var i = 0; i < cols; i++) {
                var newUl = $('<ul class="subcate-list clearfix"></ul>');
                var j = i * 4;
                var max = j + 4;
                if (max > olis.length) {
                    max = olis.length;
                }
                for (j; j < max; j++) {
                    newUl.append($(olis[j]));
                }
                panel.append(newUl);
            }
        });

        //获取二级菜单元素
        var $panels = $(".category-panels");
        //判断鼠标是否进入二级菜单
        var mouseInPanels = false;
        //用于存储鼠标移动过程中,开始位置和结束位置的数组
        var mouseTrach = [];
        var activeRow, //选中的一级菜单
        activeMenu, //对应的右侧二级菜单
        timer; //延时器
        $panels.live("mouseenter",
        function() {
            mouseInPanels = true;
        }).live("mouseleave",
        function() {
            mouseInPanels = false;
        });

        var moveHandler = function(e) {
            mouseTrach.push({
                x: e.pageX,
                y: e.pageY
            });
            if (mouseTrach.length > 2) {
                mouseTrach.shift();
            }
        };
        $('.category-item').each(function() {
            $(this).find('.category-panels').addClass('none');
        }) $('.category-list').live('mouseenter',
        function() {
            $(document).bind("mousemove", moveHandler);
        }).live('mouseleave',
        function() {
            if (activeRow) {
                activeRow.removeClass("active");
                activeRow.parent().removeClass("active");
                activeRow = null;
            }
            if (activeMenu) {
                activeMenu.addClass("none");
                activeMenu = null;
            }
            $(document).unbind("mousemove", moveHandler);
        });
        //鼠标进入每个li
        $('.category-item ').live('mouseenter',
        function(e) {
            if (!activeRow) {
                activeRow = $(this).addClass("active");
                $(this).parent().addClass("active");
                activeMenu = $(this).find('.category-panels');
                activeMenu.removeClass("none");
            }
            if (timer) {
                clearTimeout(timer);
            }
            //当前鼠标位置坐标
            var curMouse = mouseTrach[mouseTrach.length - 1];
            //前面鼠标位置坐标
            var prevMouse = mouseTrach[mouseTrach.length - 2];
            var delay = needDelay($('.category-list'), curMouse, prevMouse);
            if (delay) {
                var $this = $(this);
                timer = setTimeout(function() {
                    if (mouseInPanels) {
                        return
                    }
                    if (activeRow && activeRow.hasClass('active')) {
                        activeRow.removeClass("active");
                        activeRow.parent().removeClass("active");
                    }
                    if (activeMenu) {
                        activeMenu.addClass("none");
                    }
                    activeRow = $this;
                    activeRow.addClass("active");
                    activeRow.parent().addClass("active");
                    activeMenu = $this.find('.category-panels');
                    activeMenu.removeClass("none");
                    timer = null;
                },
                500);
            } else {
                var prevActiveRow = activeRow;
                var prevActiveMenu = activeMenu;
                activeRow = $(this);
                activeMenu = $(this).find('.category-panels');
                prevActiveRow.removeClass("active");
                prevActiveRow.parent().removeClass("active");
                prevActiveMenu.addClass("none");
                activeRow.addClass("active");
                activeRow.parent().addClass("active");
                activeMenu.removeClass("none");
            }
        });

        //所有分类显示隐藏控制
        var isIndex = true,
        categoryBlock = gid('category-block');

        if (isIndex) return;

        $("#category-block").hover(function() {
            $(this).addClass("category-hover");
        },
        function() {
            $(this).removeClass("category-hover");
        });

        /*categoryBlock.onmouseover = function () {
        categoryBlock.className = 'category category-hover';
    };
    categoryBlock.onmouseout = function () {
        categoryBlock.className = 'category';
    };*/

    } ());

    function vector(a, b) {
        return {
            x: b.x - a.x,
            y: b.y - a.y
        }
    }

    function vectorPro(v1, v2) {
        return v1.x * v2.y - v1.y * v2.x;
    }

    /**
 *功能:判断两个值是否同正负
 *入参:两个number类型的值
 *出参:布尔值,同正负返回true,反之false
*/
    function sameSign(a, b) {
        return (a ^ b) >= 0;
    }

    /**
 *功能:判断p是否在三角形abc内
 *入参:p, a, b, c;p是需要判断的点，a,b,c是三角形的三个点，如果p在三角形内部，那么pa,pb,pc两个向量之间的差乘应该符号相同。（同正负）
 *出参:布尔值。如果p在a,b,c构成的三角形内,返回true,反之false
*/

    function isPoint(p, a, b, c) {
        var pa = vector(p, a);
        var pb = vector(p, b);
        var pc = vector(p, c);

        var t1 = vectorPro(pa, pb);
        var t2 = vectorPro(pb, pc);
        var t3 = vectorPro(pc, pa);

        return sameSign(t1, t2) && sameSign(t2, t3);
    }

    /**
 *功能:判断是正常切换一级菜单，还是需要延时
 *入参:鼠标滑入的DOM元素
 *出参:布尔值。需要延时返回true,正常切换一级菜单返回false
*/
    function needDelay(ele, curMouse, prevMouse) {
        if (!curMouse || !prevMouse) {
            return
        }
        var offset = ele.offset();
        var topleft = {
            x: offset.left + 240,
            y: offset.top
        };
        var leftbottom = {
            x: offset.left + 240,
            y: offset.top + ele.height()
        };
        return isPoint(curMouse, prevMouse, topleft, leftbottom);
    }

    //定位当前推荐商品
    function fixCurrent(obj) {
        $(obj).addClass('current');
    }

    //离开当前推荐商品
    function leaveCurrent(obj) {
        $(obj).removeClass('current');
    }
    //去重
    function removeDuplicatedItem(ar) {
        var ret = [];
        for (var i = 0,
        j = ar.length; i < j; i++) {
            if (ret.indexOf(ar[i]) === -1) {
                ret.push(ar[i]);
            }
        }
        return ret;
    }

    //商品分类纵向导航数据上报
    function pushNavIndexProMsg(name, url, type, location) {
        var value = {
            "UID": ec.util.cookie.get("uid"),
            "TID": getPtid(),
            "TIME": getTime(),
            "CONTENT": {
                "name": name,
                "URL": url,
                "type": type,
                "location": location,
                "click": "1"
            }
        };
        ec.account.dapPushMsg("300010501", value, "click");
        ec.code.addAnalytics({
            hicloud: true
        });
        _paq.push(["trackLink", "300010501", "link", value]);
    }
    //商品分类纵向导航数据上报(图片)
    function pushNavIndexProImgMsg(skuId, url) {
        var value = {
            "UID": ec.util.cookie.get("uid"),
            "TID": getPtid(),
            "TIME": getTime(),
            "CONTENT": {
                "SKUID": skuId,
                "URL": url,
                "click": "1"
            }
        };
        ec.account.dapPushMsg("300010601", value, "click");
        ec.code.addAnalytics({
            hicloud: true
        });
        _paq.push(["trackLink", "300010601", "link", value]);
    }

    $('.category-list .category-item').each(function(location) {
        location += 1;
        var name = '',
        url = '',
        type = 0;
        $(this).find('.category-info a').bind('click',
        function() {
            name = $(this).find('span').text();
            url = $(this).attr('href');
            type = 0;
            pushNavIndexProMsg(name, url, type, location);
        });
        $(this).find('.category-panels a').bind('click',
        function() {
            name = $(this).find('span').text() || $(this).text();
            url = $(this).attr('href');
            type = 1;
            pushNavIndexProMsg(name, url, type, location);
        });
    });
</script>

<script src = "/homes/js/jquery-1.12.4.js"></script>
<script>
    $('.category-item').hover(function(){
        $(this).find('.category-panels').removeClass('none');
        // $('.category-panels-2').attr('class','category-panels');

    },function(){
        $(this).find('.category-panels').addClass('none');
    })
</script>
<link rel="stylesheet" href="/homes/css/home.css">
<!--双12 header增加背景图的 字体颜色改变-->
<!-- 20130904-热门板-start -->
<div class="hot-board hot-board-index">
    <!--ads start-->
    <div class="ec-slider" id="index_slider" style="width: 100%; height: 550px;">
        <ul style="width: 100%; height: 550px;">
            <li id="firstImg" style="background: url(&#39;https://res.vmallres.com/pimages//sale/2019-01/6sTqkWQwZp06AQ6w1tNo.jpg&#39;) 50% 0px no-repeat; ; width: 100%; height: 550px; display: block; position: absolute;"
            class="ec-slider-item">
                <div style="width:100%;" class="ec-slider-item-img">
                    <a style="width:100%;height:550px;display:block;" href="https://sale.vmall.com/honor.html"
                    target="_blank" onclick="pushSliderMsg(&#39;https://res.vmallres.com/pimages//sale/2019-01/6sTqkWQwZp06AQ6w1tNo.jpg&#39;,&#39;https://sale.vmall.com/honor.html&#39;,&#39;1&#39;)">
                    </a>
                </div>
            </li>
            <li class="ec-slider-item" style="background: url(&quot;https://res.vmallres.com/pimages//sale/2019-01/PpdKi4m6bQAA3PSTjWHM.jpg&quot;) 50% 0px no-repeat; width: 100%; height: 550px; position: absolute; display: none;">
                <div style="width:100%;" class="ec-slider-item-img">
                    <a style="width:100%;height:550px;display:block;" href="https://sale.vmall.com/huawei.html"
                    target="_blank" onclick="pushSliderMsg(&#39;https://res.vmallres.com/pimages//sale/2019-01/PpdKi4m6bQAA3PSTjWHM.jpg&#39;,&#39;https://sale.vmall.com/huawei.html&#39;,2);">
                    </a>
                </div>
            </li>
            <li class="ec-slider-item" style="background: url(&quot;https://res.vmallres.com/pimages//sale/2019-01/HGrFnTwq6gAjWznyZkMc.jpg&quot;) 50% 0px no-repeat; width: 100%; height: 550px; position: absolute; display: none;">
                <div style="width:100%;" class="ec-slider-item-img">
                    <a style="width:100%;height:550px;display:block;" href="https://www.vmall.com/product/10086305784772.html"
                    target="_blank" onclick="pushSliderMsg(&#39;https://res.vmallres.com/pimages//sale/2019-01/HGrFnTwq6gAjWznyZkMc.jpg&#39;,&#39;https://www.vmall.com/product/10086305784772.html&#39;,3);">
                    </a>
                </div>
            </li>
            <li class="ec-slider-item" style="background: url(&quot;https://res.vmallres.com/pimages//sale/2019-01/1YlP4FCwvFcF2Sqy7khr.jpg&quot;) 50% 0px no-repeat; width: 100%; height: 550px; position: absolute; display: none;">
                <div style="width:100%;" class="ec-slider-item-img">
                    <a style="width:100%;height:550px;display:block;" href="https://sale.vmall.com/hwmate.html"
                    target="_blank" onclick="pushSliderMsg(&#39;https://res.vmallres.com/pimages//sale/2019-01/1YlP4FCwvFcF2Sqy7khr.jpg&#39;,&#39;https://sale.vmall.com/hwmate.html&#39;,4);">
                    </a>
                </div>
            </li>
            <li class="ec-slider-item" style="background: url(&quot;https://res.vmallres.com/pimages//sale/2019-01/2OTqTAFiQPxM66BGUuIE.jpg&quot;) 50% 0px no-repeat; width: 100%; height: 550px; position: absolute; display: none;">
                <div style="width:100%;" class="ec-slider-item-img">
                    <a style="width:100%;height:550px;display:block;" href="https://www.vmall.com/product/10086785341226.html"
                    target="_blank" onclick="pushSliderMsg(&#39;https://res.vmallres.com/pimages//sale/2019-01/2OTqTAFiQPxM66BGUuIE.jpg&#39;,&#39;https://www.vmall.com/product/10086785341226.html&#39;,5);">
                    </a>
                </div>
            </li>
            <li class="ec-slider-item" style="background: url(&quot;https://res.vmallres.com/pimages//sale/2019-01/EH8K532E4blzdXh1nmPD.jpg&quot;) 50% 0px no-repeat; width: 100%; height: 550px; position: absolute; display: none;">
                <div style="width:100%;" class="ec-slider-item-img">
                    <a style="width:100%;height:550px;display:block;" href="https://www.vmall.com/product/10086894759259.html"
                    target="_blank" onclick="pushSliderMsg(&#39;https://res.vmallres.com/pimages//sale/2019-01/EH8K532E4blzdXh1nmPD.jpg&#39;,&#39;https://www.vmall.com/product/10086894759259.html&#39;,6);">
                    </a>
                </div>
            </li>
            <li class="ec-slider-item" style="background: url(&quot;https://res.vmallres.com/pimages//sale/2019-01/G5Ud1RE3xe06vG6ID1Hp.jpg&quot;) 50% 0px no-repeat; width: 100%; height: 550px; position: absolute; display: none;">
                <div style="width:100%;" class="ec-slider-item-img">
                    <a style="width:100%;height:550px;display:block;" href="https://www.vmall.com/product/10086789934944.html"
                    target="_blank" onclick="pushSliderMsg(&#39;https://res.vmallres.com/pimages//sale/2019-01/G5Ud1RE3xe06vG6ID1Hp.jpg&#39;,&#39;https://www.vmall.com/product/10086789934944.html&#39;,7);">
                    </a>
                </div>
            </li>
            <li class="ec-slider-item" style="background: url(&quot;https://res.vmallres.com/pimages//sale/2019-01/nMdsQqsftUp17lJEEyGP.jpg&quot;) 50% 0px no-repeat; width: 100%; height: 550px; position: absolute;">
                <div style="width:100%;" class="ec-slider-item-img">
                    <a style="width:100%;height:550px;display:block;" href="https://sale.vmall.com/hwsmh.html"
                    target="_blank" onclick="pushSliderMsg(&#39;https://res.vmallres.com/pimages//sale/2019-01/nMdsQqsftUp17lJEEyGP.jpg&#39;,&#39;https://sale.vmall.com/hwsmh.html&#39;,8);">
                    </a>
                </div>
            </li>
        </ul>
        <div class="ec-slider-middle">
            <div class="ec-slider-nav-1">
                <span class="">
                </span>
                <span class="">
                </span>
                <span class="">
                </span>
                <span class="">
                </span>
                <span class="">
                </span>
                <span class="">
                </span>
                <span class="">
                </span>
                <span class="current">
                </span>
            </div>
            <a class="button-slider-prev button-slider-prev-high" href="javascript:;">
            </a>
            <a class="button-slider-next button-slider-next-high" href="javascript:;">
            </a>
        </div>
    </div>

<script>
    // alert($)
    var time = null;
    var a = 0;
    var img = $('.ec-slider-item');
    function val()
    {    
        time = setInterval(function(){
            a++ ;
            
            
                var i = a%img.length; 

                img.eq(i).fadeIn().siblings().fadeOut();
                $('.ec-slider-nav-1').children().eq(i).addClass('current').siblings().removeClass('current');
               
          
        }, 2000)
    }
    val();
    $('.button-slider-prev').on('click', function(){
        clearInterval(time);
        a--;
        var i = a%img.length;
        
        $(this).parents('#index_slider').find('li').eq(i).fadeIn().siblings().fadeOut();
        $(this).parents('#index_slider').find('span').eq(i).addClass('current').siblings().removeClass('current');
    
    })

     $('.button-slider-next').on('click', function(){
        clearInterval(time);
        a++;
        var i = a%img.length;
       
        $(this).parents('#index_slider').find('li').eq(i).fadeIn().siblings().fadeOut();
        $(this).parents('#index_slider').find('span').eq(i).addClass('current').siblings().removeClass('current');
    
    })
     $('.button-slider-prev, .button-slider-next').hover(function(){
        clearInterval(time);
     }, function(){
        val();
     })
     $('.ec-slider-nav-1 span').hover(function(){
        clearInterval(time);
        a = $(this).index();
       
        $(this).parents('#index_slider').find('li').eq(a).fadeIn().siblings().fadeOut();
        $(this).parents('#index_slider').find('span').eq(a).addClass('current').siblings().removeClass('current');
        
     }, function(){
        val();
     })

</script>
	<!--ads end-->
</div><!-- 20130904-热门板-end -->
<div class="home-channel-menu">

    <div class="layout relative">
    	
    	
        <div class="channel-floor-0 relative">
            <div class="h">
                <div class="home-channel-main">
                    <ul class="home-channel-list clearfix home-channel-img6">
                       <li class="fl s1">
                            <div id="gg_login" class="i-mall-prompt clearfix hide">
                                
                                <div class="fl">
                                 	<div class="w-info">您好！<span id="gg_loginName"></span>。</div>
                                    
                                </div>
                            </div>
                            <div id="gg_unlogin" class="i-mall-prompt clearfix">
                                <div class="relative fl w-name">
                                    <!-- <img src="/homes/image/shouye/img_not_logged_in.png" alt=""> -->
                                </div>
                                
                            </div>
                        </li>
                        <li class="fl s2">
                           
                         </li>
                   		 <li class="fl s3">
                            
                            <div class="p-info">
                               
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="">
                    <ul class="home-promo-list clearfix">
			<li><a target="_blank" href="https://www.vmall.com/product/10086134839130.html" class="item"><img alt="荣耀" src="/homes/image/shouye/016dE7YovzxokeHEFIxQ.jpg"></a></li>
		<li><a target="_blank" href="https://www.vmall.com/product/10086885129494.html" class="item"><img alt="华为" src="/homes/image/shouye/WvDflDLj8KDSFfLDvl4d.png"></a></li>
		<li><a target="_blank" href="https://www.vmall.com/product/10086286769025.html" class="item"><img alt="荣耀" src="/homes/image/shouye/5wgUkfSOdCduNul2iYiC.png"></a></li>
		<li><a target="_blank" href="https://sale.vmall.com/nova.html" class="item"><img alt="华为" src="/homes/image/shouye/mapSeHogj6wc7xC8Eoox.png"></a></li>
</ul>
                </div>
            </div>
            <div class="b">
            	<!--20170222 限时特惠 start-->
		        <!--20170222 限时特惠 end-->
            </div>
            <div class="b">


@endsection

@section('text')

	@foreach ($plate as $k => $v)
		<div class="item">
	        <a href="" target="_blank">
	            {{$v->pname}}
	        </a>
	    </div>
	@endforeach




@endsection



@section('rexiao')

            <div class="b">
                <!--20170222 热销单品 start-->
<!-- 20170222-首页--热销单品-start -->
<div class="home-recommend-goods home-hot-goods index-channel-floor">
    <div class="h">
        <h2 class="title change-title">热销单品</h2>
    </div>
    <div class="b clearfix">
        <div class="span-232 fl">
            <ul class="grid-promo-list clearfix">
                    <input type="hidden" id="contengID" value="0-6">
                    <li class="grid-items grid-items-sm">
                        <a class="thumb" href="" target="_blank" onclick="pushHomeHotGoodsAdvertMsg('https://res0.vmallres.com/pimages//frontLocation/content/1289553/xOwRTaQXVmzL2bdrU7hV.jpg','https://www.vmall.com/product/10086894759259.html')">
                            <img alt="" src="/admins/images/xOwRTaQXVmzL2bdrU7hV.jpg">
                        </a>
                    </li>
            </ul>
        </div>
        <div class="span-968 fl">
            <ul class="grid-list clearfix">
				@foreach ($goods as $k  => $val)
                <!--通过添加current 来实现 hover效果-->
                <li class="grid-items">
                    <a class="thumb" href="https://www.vmall.com/product/10086785341226.html" target="_blank" onclick="pushHomeHotGoodsMsg(this,2,'10086431508342')">
                        <p class="grid-img">
                                <img alt="荣耀10" src="{{$val->pic}}">
                        </p>
                        <div class="grid-title">{{$val->gname}}</div>
                        <p class="grid-desc">限时优惠300&nbsp; </p>
                        <p class="grid-price">¥{{$val->price}}</p>
                        <p class="grid-tips">
                            <em class="thumb"><span class="color01" style="background-color:#FF6A6E">热卖</span></em>
                        </p>
                    </a>
                </li>
                @endforeach        
            </ul>
        </div>
    </div>
</div>


@endsection