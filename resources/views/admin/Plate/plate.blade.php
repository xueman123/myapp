@extends('layout.admin')

@section('title', $title)

@section('content')

    
	<div class="card-body" style = "background: white;border-radius:10px ">
		<form action="/admin/plate/create" method = "get" >
	        <button type="submit" style = "margin-left:40px" class="btn btn-outline-primary">添加分区</button>
    	</form>
    </div>
    <div class = "content" >
	    <div class = 'row'>	

		
			<div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">分区管理</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" style = "text-align:center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">分区名</th>
                                    <th scope="col">路径</th>
                                    <th scope="col" style = "width: 100px">配置</th>
                                </tr>
                            </thead>
                            <tbody>
							@foreach ($res as $k => $v)
                                <tr>
                                    <th scope="row">{{$v->id}}</th>
                                    <td><a href="/admin/plate/{{$v->id}}" class = "type" ids = "{{$v->id}}" >{{$v->pname}}</a></td>
                                    <td>{{$v->purl}}</td>
                                    <td class = "caozuo">
                                    	<a href="/admin/plate/{{$v->id}}/edit"><i class="fa fa-pencil" style = "margin:0px 10px"></i></a>
                                    	<a href="javascript:" "><i class="fa fa-trash-o" ids = "{{$v->id}}"></i></a>
                                    </td>
                                </tr>
							@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
	
	    </div>
    </div>       
    <script src = "/admins/assets/js/vendor/jquery-2.1.4.min.js"></script>
	<script>
		$('.fa-trash-o').click(function(){
			var i = $(this)
			var ids = $(this).attr('ids');
			$.post(
                "{{url('/admin/plate')}}/" + ids, 
                {
                    '_method': 'delete',
                    '_token': "{{csrf_token()}}"
                },
                function(data) {
                    if(data == 1){
                    	i.parents('tr').remove();
                    	// console.log(data);
                    }
                    
                }
            )
		})
        /*$('.type').click(function(){
            var ids = $(this).attr('ids');
            console.log(id);
            $.get('/admin/type', {'ids':ids}, function(){
                window.location.href='/admin/type';
            })
            
        })*/
	</script>




@endsection