@extends('layout.home')

@section('title' , $title)
<link href="/homes/css/main.min.css" rel="stylesheet" type="text/css">
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
@section ('rexiao')

<div class="g">
    <!--面包屑 -->
	<div class="breadcrumb-area fcn">
			<a href="/" title="首页">首页</a>&nbsp;&gt;&nbsp;
		
				<a href="/" title="手机">手机</a>&nbsp;&gt;&nbsp;
		@if ($type)
		<span>{{$type->tname}}</span>
		
		@endif
	</div>
</div>
<div class="hr-10"></div>

<div class="layout">
	<!-- 20140726-商品类别-start -->
	<div class="pro-cate-area">
		<!-- 20140726-商品类别-属性-start -->
		<div class="pro-cate-attr clearfix">
			<div class="p-title">分类：</div>
			<div class="p-default">
				<ul>
					@if($type)
                    <li id="first-category"><a href="/home/good?plate={{$plate->id}}">全部</a></li>
					<!--<li class="selected"><a href="javascript:;">全部</a></li>-->
					
					@endif
				</ul>
			</div>
			
			<!-- 二级虚拟分类 -->
			<div class="p-values">
				<div class="p-operate" style="display: none;">
					<!-- 追加ClassName： more-expand more-drop -->
					<a href="javascript:;" onclick="ec.product.more(this)" class="more more-expand">更多<s></s></a>
				</div>
				<!-- 一行的高度为30px,显示n行，p-expand的高度为nx30 -->
				<div class="p-expand">
					<ul class="clearfix">	
					@foreach ($plate['types'] as $k => $v)				
	                    <li><a href="/home/goods/{{$v->id}}">{{$v->tname}}</a></li>
	                @endforeach
					</ul>
				</div>
			</div>
			
		</div><!-- 20140726-商品类别-属性-end -->
		
		

	<div class="hr-20"></div>

	
</div>
</div>
<div class="layout">
	<!-- 20140726-频道-列表-start -->
	@if($type)
    <div class="channel-list">
        <!-- 20140727-商品列表-start -->
		<div class="pro-list clearfix">
			<ul>
				@foreach ($type['goods'] as $k => $v)
            	<li>
				    <div class="pro-panels">
				        <p class="p-img">
				            <a target="_blank" href="/home/details/{{$v->id}}" title="HUAWEI P20 Pro"
				            onclick="pushListProClickMsg('2601010026820')">
				                <img alt="HUAWEI P20 Pro 6GB+128GB 全网通版（极光闪蝶）" src="{{$v->pic}}">
				            </a>
				        </p>
				        <p class="p-name">
				            <a target="_blank" href="/home/details/{{$v->id}}" title="HUAWEI P20 Pro"
				            onclick="pushListProClickMsg('2601010026820')">
				                <span>
				                    {{$v->gname}}
				                </span>
				                <span class="red">
				                </span>
				            </a>
				        </p>
				        <p class="p-price">
				            <b>
				                ¥{{$v->price}}
				            </b>
				        </p>
				        <div class="p-button clearfix">
				            <table colspan="0" border="0" rowspan="0">
				                <tbody>
				                    <tr style = "text-align:center">
				                        <td>
				                            <a target="_blank" href="/home/details/{{$v->id}}" class="p-button-cart">
				                                <span>
				                                    选购
				                                </span>
				                            </a>
				                        </td>
				                        <td>
				                            <label class="p-button-score">
				                                <span>
				                                    54421人评价
				                                </span>
				                            </label>
				                        </td>
				                    </tr>
				                </tbody>
				            </table>
				        </div>
				        <s class="p-tag">
				            <img alt="HUAWEI P20 Pro 6GB+128GB 全网通版（极光闪蝶）" src="https://res.vmallres.com/pimages//tag/71/1497575814983.png">
				        </s>
				    </div>
				</li>
				@endforeach
			</ul>
		</div>
		<!-- 20140727-商品列表-end -->
		<!-- 分页-start -->
		<div id="list-pager-285" class="pager">
	    </div>
    </div><!-- 20140726-频道-列表-end -->
    @elseif ($goods)
	<div class="channel-list">
        <!-- 20140727-商品列表-start -->
		<div class="pro-list clearfix">
			<ul>
				@foreach ($goods as $k => $val)
				@foreach ($val as $k => $v)
            	<li>
				    <div class="pro-panels">
				        <p class="p-img">
				            <a target="_blank" href="/home/details/{{$v->id}}" title="HUAWEI P20 Pro"
				            onclick="pushListProClickMsg('2601010026820')">
				                <img alt="{{$v->gname}}" src="{{$v->pic}}">
				            </a>
				        </p>
				        <p class="p-name">
				            <a target="_blank" href="/home/details/{{$v->id}}" title="HUAWEI P20 Pro">
				                <span>
				                    {{$v->gname}}
				                </span>
				                <span class="red">
				                </span>
				            </a>
				        </p>
				        <p class="p-price">
				            <b>
				                ¥{{$v->price}}
				            </b>
				        </p>
				        <div class="p-button clearfix">
				            <table colspan="0" border="0" rowspan="0">
				                <tbody>
				                    <tr style = "text-align:center">
				                        <td>
				                            <a target="_blank" href="/home/details/{{$v->id}}" class="p-button-cart">
				                                <span>
				                                    选购
				                                </span>
				                            </a>
				                        </td>
				                        <td>
				                            <label class="p-button-score">
				                                <span>
				                                    54421人评价
				                                </span>
				                            </label>
				                        </td>
				                    </tr>
				                </tbody>
				            </table>
				        </div>
				        <s class="p-tag">
				            <img alt="HUAWEI P20 Pro 6GB+128GB 全网通版（极光闪蝶）" src="https://res.vmallres.com/pimages//tag/71/1497575814983.png">
				        </s>
				    </div>
				</li>
				@endforeach
				@endforeach
			</ul>
		</div>
		<!-- 20140727-商品列表-end -->
		<!-- 分页-start -->
		<div id="list-pager-285" class="pager">
	    </div>
    </div>

    @endif
</div>
<script src="/admins/assets/js/vendor/jquery-2.1.4.min.js"></script>

		<script>
			$('.pro-cate-area li').hover(function(){
				$(this).addClass('selected');
			}, function(){
				$(this).removeClass('selected');
			})
		</script>

@endsection
