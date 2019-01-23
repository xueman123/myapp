@extends('layout.admin')

@section('title', $title)
<script src="/admins/assets/js/vendor/jquery-2.1.4.min.js"></script>


@section('content')


<div class="breadcrumbs">
	<div class="card-body">
    <button type="button" class="btn btn-outline-primary btn-sm shangpin" style = "margin-left:30px"><i class="fa fa-star"></i>&nbsp; 商品列表</button>
</div>
	<div class="breadcrumbs-inner">
	    <div class="row m-0">
	        <div class="col-sm-4">
	            <div class="page-header float-left">
	                <div class="page-title">
	                    <h1>{{$res['goods'] -> gname}}</h1>
	                    
	                </div>
	            </div>
	            <div class="page-header float-left">
	                <div class="addpic" id = "{{$res->id}}">
	                    <a href = "javascript:"  style = "line-height:60px">添加图片</a >
	                </div>
	            </div>
	        </div>
	        <div class="col-sm-8">
	            <div class="page-header float-right">
	                <div class="page-title">
	                    <ol class="breadcrumb text-right">
	                    	@foreach ($res['goods']['color'] as $k => $v) 
	                        <li><a href="/admin/colorpic?ids={{$v->id}}">{{$v->color}}</a></li>
	                        @endforeach
	                    </ol>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<script>
	$('.addpic').click(function(){

		window.location.href = "/admin/colorpic/create?id="+$(this).attr('id');
	})
	
</script>
<div class = "content">
	@foreach ($res['colorpic'] as $k => $val)
	<div class="col-md-4" style = "float:left;">
	    <div class="card">
	        <div class="card-header">
	            <strong class="card-title mb-3">{{$res['goods']->gname}}</strong>
	        </div>
	        <div class="card-body">
	            <div class="mx-auto d-block">
	                <img class="rounded-circle mx-auto d-block" src="{{$val->colorpic}}" alt="Card image cap">
	                <h5 class="text-sm-center mt-2 mb-1">Steven Lee</h5>
	                <div class="location text-sm-center"><i class="fa fa-map-marker"></i> {{$res['goods']->gname}}</div>
	            </div>
	            <hr>
	            <div class="card-text text-sm-center">
	                <a href="javascript:"><i class="fa fa-facebook pr-1">修改图片</i></a>
	            </div>
	        </div>
	   

	    </div>
	</div>
	 @endforeach
	

</div>
<script>
	$('.shangpin').click(function(){
		window.location.href='/admin/good';
	})
</script>



@endsection