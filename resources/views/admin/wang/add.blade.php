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
            <form action="/admin/wang" method="post" enctype="multipart/form-data" class="form-horizontal">
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
				           网站标题
				        </label>
				    </div>
				    <div class="col-12 col-md-9">
				        <input type="text"  name="title" placeholder="输入网站标题"
				        class="form-control">
				        
				    </div>
				</div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">
                            网站关键字
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="keyword" placeholder="请输入网站关键字
                        " class="form-control">
                        <small class="help-block form-text">
                          
                        </small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">
                            网站版权
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="banquan" placeholder="请输入网站版权
                        " class="form-control">
                        <small class="help-block form-text">
                            
                        </small>
                    </div>
                </div>                                     
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">
                            Logo
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="pic" class="form-control-file">
                    </div>
                </div>
               <!--  <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">
                            网站状态
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="radio" id="file-input" name="status" >开启
                        <input type="radio" id="file-input" name="status" >关闭
                    </div>
                </div> -->
               
            
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary btn-sm"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改</font></font></button>
    </form>
    </div>
</div>
			
@stop