@extends('layout.admin')

@section('title',$title)

@section('content')




 	<div class="col-lg-8" style="margin-left:100px">
 		
    <div class="card">
        <div class="card-header">
            <strong>
               
            </strong>
           
        </div>
        <div class="card-body card-block">
            <form action="/admin/friend" method="post" enctype="multipart/form-data" class="form-horizontal">
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
				           标题
				        </label>
				    </div>
				    <div class="col-12 col-md-9">
				        <input type="text"  name="title" placeholder="输入标题"
				        class="form-control">
				        
				    </div>
				</div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">
                            网站地址
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="url" placeholder="请输入网站地址
                        " class="form-control">
                        <small class="help-block form-text">
                          
                        </small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">
                            简介
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="descript" placeholder="请输入简介
                        " class="form-control">
                        <small class="help-block form-text">
                            
                        </small>
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
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary btn-sm"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button>
    </form>
    </div>
</div>
			
@stop
