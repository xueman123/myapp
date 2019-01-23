@extends('layout.admin')

@section('title', $title)

@section('content')
<form action="/admin/type" method = "get">
	<div class = "col-lg-10" style = "margin-left: 100px">
		<div class="form-group">
	        <div class="input-group">
	        <input type="text" id="password2" name="type" placeholder="搜索分类" class="form-control">
	        <!-- <button><div class="input-group-addon"><i class="fa fa-search"></i></div></button> -->
	        <button type="submit" class="btn btn-outline-info"><i class="fa fa-search"></i></button>

	        </div>
	    </div>
	</div>
</form> 
@if($res)
<div class="col-sm-10 mb-4" style = "margin-left:100px">
    <div class="col-sm-12 mb-4">
        <div class="card-group">
            @foreach ($res as $key => $value)
            <div class="card col-md-6 no-padding " ids = "{{$value -> id}}">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-bookmark">
                        </i>
                    </div>
                    <div class="h4 mb-0">
                        {{$value->pname}}
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">
                        
                    </small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@foreach ($res as $k => $v)
	
    <div class="col-lg-10" style = "margin-left: 100px">
    <div class="card">
        <div class="card-header">
        	<form action="/admin/type/create">
	            <strong class="card-title">
	                {{$v->pname}}

	            </strong>
            	<input type="hidden" name = "ids" value = "{{$v->id}}">
            	<button class="btn btn-outline-danger"  type="submit" style = "float:right;">添加类别</button>
            </form>
            
        </div>

				
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">
                            #
                        </th>
                        <th scope="col" width = "300">
                            类别名
                        </th>
                        <th scope="col" width = "300">
                            路径
                        </th>
                        <th scope="col" width = "300">
                            图片
                        </th>
                        <th scope="col" width = "100">
                            管理
                        </th>
                    </tr>
                </thead>
                <tbody>
				@foreach ($v['types'] as $key => $val)

                    <tr>
                        <th scope="row">
                            {{$val -> id}}
                        </th>
                        <td>
                            <a href="/admin/type/{{$val->id}}" >{{$val->tname}}</a>
                            
                        </td>
                        <td>
                            {{$val->path}}
                        </td>
                        <td>
                            <img src="{{$val->typepic}}" height = "100" alt="">
                        </td>
                        <td>
                            <a href="/admin/type/{{$val->id}}/edit"><i class="fa fa-pencil" style = "margin:0px 10px"></i></a>
                            <a href="javascript:" "><i class="fa fa-trash-o" ids = "{{$val->id}}"></i></a>	
                        </td>
                    </tr>
				@endforeach
                </tbody>
            </table>
        </div>
		
    </div>
</div>

@endforeach	

@elseif($type)
	
	<div class="col-lg-10" style = "margin-left: 100px">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Basic Table</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col" width = "300">类别</th>
                          <th scope="col" width = "300">分区</th>
                          <th scope="col" width = "100">管理</th>
                      </tr>
                  </thead>
                  <tbody>
                  	@foreach ($type as $k => $v)
                    <tr>
                        <th scope="row">{{$v->id}}</th>
                        <td>{{$v->tname}}</td>
                        <td><a href="/admin/good/{{$v->id}}">{{$v['plate']->pname}}</a></td>
                        <td>
                        	<a href="/admin/type/{{$v->id}}/edit"><i class="fa fa-pencil" style = "margin:0px 10px"></i></a>
                            <a href="javascript:" "><i class="fa fa-trash-o" ids = "{{$v->id}}"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endif
    <script src = "/admins/assets/js/vendor/jquery-2.1.4.min.js"></script>
	<script>
		$('.fa-trash-o').click(function(){
			var i = $(this)
			var ids = $(this).attr('ids');
			console.log(ids);
			$.post(
                "{{url('/admin/type')}}/" + ids, 
                {
                    '_method': 'delete',
                    '_token': "{{csrf_token()}}"
                },
                function(data) {
                    if(data == 1){
                    	i.parents('tr').remove();
                    	console.log(data);
                    }
                    
                }
            )
		})
        $('.no-padding').click(function(){
            var ids = $(this).attr('ids');
            // console.log(ids);
            window.location.href='/admin/plate/'+ids;
        })
	</script>




@endsection