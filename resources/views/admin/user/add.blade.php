@extends('layout.admin')

@section('title',$title)

@section('content')
	

 	<div class="col-lg-8" style="margin-left:100px">
 		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
	    @endif
    <div class="card">
        <div class="card-header">
            <strong>
               
            </strong>
           
        </div>
        <div class="card-body card-block">
            <form action="/admin/user" method="post" enctype="multipart/form-data" class="form-horizontal">
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
				            用户名
				        </label>
				    </div>
				    <div class="col-12 col-md-9">
				        <input type="text"  name="username" placeholder="输入用户名"
				        class="form-control">
				        
				    </div>
				</div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">
                            密码
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password"  name="password" placeholder="Password
                        " class="form-control">
                        <small class="help-block form-text">
                            输入密码
                        </small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="password-input" class=" form-control-label">
                            密码
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password"  name="repass" placeholder="Password"
                        class="form-control">
                        <small class="help-block form-text">
                            再次输入密码
                        </small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="password-input" class=" form-control-label">
                            电话
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="phone" placeholder="phone"
                        class="form-control">
                        <small class="help-block form-text">
                            电话
                        </small>
                    </div>
                </div>
                <div class="row form-group">
				    <div class="col col-md-3">
				        <label for="email-input" class=" form-control-label">
				            邮箱
				        </label>
				    </div>
				    <div class="col-12 col-md-9">
				        <input type="email" id="email-input" name="email" placeholder="Enter Email"
				        class="form-control">
				    </div>
				</div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">
                            权限
                        </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="qx" id="select" class="form-control">
                            <option value="0" checked>
                                超级管理员
                            </option>
                            <option value="1">
                                管理员
                            </option>
                        </select>
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

	
	
		  <script src="/admin/assets/js/vendor/jquery-2.1.4.min.js"></script>

		  <script>
		  	
		  	setTimeout(function(){
		  		$('.alert-danger').hide(2000);
		  	})
		  </script>
		  	
		 
		  
		
	

@stop