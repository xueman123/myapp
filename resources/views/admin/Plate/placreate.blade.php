@extends('layout.admin')

@section('title', $title)

@section('content')

<div class="card  col-lg-8" style = "margin-left: 150px">
    <div class="card-header">
        <strong>
            Normal
        </strong>
        Form
    </div>
    <div class="card-body card-block" >
        <form action="/admin/plate" method="post" class="">
            <div class="form-group">
                <label for="nf-email" class=" form-control-label">
                    分区名
                </label>
                <input type="text"  name="pname" placeholder="platename"
                class="form-control">
                <span class="help-block">
                    输入分区名
                </span>
            </div>
            <div class="form-group">
                <label for="nf-password" class=" form-control-label">
                    路径
                </label>
                <input type="text"  name="purl" placeholder="url"
                class="form-control">
                <span class="help-block">
                    输入路径
                </span>
                 {{ csrf_field() }}
            </div>
		        <div class="card-body">
            		<button type="submit" class="btn btn-outline-primary btn-lg btn-block">确认</button>
		        
		         
    			</div>
		    </form> 
    		
    </div>
   
</div>


@endsection