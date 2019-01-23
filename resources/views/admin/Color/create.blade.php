@extends('layout.admin')

@section('title', $title)

@section('content')

<div class="col-lg-6" style = "margin-left:200px">
    <div class="card">
        <div class="card-header">
            <strong>{{$res['goods']->gname}}</strong> 
        </div>
        <div class="card-body card-block">
            <form action="/admin/colorpic" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">{{$res->color}}</label></div>
                    <input type="hidden" name="cid" value = "{{$res->id}}">
                </div>
              
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">商品图片</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="colorpic" name="colorpic[]" multiple class="form-control-file"></div>
                </div>
        </div>
        {{csrf_field()}}
        <div class="card-body">
            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-star"></i>&nbsp; 确认添加</button>
        </div>
        </form>
    </div>
</div>

@endsection