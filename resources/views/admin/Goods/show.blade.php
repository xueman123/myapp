@extends('layout.admin')

@section('title', $title)

@section('content')


<div class="col-lg-11" style = "margin-left:60px">

    
    <div class="card">
        <form action="/admin/goodspic/create" method = "get">
            <div class="card-header">
                <strong class="card-title">
                    {{$res->gname}}
                    <input type="hidden" name = "id" value = "{{$res->id}}">
                </strong>
                        <button type="submit" class="btn btn-outline-primary">添加图片</button>

            </div>
        </form>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" width = "50">
                            #
                        </th>
                        <th scope="col" width = "100">
                            分类
                        </th>
                        <th scope="col">
                            商品图片
                        </th>
                        <th scope="col" width = "150">
                            图片名称
                        </th>
                        <th scope="col" width = "50">
                            排序
                        </th>
                        <th scope="col" width = "200">
                            更新时间
                        </th>
                        <th scope="col" width = "100">
                            发布状态
                        </th>
                        <th scope="col" width = "100">
                            管理                           
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($res)
                    @foreach($res['goodsPic'] as $k => $v)
                    <tr>
                        <th scope="row">
                            {{$v->id}}
                        </th>
                        <td>
                            {{$type['types']->tname}}
                        </td>
                        <td>
                            <img src="{{$v->profile}}" alt="">
                        </td>
                        <td>
                            {{$res->gname}}
                        </td>
                        <td>
                            {{$v->sort}}
                        </td>
                        <td>
                            {{date('Y-m-d H:i:s', $v->pictime)}}
                        </td>
                        <td>
                            @if($v->stats==0)未发布
                            @elseif($v->stats==1) 已发布
                            @endif
                        </td>
                        <td>
                            <a href="/admin/goodspic/{{$v->id}}/edit"><i class="fa fa-pencil" style = "margin:0px 10px"></i></a>
                            <a href="javascript:" "><i class="fa fa-trash-o" ids = "{{$v->id}}"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="/admins/assets/js/vendor/jquery-2.1.4.min.js"></script>

<script>
        $('.fa-trash-o').click(function(){
            var th = $(this);
            ids = $(this).attr('ids')
            $.post(
                "{{url('/admin/goodspic')}}/" + ids, 
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
    </script>

@endsection