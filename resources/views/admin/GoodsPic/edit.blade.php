@extends('layout.admin')

@section('title', $title)

@section('content')

<div class="col-lg-11">
    <div class="card" style = "margin-left:200px">
        <div class="card-header">
            <strong>
                添加商品图片
            </strong>
            
        </div>
        <div class="card-body card-block col-lg-10">
            <form action="/admin/goodspic/{{$res->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="gid"  value="{{$res['goods']->id}}">
               
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">

                            商品
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" disabled name="gname" placeholder="Disabled"  value="{{$res['goods']->gname}}"
                        class="form-control">
                        <small class="form-text text-muted">
                            商品名称
                        </small>
                    </div>
                </div>
               <div class="row form-group">
               	<div class="col col-md-3"><label for="select" class=" form-control-label">排序</label></div>

                    <div class="col-12 col-md-9">
                        <select name="sort" id="select" class="form-control">
						@for ($i=1; $i<=$num;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                        </select>
                    </div>      
                </div>
              	<div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">状态</label></div>
                <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="inline-checkbox1" class="form-check-label ">
                                <input type="radio" id="inline-checkbox1" @if ($res->stats==1) checked @endif name="stats" value="1" class="form-check-input">发布
                            </label>
                            <label for="inline-checkbox2" class="form-check-label ">
                                <input type="radio" id="inline-checkbox2" @if ($res->stats==0) checked @endif name="stats" value="0" class="form-check-input">关闭
                            </label>
                        </div>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">
                            商品图片
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="profile" multiple class="form-control-file">
                        <img src="{{$res->profile}}" alt="">
                    </div>
                </div>
               {{csrf_field()}}
               {{method_field('PUT')}}
        </div>
            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">修改图片</button>
     	</form>
    </div>
  
</div>

@endsection