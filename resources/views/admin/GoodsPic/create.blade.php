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
            <form action="/admin/goodspic" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden"  name="gid"  value="{{$res->id}}">
               
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">
                            商品
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="gname" Disabled  value="{{$res->gname}}"
                        class="form-control">
                        <small class="form-text text-muted">
                            商品名称
                        </small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class=" form-control-label">
                            商品描述
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="descr" id="textarea-input" readonly="true" style="resize:none;" rows="3"
                        class="form-control">{{$res->descr}}
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
                        <input type="file" id="file-input" name="profile[]" multiple class="form-control-file">

                    </div>
                </div>
               {{csrf_field()}}
        </div>
            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">添加图片</button>
     	</form>
    </div>
  
</div>

@endsection