@extends('layout/admin')

@section('title',$title)
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<script src="/admin/assets/js/jquery-3.2.1.min.js"></script>
<style>
    .ftitle input{width: 100px}
</style>

	<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">
                            Data Table
                        </strong>
                    </div>
                    <div class="card-body">
                        <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <!-- <div class="dataTables_length" id="bootstrap-data-table_length">
                                        <label>
                                            Show
                                            <select name="bootstrap-data-table_length" aria-controls="bootstrap-data-table"
                                            class="form-control form-control-sm">
                                                <option value="10">
                                                    10
                                                </option>
                                                <option value="20">
                                                    20
                                                </option>
                                                <option value="50">
                                                    50
                                                </option>
                                                <option value="-1">
                                                    All
                                                </option>
                                            </select>
                                            entries
                                        </label>
                                    </div> -->
                                </div>
                              <!--   <div class="col-sm-12 col-md-6">
                                    <div id="bootstrap-data-table_filter" class="dataTables_filter">
                                        <label>
                                            Search:
                                            <input type="search" class="form-control form-control-sm" placeholder=""
                                            aria-controls="bootstrap-data-table">
                                        </label>
                                    </div>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                	<form action="/admin/friend">
                                		{{csrf_field()}}

                                	
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer"
                                    role="grid" aria-describedby="bootstrap-data-table_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="2" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                                style="width: 93px;">
                                                    ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 143px;">
                                                    标题
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 139px;">
                                                    链接地址
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 111px;">
                                                    描述
                                                </th>
                                                 <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 111px;">
                                                    图片
                                                </th>
                                                 <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 111px;">
                                                    操作
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($rs as $k => $v)
                                            <tr role="row" class="odd">
											
                                                <td class="sorting_1">
                                                    {{$v->id}}
                                                </td>
                                                <td class="ftitle">
                                                    {{$v->title}}
                                                    
                                                </td>
                                                <td>
                                                    {{$v->url}}
                                                </td>
                                                <td>
                                                    {{$v->descript}}
                                                </td>
                                                <td>
                                                    <img src="{{$v->pic}}" alt="" width="120px">
                                                </td>
                                                <td width="150">
                                                    <button class="btn btn-success">
                                                    	<a href="/admin/friend/{{$v->id}}/edit" style="color:white;display:block">修改</a>
                                                    </button>
                                                   
                                                    <button class="btn btn-danger"  ids = "{{$v->id}}">
                                                        <a href="javascript:''" style="color:white;display:">删除</a>
                                                    </button>
                                                   
                                                   
                                                </td>

                                            </tr>
                                           @endforeach
                                        </tbody>

                                    </table>
                                    </form>
                        
                                </div>

                            </div>
                          
                        </div>
                    <center style="margin-left:200px">
                    <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table_paginate">
                                    {{$rs -> links()}}
                                    </div>   
                    </div>
                    </center>                                      		                        	
                    </div>
				
                </div>
            </div>

        </div>

    </div>
    <!-- .animated -->

</div>
<script>
        $('.btn-danger').click(function(){
            var th = $(this);
            var ids = $(this).attr('ids')
            // console.log(ids);
            $.post(
                "{{url('/admin/friend')}}/" + ids, 
                {
                    '_method': 'delete',
                    '_token': "{{csrf_token()}}"
                },
                function(data) {
                    // console.log(data);
                    if (data == 1) {
                        th.parents('tr').remove();
                    }
                    
                }
            )
            return false;
        })
    </script>

           <script>
                $('.paging_simple_numbers li').addClass('paginate_button').addClass('page-item');
        // $('.paging_simple_numbers li');
        $('.paging_simple_numbers a').addClass('page-link');
        $('.paging_simple_numbers span').addClass('page-link');

           </script>    


           <script>


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                $('.ftitle').dblclick(function(){

                    var um = $(this);

                    //获取td里面的内容
                    var ha = $(this).text().trim();
                    // console.log(ha);

                   //创建input表框
                   var inp = $('<input type="text"/>' );
                   $(this).empty();

                   $(this).append(inp);

                   inp.val(ha);
                   inp.focus();
                   inp.select();

                  inp.blur(function(){
                    //获取新值
                    var xin = $(this).val().trim();
                    if(xin == ''){
                        alert('输入的值不能为空');
                        return;

                    }

                    //获取id
                    var ids = $(this).parent().prev().text().trim();
                    
                    $.post('/admin/friajax',{title:xin,id:ids},function(data){

                       if(data == '1'){

                        um.text(xin);
                       }else {
                        um.text(ha); 
                       }
                    })
                 

                  })

                })

           </script>     
@stop

