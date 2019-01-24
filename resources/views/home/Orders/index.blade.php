@extends('layout.home')

@section('title' , $title)
<link href="/homes/css/main.min.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="https://www.vmall.com/favicon.ico" />
<link href="https://res8.vmallres.com/20190107/css/echannel/ec.core.base.min.css?20170722" rel="stylesheet" type="text/css">

<link href="https://res8.vmallres.com/20190107/css/uum/main.min.css?20150407" rel="stylesheet" type="text/css">
<script src="https://res9.vmallres.com/20190107/js/common/jsapi.js?20141025" namespace="ec"></script>
<script src="https://res9.vmallres.com/20190107/js/common/base/jquery-1.4.4.min.js"></script>
<script src="https://res9.vmallres.com/20190107/js/common/ec.core.js?20141025"></script> 
<script src="https://res9.vmallres.com/20190107/js/echannel/ec.business.min.js?20190116"></script> 
<script src="https://res9.vmallres.com/20190107/js/echannel/base.min.js?20190116"></script>
<!--<script src="//webpublic.vmall.com/csrftoken.js?20180824"></script>-->
<script src="https://res9.vmallres.com/20190107/js/echannel/slider.min.js?20170426"></script>
<script src="https://res9.vmallres.com/20190107/js/echannel/swiper.min.js?20170426"></script>
@section ('rexiao')
<div id="base_index" class="">
    
<div class="hr-10"></div>
<div class="g">
    <!--面包屑 -->
<div class="breadcrumb-area fcn"><a href="/">首页</a>&nbsp;&gt;&nbsp;<em id="personCenter"><a href="/member/">我的商城</a></em><em id="pathPoint">&nbsp;&gt;&nbsp;</em><span id="pathTitle">我的订单</span></div> 
</div>
<div class="hr-10"></div>

    <div class="g">
        <div class="fr u-4-5"><!-- 20141212-栏目-start -->
<div class="section-header">
    <div class="fl">
        <h2><span>我的订单</span></h2>
    </div>
    <div class="fr">
        <div class="ec-tab" id="ec-tab">
            <ul>
                <li class="current"><a href="javascript:;" onclick="ec.member.orderList.seltime(this,1);"><span>最近六月内订单<em id="count-seltime-0" style="display: none;">0</em></span></a></li>
                <li><a href="javascript:;" onclick="ec.member.orderList.seltime(this,0);"><span>六个月前订单<em id="count-seltime-1" style="display: none;">0</em></span></a></li>
            </ul>
            <div class="ec-tab-arrow" style="width: 124px; left: 0px;"></div>
        </div>
    </div>
</div>
<!-- 20141212-栏目-end -->
<!-- 20141222-我的订单-订单类别-start -->
<div class="myOrder-cate" id="myOrder-cate">
    <ul>
        <li class="current"><a href="javascript:;" onclick="ec.member.orderList.check(this,'all');"><span>全部有效订单<em></em></span></a></li>
        <li class="">
            <a href="javascript:;" onclick="ec.member.orderList.check(this,'unpaid');">
                <span>
                    待支付
                    <em id="count-seltime-2" class="hide" data-num="0">
                            0 
                    </em>
                </span>
            </a>
        </li>
        <em id="count-seltime-2-wechat" style="display:none">
                0
        </em> 
        <em id="count-seltime-3-wechat" style="display:none">
                0
        </em> 
        <li class=""><a href="javascript:;" onclick="ec.member.orderList.check(this,'nocomment');"><span>待评价<em id="nocommentNum" data-num="0" data-his="0" style="display: none;">0</em></span></a></li>
        <li class=""><a href="javascript:;" onclick="ec.member.orderList.check(this,'send');"><span>待收货<em id="count-seltime-3" class="hide" data-num="0">0</em></span></a></li>
        <li class=""><a href="javascript:;" onclick="ec.member.orderList.check(this,'finished');"><span>已完成</span></a></li>
        <li class=""><a href="javascript:;" onclick="ec.member.orderList.check(this,'canceled');"><span>已取消</span></a></li>
    </ul>
</div>
<script>
function imgError(img){
    img.onerror = null;
    img.src = ol.libPath + "../../images/echannel/loading/mask.png";
    return true;
}
</script>
<!-- 20141222-我的订单-订单类别-end -->
<!-- 20141222-我的订单-列表-start -->
<div class="myOrder-record" id="myOrders-list-content">
    <!-- 20141222-我的订单-列表-订单合并-start -->
    <div class="myOrder-control" id="myOrder-control-bottom-up" style="display: none;">
        <label class="inputbox" for="checkAllBox">
            <input class="checkbox" type="checkbox" id="checkAllBox" name="checkAllBox"><span>全选</span>
        </label>
        <a href="javascript:;" class="button-operate-merge-pay" id="topButton" onclick="ec.member.orderList.mergePay();"><span>合并支付</span></a>
    </div>
    <!-- 20141222-我的订单-列表-订单合并-end -->
    <div class="list-group-title">
        <table border="0" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th class="col-pro">商品</th>
                    <th class="col-price">单价/元</th>
                    <th class="col-quty">数量</th>
                    <th class="col-pay">实付款/元</th>
                    <th class="col-operate">订单状态及操作</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="list-group" id="list-group"><div class="list-group-empty">您暂时没有相关记录。</div></div>
    <!-- 20141222-我的订单-列表-订单合并-start -->
    <div class="myOrder-control hide" id="myOrder-control-bottom" style="display: none;">
        <label class="inputbox" id="bottomCheckBoxDiv" name="bottomCheckBoxDiv">
            <!-- 20140819-我的订单-合并付款-start -->
                <input type="checkbox" class="checkbox" id="bottomCheckAllBox" name="bottomCheckAllBox"><span>全选</span>
            <!-- 20140819-我的订单-合并付款-end -->
        </label>
        <a href="javascript:;" class="button-operate-merge-pay" id="bottomButton" onclick="ec.member.orderList.mergePay();"><span>合并支付</span></a>
    </div>
    <!-- 20141222-我的订单-列表-订单合并-end -->
    <div class="list-group-page">
        <div class="pager" id="list-pager"></div>
    </div>
</div>
<!-- 20141222-我的订单-列表-end -->
<input type="hidden" id="colid" value="1">
<input type="hidden" id="checkid" value="all">
<input type="hidden" id="cancelReson" value="">
<form action="#" method="get" id="gotoUrl"></form>
<textarea id="delAlert-tpl" class="hide">   &lt;div class="box-tips-area"&gt;
        &lt;p&gt;1：取消订单将作退款处理，一旦取消，不能恢复。&nbsp;&nbsp;&lt;/p&gt;
        &lt;p&gt;2：取消日起5个工作日内退款完成，是否确定操作。&lt;/p&gt;
    &lt;/div&gt;&lt;!-- 20140722-退换货-延保tips-end --&gt;
    &lt;div class="box-button"&gt;
        &lt;a class="box-ok" href="javascript:;"&gt;&lt;span&gt;确定&lt;/span&gt;&lt;/a&gt;
        &lt;a class="box-cancel" href="javascript:;"&gt;&lt;span&gt;取消&lt;/span&gt;&lt;/a&gt;
    &lt;/div&gt;
</textarea>

<textarea id="msg-delorder-ok" class="hide">    &lt;div class="box-right-1"&gt;&lt;span&gt;温馨提示：订单删除成功&lt;/span&gt;&lt;/div&gt;
    &lt;div class="box-button"&gt;
        &lt;a class="box-ok box-button-style-1" href="javascript:;"&gt;&lt;span&gt;确定&lt;/span&gt;&lt;/a&gt;
    &lt;/div&gt;
</textarea>

<textarea id="cancel-msg-tpl" class="hide"> &lt;table width="100%" cellspacing="0" cellpadding="0" border="0"&gt;
            &lt;tbody&gt;
            &lt;tr&gt;
                &lt;td class="box-cl"&gt;&lt;/td&gt;
                &lt;td class="box-cc"&gt;
                    &lt;div class="box-content" style="height: auto;"&gt;
                    
                        &lt;div class="box-content"&gt;
                            &lt;div class="box-tips-area black"&gt;
                                &lt;p&gt;温馨提示：取消处理结果以订单详情记录为准。&lt;/p&gt;
                            &lt;/div&gt;
                        &lt;/div&gt;
                        
                        &lt;div class="box-button"&gt;
                            &lt;a href="javascript:;" class="box-ok"&gt;&lt;span&gt;确定&lt;/span&gt;&lt;/a&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td class="box-cr"&gt;&lt;/td&gt;
            &lt;/tr&gt;
            &lt;/tbody&gt;
        &lt;/table&gt; 
</textarea>

<!-- 物流信息模板 -->
<textarea id="interface-tpl" class="hide">  &lt;!--#macro interface data--&gt;
        &lt;table cellspacing="0" cellpadding="0" border="0"&gt;
            &lt;thead&gt;
                &lt;tr&gt;
                    &lt;th class="col-log-date"&gt;处理时间&lt;/th&gt;
                    &lt;th class="col-log-info"&gt;处理信息&lt;/th&gt;
                &lt;/tr&gt;
            &lt;/thead&gt;
            &lt;tbody&gt;
                &lt;!--#list data as lst--&gt;
                    &lt;tr&gt;
                        &lt;td class="col-log-date"&gt;{#new Date(parseInt(lst.logTime)).format("yyyy-MM-dd HH:mm:ss")}&lt;/td&gt;
                        &lt;td class="col-log-info"&gt;{#lst.logDescription}&lt;/td&gt;
                    &lt;/tr&gt;
                &lt;!--/#list--&gt;
            &lt;/tbody&gt;
        &lt;/table&gt;
    &lt;!--/#macro--&gt;
</textarea>

<textarea id="exchange-timeout" class="hide">   &lt;div class="box-errors"&gt;&lt;span&gt;退换货过期&lt;/span&gt;&lt;/div&gt;
    &lt;div class="hr-15"&gt;&lt;/div&gt;
    &lt;div class="box-words"&gt;
        &lt;p&gt;对不起，您已经超过规定的退换货有效期，目前不能进行退换货操作！&lt;/p&gt;
        &lt;p&gt;温馨提示：如果您是在网店更换过机器或者在商城换过机器，请您凭网店或者商品提供的检测单联系商城客服，在后台给你下换机申请单。&lt;/p&gt;
    &lt;/div&gt;
    &lt;div class="hr-20"&gt;&lt;/div&gt;
    &lt;div class="box-button"&gt;
        &lt;a class="box-ok" href="javascript:;"&gt;&lt;span&gt;确定&lt;/span&gt;&lt;/a&gt;
    &lt;/div&gt;
</textarea>


<textarea id="exchange-error" class="hide"> &lt;div class="box-errors"&gt;&lt;span&gt;此订单商品已全部办理退换货，请不要重复申请哦~&lt;/span&gt;&lt;/div&gt;
    &lt;div class="hr-15"&gt;&lt;/div&gt;
    &lt;div class="hr-20"&gt;&lt;/div&gt;
    &lt;div class="box-button"&gt;
        &lt;a class="box-ok" href="javascript:;"&gt;&lt;span&gt;确定&lt;/span&gt;&lt;/a&gt;
    &lt;/div&gt;
</textarea>

<textarea id="exchange-agreement" class="hide">     &lt;!-- 20140828-对话框-协议-退换货办理协议-start --&gt;
        &lt;div class="box-rule"&gt;
            &lt;p&gt;&lt;b&gt;尊敬的用户：&lt;/b&gt;&lt;/p&gt;
            &lt;p style="text-indent:2em;"&gt;您可选择以下方式进行退换货&lt;/p&gt;
            &lt;p style="text-indent:2em;"&gt;&lt;b&gt;一、寄回商城仓库进行检测退换货&lt;/b&gt;&lt;/p&gt;
            &lt;ul&gt;
                &lt;li style="text-indent:2em;"&gt;您好，寄回商品检测前，请您仔细阅读以下条款。&lt;/li&gt;
                &lt;li style="text-indent:2em;"&gt;1、寄回检测需要您先自行垫付寄回运费，待检测符合退换条件后，商城会返还您的运费。&lt;/li&gt;
                &lt;li style="text-indent:2em;"&gt;2、请确保寄回商品无人为损坏，否则无法办理退换货。人为损坏包括但不限于：未经授权的维修、外力造成的碰撞破损、进液以及外观刮花划伤、掉漆等。&lt;/li&gt;
                &lt;li style="text-indent:2em;"&gt;3、退换货申请审核通过仅表示华为商城受理您的退换货申请，但不代表同意您的退换货，您可寄回商城进行检测，具体判断有赖于商品是否有质量问题的检测结果以及其他退换货条件的满足。&lt;/li&gt;
                &lt;li style="text-indent:2em;"&gt;4、寄回检测换货，请确保将商品主机、完整标配、完整原厂包装一次性寄回，如缺少标配配件等将无法更换。&lt;/li&gt;
                &lt;li style="text-indent:2em;"&gt;5、寄回检测退货，请确保将商品主机、完整标配、完整原厂包装、发票原件、赠品一次性寄回。&lt;/li&gt;
                &lt;li style="text-indent:2em;"&gt;6、寄回检测后，不符合退换货规定的商品将原路到付寄回，运费将由您承担。&lt;/li&gt;
            &lt;/ul&gt;
            &lt;p style="text-indent:2em;"&gt;&lt;b&gt;二、当地售后服务网点检测，并换货&lt;/b&gt;&lt;/p&gt;
            &lt;ul&gt;
                &lt;li style="text-indent:2em;"&gt;您好，网点检测故障属实后，您可以选择直接在售后服务网点进行换机服务。&lt;/li&gt;
                &lt;li style="text-indent:2em;"&gt;1、前往售后服务网点前请您拨打网点电话咨询是否可受理。&lt;/li&gt;
                &lt;li style="text-indent:2em;"&gt;2、请您将发票、故障商品携带齐全前往售后服务网点进行检测换货。&lt;/li&gt;
            &lt;/ul&gt;
            &lt;p style="text-indent:2em;"&gt;&lt;b&gt;三、当地售后服务网点开具检测报告，寄回商城退换货&lt;/b&gt;&lt;/p&gt;
            &lt;ul&gt;
                &lt;li style="text-indent:2em;"&gt;您好，您可直接到当地就近华为售后服务网点进行检测，开具检测报告后寄回华为商城仓库进行退换货。&lt;/li&gt;
                &lt;li style="text-indent:2em;"&gt;1、前往售后服务网点前请您拨打网点电话咨询是否可受理。&lt;/li&gt;
                &lt;li style="text-indent:2em;"&gt;2、请您将发票、故障商品携带齐全前往售后服务网点进行检测换货。&lt;/li&gt;
            &lt;/ul&gt;
        &lt;/div&gt;&lt;!-- 20140828-对话框-协议-退换货办理协议-end --&gt;
</textarea>

<textarea id="realNameComment" class="hide">    &lt;!-- 20170914-提示-start --&gt;
        &lt;div class="box-phone01"&gt;
            &lt;div class="h"&gt;
                &lt;i&gt;&lt;/i&gt;
            &lt;/div&gt;
            &lt;div class="b"&gt;
                &lt;p class="title"&gt;绑定手机号码&lt;/p&gt;
                &lt;p&gt;根据国家相关规定，只有帐号经过实名验证的用户才可以跟帖评论或发布信息。为保障您的帐号正常使用，请尽快完成手机号绑定验证，感谢您的理解及支持！&lt;/p&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="box-button"&gt;
            &lt;a href="javascript:;" class="box-cancel"&gt;&lt;span&gt;取消&lt;/span&gt;&lt;/a&gt;
            &lt;a href="https://hwid1.vmall.com/oauth2/userCenter/hwAccount?reqClientType=26&amp;loginChannel=26000000&amp;themeName=cloudTheme&amp;lang=zh-cn" class="box-sure"&gt;&lt;span&gt;去绑定&lt;/span&gt;&lt;/a&gt;
        &lt;/div&gt;
    &lt;!-- 20170914-提示-end --&gt;
</textarea>

<textarea id="box-confirm" class="hide">&lt;!-- 20140722-退换货-延保tips-start --&gt;
    &lt;div class="box-tips-area"&gt;
        &lt;p&gt;请您收到货后，再确认收货。&lt;/p&gt;
    &lt;/div&gt;&lt;!-- 20140722-退换货-延保tips-end --&gt;
    &lt;div class="box-button"&gt;
        &lt;a class="box-ok" href="javascript:;"&gt;&lt;span&gt;确定&lt;/span&gt;&lt;/a&gt;
        &lt;a class="box-cancel" href="javascript:;"&gt;&lt;span&gt;取消&lt;/span&gt;&lt;/a&gt;
    &lt;/div&gt;
</textarea>
<textarea id="box-pj" class="hide">&lt;!-- 20140722-退换货-延保tips-start --&gt;
&lt;div class="box-tips-area"&gt;
    &lt;p&gt;此次购物是否让您满意？给个评价吧！&lt;/p&gt;
&lt;/div&gt;
&lt;div class="box-custom-button"&gt;
    &lt;a class="box-cancel box-button-style-2" href="/member/prdRemarkView.html" target="_blank"&gt;&lt;span&gt;去评价&lt;/span&gt;&lt;/a&gt;
    &lt;a class="box-cancel box-button-style-1" href="javascript:;"&gt;&lt;span&gt;关闭&lt;/span&gt;&lt;/a&gt;
&lt;/div&gt;
&lt;!-- 20140722-退换货-延保tips-end --&gt;
</textarea>

<textarea id="order-cancel" class="hide"> &lt;!-- 20171206-订单取消申请-start --&gt;
    &lt;div class="order-cancel"&gt;
        &lt;div class="clearfix"&gt;
            &lt;label&gt;&lt;span class="red"&gt;*&lt;/span&gt;取消原因&lt;/label&gt;
            &lt;div class="order-cancel-main"&gt;
                &lt;div class="order-cancel-pulldown" id="selectReson"&gt;请选择取消原因&lt;/div&gt;
                &lt;!--选取原因后class="order-cancel-pulldown click"--&gt;
                &lt;div class="order-cancel-detail"&gt;
                    &lt;ul id="cancelOption" class="clearfix"&gt;
                        &lt;li&gt;&lt;input type="radio" name="resonType" value="1"&gt;不想买了&lt;/li&gt;
                        &lt;li&gt;&lt;input type="radio" name="resonType" value="6"&gt;该商品Vmall商城降价了&lt;/li&gt;
                        &lt;li&gt;&lt;input type="radio" name="resonType" value="2"&gt;商品选择错误&lt;/li&gt;
                        &lt;li&gt;&lt;input type="radio" name="resonType" value="7"&gt;其他商家价格更低&lt;/li&gt;
                        &lt;li&gt;&lt;input type="radio" name="resonType" value="3"&gt;重复下单/误下单&lt;/li&gt;
                        &lt;li&gt;&lt;input type="radio" name="resonType" value="8"&gt;发货太慢&lt;/li&gt;
                        &lt;li&gt;&lt;input type="radio" name="resonType" value="4"&gt;忘记使用优惠券、积分等&lt;/li&gt;
                        &lt;li&gt;&lt;input type="radio" name="resonType" value="9"&gt;支付方式有误/无法支付&lt;/li&gt;
                        &lt;li&gt;&lt;input type="radio" name="resonType" value="5"&gt;收货信息/发票信息填写错误&lt;/li&gt;
                        &lt;li&gt;&lt;input type="radio" name="resonType" value="10"&gt;其他原因&lt;/li&gt;
                    &lt;/ul&gt;                                     
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div id="cancelErrorMessage" class="report-errors hide"&gt;请选择取消订单原因。&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="order-cancel-tips"&gt;
        &lt;span class="label-error"&gt;温馨提示：&lt;/span&gt;
        &lt;ul&gt;
            &lt;li&gt;*&nbsp;&nbsp;订单成功取消后无法恢复&lt;/li&gt;
            &lt;li&gt;*&nbsp;&nbsp;订单成功取消后，该订单已付金额将返还到您的支付账户中，取消日起5个工作日内退款完成&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;
    
    &lt;div class="box-button"&gt;
        &lt;a href="javascript:;" id="cancelButton" class="box-cancel"&gt;&lt;span&gt;暂不取消&lt;/span&gt;&lt;/a&gt;
        &lt;a href="javascript:;" id="okButton" class="box-sure"&gt;&lt;span&gt;确定取消&lt;/span&gt;&lt;/a&gt;
    &lt;/div&gt;
    &lt;!-- 20171206-订单取消申请-end --&gt;
</textarea>

<form id="clearPay">
<input name="ips" id="clear-Ips" type="hidden">
</form>
<textarea id="unPay-inOnce" class="hide"></textarea>

<script src="https://res9.vmallres.com/20190107/js/uum/member/order/orderList.min.js?20181206"></script><script id="jsapi_loader4" loadtype="insert" type="text/javascript" src="https://res9.vmallres.com/20190107/js/common/base/jquery.form-2.49.js" charset="utf-8"></script><script>(function(){var time = 0,el = document.getElementById('jsapi_loader4');if(!el || (el.readyState && 'complete' != el.readyState)){ if(time<10){ setTimeout(arguments.callee,30); time++; }else{ logger.error('load the script of id jsapi_loader4 fail!');} return; }ol._setLoadStatus("jquery.form","complete");})();</script><script id="jsapi_loader5" loadtype="insert" type="text/javascript" src="https://res9.vmallres.com/20190107/js/common/base/ajax.js" charset="utf-8"></script><script>(function(){var time = 0,el = document.getElementById('jsapi_loader5');if(!el || (el.readyState && 'complete' != el.readyState)){ if(time<10){ setTimeout(arguments.callee,30); time++; }else{ logger.error('load the script of id jsapi_loader5 fail!');} return; }ol._setLoadStatus("ajax","complete");})();</script><script id="jsapi_loader6" loadtype="insert" type="text/javascript" src="https://res9.vmallres.com/20190107/js/common/jquery.movebar/movebar.min.js"></script><script>(function(){var time = 0,el = document.getElementById('jsapi_loader6');if(!el || (el.readyState && 'complete' != el.readyState)){ if(time<10){ setTimeout(arguments.callee,30); time++; }else{ logger.error('load the script of id jsapi_loader6 fail!');} return; }ol._setLoadStatus("jquery.movebar/movebar.min.js","complete");})();</script>

<script src="https://res9.vmallres.com/20190107/js/uum/member/commodity/add.min.js?20150624"></script><script id="jsapi_loader7" loadtype="insert" type="text/javascript" src="https://res9.vmallres.com/20190107/js/common/RaterStar/rater-star.js"></script><script>(function(){var time = 0,el = document.getElementById('jsapi_loader7');if(!el || (el.readyState && 'complete' != el.readyState)){ if(time<10){ setTimeout(arguments.callee,30); time++; }else{ logger.error('load the script of id jsapi_loader7 fail!');} return; }ol._setLoadStatus("RaterStar/rater-star.js","complete");})();</script>
<script>
ec.load("ec.pager");
$(function() {
  $('.list-group-item .o-pro table').each(function() {
    var trs = $(this).find('tr');
    $(trs[0]).find('.col-pay').attr('rowspan', trs.length);
    $(trs[0]).find('.col-operate').attr('rowspan', trs.length);
  });
});
ec.member.orderList.updateDeliveryOrder = "0";
</script><script id="jsapi_loader8" loadtype="insert" type="text/javascript" src="https://res9.vmallres.com/20190107/js/common/ec.pager/pager-min.js" charset="gbk"></script><script>(function(){var time = 0,el = document.getElementById('jsapi_loader8');if(!el || (el.readyState && 'complete' != el.readyState)){ if(time<10){ setTimeout(arguments.callee,30); time++; }else{ logger.error('load the script of id jsapi_loader8 fail!');} return; }ol._setLoadStatus("ec.pager/pager-min.js","complete");})();</script></div>
        <div class="fl u-1-5">
            

<!-- 20170823-左边菜单-start -->
<div class="mc-menu-area">
    <div class="h"><a href="/member?t=1548158153751"><span>我的商城</span></a></div>
    <div class="b">
        <ul>
            <li>
                <h3 class="icon-mc-mail"><a href="/member/msg?t=1548158153751"><span id="li-msg">消息中心<em></em></span></a></h3>
            </li>
            <li>
                <h3 class="icon-mc-help"><a href="https://www.vmall.com/help/index.html" target="_blank"><span>帮助中心</span></a></h3>
            </li>
            <li>
                <h3 class="icon-mc-order"><span>订单中心</span></h3>
                <ol>
                    <li id="li-order" class="current"><a href="/member/order?t=1548158153751"><span>我的订单</span></a></li>
                    <li id="li-order-small"><a href="/member/orderWeChat?t=1548158153751"><span>小程序订单</span></a></li>
                    <li id="li-exchange"><a href="/member/exchange?t=1548158153751"><span>我的退换货</span></a></li>
                    <li id="li-refunds"><a href="/member/refunds?t=1548158153751"><span>我的退款</span></a></li>
                    <li id="li-recover"><a href="/member/recycle/index/aihuishou?t=1548158153751"><span>我的回收单</span></a></li>
                    <li id="li-prdRemark"><a href="/member/prdRemarkView?t=1548158153751"><span>商品评价</span></a></li>
                </ol>
            </li>
            <li>
                <h3 class="icon-mc-asset"><span>我的资产</span></h3>
                <ol>
                    <li id="li-newpoint"><a href="/member/newpoint?t=1548158153751"><span>我的积分</span></a></li>
                    <li id="li-coupon"><a href="/member/coupon?t=1548158153751"><span>我的优惠券</span></a></li>
                    <li id="li-balance"><a href="/member/balance?t=1548158153751"><span>我的代金券</span></a></li>
                    <li id="li-petal"><a href="/member/petal?t=1548158153751"><span>我的花瓣</span></a></li>
                    <li id="li-point"><a href="/member/point?t=1548158153751"><span>等级与特权</span></a></li>
                </ol>
            </li>
            <li>
                <h3 class="icon-mc-support"><span>购买支持</span></h3>
                <ol>
                    <li id="li-myAddress"><a href="/member/myAddress?t=1548158153751"><span>收货地址管理</span></a></li>
                    <li id="li-authentication"><a href="/authmember/accesstoken?t=1548158153751"><span>实名认证</span></a></li>
                    <li id="li-myAppointment"><a href="/member/myAppointment?t=1548158153751"><span>我的预约</span></a></li>
                    <li id="li-notification"><a href="/member/notification?t=1548158153751"><span>到货通知</span></a></li>
                    <li id="li-myeasybuy"><a href="/member/myeasybuy?t=1548158153751"><span>我的优享购</span></a></li>
                    <li id="li-enterprise" class="hide"></li><!-- 优惠内购 -->
                    <li id="li-o2o" class="hide"><a href="/o2o?t=1548158153751"><span>O2O商城</span></a></li>
                </ol>
            </li>
            <li id="li-company" class="hide" style="display: none;">
                <h3 class="icon-mc-business"><span>企业购</span></h3>
                <ol>
                    <li id="li-companyUserInfo"></li>
                    <li id="li-companyOrder"></li>
                    <li id="li-companyOrderList"></li>
                    <li id="li-companyQues"></li>
                </ol>
            </li>
        </ul>
    </div>
</div>
<!-- 20170823-左边菜单-end -->

<script src="https://res9.vmallres.com/20190107/js/company/leftMenu.js?20190116"></script>


        </div>
    </div>
    <div class="hr-80"></div>
    
</div>
@stop