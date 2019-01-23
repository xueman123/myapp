        
@extends('layout.admin')

@section('title', $title)

@section('content')
<style>
    
    .color input{
        width:100px;
    }
</style>
<div class = "row" style = "margin-left:50px">
    @foreach($type['types'] as $k => $val)
    <a class="btn btn-outline-primary" href="/admin/type/{{$val->id}}" role="button" style = "margin:30px">{{$val->tname}}</a>
    @endforeach
</div>
<div class="">
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
                                    <div class="dataTables_length" id="bootstrap-data-table_length">
                                        <label>
                                         
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
                                           
                                        </label>
                                    </div>
                                </div>
                                <form action="/admin/goods" >
                                    <div class="row form-group" style = "margin-left:100px">
                                        <div class="col col-md-12">
                                            <div class="input-group">
                                                <input type="text" id="input2-group2" name="name" placeholder="商品名称" class="form-control">
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-outline-primary ti-search" style = "height:100%"></button>
                                                </div>
                                                <a class="btn btn-outline-primary" href="/admin/good/create" style = "margin-left:40px" role="button">添加商品</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer"
                                    role="grid" aria-describedby="bootstrap-data-table_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                                style="width: 137px;">
                                                    商品
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                                style="width: 137px;">
                                                    类别
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                                style="width: 237px;">
                                                    图片
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                                style="width: 237px;">
                                                    描述
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                                style="width: 237px;">
                                                    价格
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                                style="width: 237px;">
                                                    商品颜色
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" aria-label="Position: activate to sort column ascending"
                                                style="width: 100px;">
                                                    库存
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"  aria-label="Office: activate to sort column ascending"
                                                style="width: 173px;">
                                                    点击数
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"  aria-label="Salary: activate to sort column ascending"
                                                style="width: 128px;">
                                                    操作
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($res)
                                        @foreach ($res['goods'] as $k => $v)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    <a href="/admin/good/{{$v->id}}">{{$v->gname}}</a>
                                                </td>
                                                <td>
                                                    <a href=>{{$res->tname}}</a>

                                                </td>
                                                <td>
                                                    <img src="{{$v->pic}}" alt="">
                                                </td>
                                                <td>
                                                    {{$v->descr}}
                                                </td>
                                                <td>
                                                    {{$v->price}}
                                                </td>
                                                <td class = "color" gid = "{{$v->id}}">
                                                    @foreach  ($v['color'] as $k => $val)
                                                        <li style = 'list-style:none;'  >
                                                            <a href="javascript:" class = "licolor" ids = "{{$val->id}}" >{{$val->color}}</a>
                                                            <a href="javascript:" style = "float:right"><i class="fa ti-close" ids = "{{$val->id}}"></i></a>
                                                            <a href="javascript:" style = "float:right"><i class="fa ti-settings" ids = "{{$val->id}}"></i></a>
                                                        </li>

                                                    @endforeach
                                                    <a class="btn btn-outline-primary" href="jacascript:" role="button">添加颜色</a>
                                                </td>
                                                <td>
                                                    {{$v->stock}}
                                                </td>
                                                <td>
                                                    {{$v->num}}
                                                </td>
                                                <td>
                                                    <a href="/admin/good/{{$v->id}}/edit"><i class="fa fa-pencil" style = "margin:0px 10px"></i></a>
                                                    <a href="javascript:" "><i class="fa fa-trash-o" ids = "{{$v->id}}"></i></a>
                                                </td>
                                            </tr>
                                         @endforeach 
                                         @endif  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="bootstrap-data-table_info" role="status"
                                    aria-live="polite">
                                        商品展示
                                    </div>
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
<script src="/admins/assets/js/vendor/jquery-2.1.4.min.js"></script>

<script>
        $('.ti-settings').click(function(){
            var ids = $(this).attr('ids');
            window.location.href="/admin/colorpic?ids="+ids;

        })




        $('.fa-trash-o').click(function(){
            var th = $(this);
            ids = $(this).attr('ids')
            $.post(
                "{{url('/admin/good')}}/" + ids, 
                {
                    '_method': 'delete',
                    '_token': "{{csrf_token()}}"
                },
                function(data) {
                    console.log(data);
                    if (data == 1) {
                        th.parents('tr').remove();
                    }
                }
            )
        })
        
        //添加颜色
        $('.btn-outline-primary').click(function(){
            var a = $(this);
            gid = $(this).parents('.color').attr('gid')
            var input = '<input type = "text" name = "color" >';
            $(this).parent().append(input);
            inp = $('input[type="text"]');
            inp.focus();
            $(this).remove();

            inp.blur(function(){
                var color = $(this).val();
                
                $.get(
                    "{{url('/admin/color/create')}}", 
                    {'color':color,
                    'gid':gid
                    } ,
                    function(data){
                        console.log(data);
                        window.location.reload(true);

                })
            })
        })

        $('.ti-close').click(function(){
            var th = $(this);
            ids = $(this).attr('ids')
            $.post(
                "{{url('/admin/color')}}/" + ids, 
                {
                    '_method': 'delete',
                    '_token': "{{csrf_token()}}"
                },
                function(data) {
                    console.log(data);
                    if (data == 1) {
                        th.parents('li').remove();

                    }
                }
            )
        })



        $('.licolor').dblclick(function(){
            var val = $(this).text();
            inp = "<input type = 'text'name = 'color' value='"+val+"' >";
            // inp.val(val);
            var ids = $(this).attr('ids');
            $(this).replaceWith(inp);
            
            var input = $('input[name="color"]')
            input.select();
            var col = $(this).parents('.color');
            input.blur(function(){
                var color = $(this).val();
                var gid = $(this).parents('.color').attr('gid');
                // console.log(color);
                $.get(
                    "{{url('/admin/color/')}}?id="+ids, 
                    {
                        
                        'color':color,
                        'gid':gid,                   
                    } ,
                    function(data){
                        // console.log(data);
                        var li = "<a href='javascript:' ids = '"+data[0].id+"' class='licolor'>"+data[0].color+"</a>";

                        $(document).on('click','.color li', function(){
                             $('.licolor').dblclick(function(){
                                    var val = $(this).text();
                                    inp = "<input type = 'text'name = 'color' value='"+val+"'>";
                                    // inp.val(val);
                                    var ids = $(this).attr('ids');
                                    $(this).replaceWith(inp);
                                    
                                    var input = $('input[name="color"]')
                                    input.select();
                                    var col = $(this).parents('.color');
                                    input.blur(function(){
                                        var color = $(this).val();
                                        var gid = $(this).parents('.color').attr('gid');
                                        
                                        $.get(
                                            "{{url('/admin/color/')}}?id="+ids, 
                                            {
                                                
                                                'color':color,
                                                'gid':gid,                   
                                            } ,
                                            function(data){
                                                var li = "<a href='javascript:' ids = '"+data[0].id+"' class='licolor'>"+data[0].color+"</a>";

                                                $(document).on('click','.color li', function(){
                                                    
                                                });

                                                input.replaceWith(li);

                                        })
                                    })
                                })
                        });

                        input.replaceWith(li);
               
                })
            })
        })


        $('.paging_simple_numbers li').addClass('paginate_button').addClass('page-item');
        // $('.paging_simple_numbers li');
        $('.paging_simple_numbers a').addClass('page-link');
        $('.paging_simple_numbers span').addClass('page-link');
           
    </script>

@endsection