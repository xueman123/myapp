@extends('layout.admin')

@section('title', $title)

@section('content')

<div class="col-lg-11">
    <div class="card" style = "margin-left:200px">
        <div class="card-header">
            <strong>
                Basic Form
            </strong>
            Elements
        </div>
        <div class="card-body card-block col-lg-10">
            <form action="/admin/good" method="post" enctype="multipart/form-data" class="form-horizontal">
               
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">
                            商品
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="gname" placeholder="goodsname"
                        class="form-control">
                        <small class="form-text text-muted">
                            商品名称
                        </small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">
                           商品价格
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="email-input" name="price" placeholder="商品价格"
                        class="form-control">
                        <small class="help-block form-text">
                            price
                        </small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="password-input" class=" form-control-label">
                            库存
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="password-input" name="stock" placeholder="Password"
                        class="form-control">
                        <small class="help-block form-text">
                            商品数量
                        </small>
                    </div>
                </div>
               	<div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">商品类别</label></div>
                    <div class="col-12 col-md-9">
                        <select name="tid" id="select" class="form-control">
                        	@foreach ($res as $k => $v)
                                <option value="{{$v->id}}">{{$v->tname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class=" form-control-label">
                            商品描述
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="descr" id="textarea-input" style="resize:none;" rows="3"
                        class="form-control">
                        </textarea>
                    </div>
                </div>
               
              
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">
                            商品图片
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="pic" class="form-control-file">
                    </div>
                </div>
               {{csrf_field()}}
        </div>
            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">添加商品</button>
     	</form>
    </div>
  
</div>

@endsection