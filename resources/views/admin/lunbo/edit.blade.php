@extends('layout/admin')

@section('title',$title)

@section('content')
	
 	
    <div class="col-lg-8" style="margin-left:100px">
        
    <div class="card">
        <div class="card-header">
            <strong>
               
            </strong>
           
        </div>
        <div class="card-body card-block">
            <form action="/admin/lunbo/{{$rs->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">
                          
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">
                           
                        </p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">
                           网站地址
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="url" placeholder="输入地址"
                        class="form-control" value="{{$rs->url}}">
                        
                    </div>
                </div>
              <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">
                            头像
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="pic" class="form-control-file">
                    </div>
                </div>
           
            
        </div>
        
        <button type="submit" class="btn btn-primary btn-sm"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改</font></font></button>
    </form>
    </div>
</div>
    
@stop