@extends('layout/admin')

@section('title',$title)

@section('content')
<script src="/admin/assets/js/jquery-3.2.1.min.js"></script>

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
                                    <form action="/admin/lunbo">
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
                                                style="width: 113px;">
                                                    网站地址
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
                                                
                                                <td>
                                                    {{$v->url}}
                                                </td>
                                               
                                                <td>
                                                 <img src="{{$v->pic}}" alt="" width="120px">
                                                </td>
                                                <td width="150">
                                                    <button class="btn btn-success">
                                                        <a href="/admin/lunbo/{{$v->id}}/edit" style="color:white;display:block">修改</a>
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
                    </center>                                                 ''                     
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

        var ids = $(this).attr('ids');

        $.post(
                "{{url('/admin/lunbo')}}/" + ids,

                {
                      '_method':'delete',
                    '_token':"{{csrf_token()}}" 
                },
                function(data){
                    if(data == 1){
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
@stop

