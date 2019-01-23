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
                           网站配置
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
                                    <form action="/admin/wang">
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
                                                    网站标题
                                                </th>
                                                
                                                 <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 111px;">
                                                    网站关键字
                                                </th>
                                                  <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 111px;">
                                                    网站状态
                                                </th>
                                                  <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 111px;">
                                                    网站Logo
                                                </th>
                                                  <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 111px;">
                                                    网站版权
                                                </th>
                                                 <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 111px;">
                                                    操作
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      
                                            <tr role="row" class="odd">
                                            
                                                <td class="sorting_1">
                                                {{$rs[0]->id}}
                                                </td>
                                                     
                                                <td>
                                                {{$rs[0]->title}}
                                                </td>
                                               <td>
                                                 {{$rs[0]->keyword}}
                                               </td>
                                               <td>
                                                 {{$rs[0]->status}}
                                               </td>
                                               <td>
                                                  <img src="{{$rs[0]->pic}}" alt="" width="120px" height="100px">     
                                               </td>
                                                <td>
                                                {{$rs[0]->banquan}}
                                                </td>
                                                <td width="150">
                                                    <button class="btn btn-success">
                                                        <a href="/admin/wang/{{$rs[0]->id}}/edit" style="color:white;display:block">修改</a>
                                                    </button>
                                                   
                                                  
                                                   
                                                   
                                                </td>

                                            </tr>
                                        
                                        </tbody>

                                    </table>
                                    </form>
                        
                                </div>

                            </div>
                          
                        </div>
                                                                          
                    </div>
                
                </div>
            </div>

        </div>

    </div>
    <!-- .animated -->

</div>

   
@stop

