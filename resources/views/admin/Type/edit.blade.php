@extends('layout.admin')

@section('title', $title)

@section('content')

<div class="card  col-lg-8" style = "margin-left: 150px">
    <div class="card-header">
        <strong>
            {{$title}}
        </strong>
         
    </div>
    <div class="card-body card-block">
        <form action="/admin/type/{{$res->id}}" method="post" enctype="multipart/form-data" class="">
            <div class="form-group">
                <label for="nf-email" class=" form-control-label">
                    类别
                </label>
                <input type="text"  name="tname" value="{{$res->tname}}"
                class="form-control">
                <span class="help-block">
                    输入类别名
                </span>
            </div>
            <div class="form-group">
                <label for="nf-password" class=" form-control-label">
                    路径
                </label>
                <input type="text"  name="path" value="{{$res->path}}"
                class="form-control">
                <span class="help-block">
                    输入路径
                </span>
                 {{ csrf_field() }}
                 {{ method_field('PUT') }}
            </div>
            <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">
                            类别图片
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="typepic" class="form-control-file">
                    </div>
                    <img src="{{$res->typepic}}" alt="">
                </div>
		        <div class="card-body">
            		<button type="submit" class="btn btn-outline-primary btn-lg btn-block">确认</button>
		        
		         
    			</div>
		    </form> 
    		
    </div>
   
</div>


@endsection