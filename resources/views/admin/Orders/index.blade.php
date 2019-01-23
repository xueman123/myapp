@extends('layout.admin')

@section('title', $title)

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        订单处理
                    </font>
                    <font style="vertical-align: inherit; float: right;">
                        用户名:<input type="search" class="form-control-sm"> <button>搜索</button>
                    </font>
                </font>
            </strong>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead style="font-size: 13px">
                    <tr align="center">
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    ID
                                </font>
                            </font>
                        </th>
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    用户ID
                                </font>
                            </font>
                        </th>
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    收货人
                                </font>
                            </font>
                        </th>
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    收货地址
                                </font>
                            </font>
                        </th>
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    收货人电话
                                </font>
                            </font>
                        </th>
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    购买数量
                                </font>
                            </font>
                        </th>
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    购买时间
                                </font>
                            </font>
                        </th>
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    总金额
                                </font>
                            </font>
                        </th>
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    卖家留言
                                </font>
                            </font>
                        </th>
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    状态
                                </font>
                            </font>
                        </th>
                    </tr>
                </thead>
                <tbody style="font-size: 12px">
                	@foreach($res as $k => $v)
                    <tr align="center">
                        <th scope="row">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->id}}
                                </font>
                            </font>
                        </th>
                        <td>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->uid}}
                                </font>
                            </font>
                        </td>
                        <td>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->username}}
                                </font>
                            </font>
                        </td>
                        
                        <td>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->address}}
                                </font>
                            </font>
                        </td>
                        <td>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->phone}}
                                </font>
                            </font>
                        </td>
                        <td>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->num}}
                                </font>
                            </font>
                        </td>
                        <td>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{date('Y-m-d H:i:s',$v->addtime)}}
                                </font>
                            </font>
                        </td>
                        <td>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->total}}
                                </font>
                            </font>
                        </td>
                        <td>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->msg}}
                                </font>
                            </font>
                        </td>
                        <td>
                            <select name="selectSm" class="selectSm" value="{{$v->status}}" ids="{{$v->id}}">
                                <option value="0" @if ($v->status == 0) selected @endif>待审核</option>
                                <option value="2" @if ($v->status == 1) selected @endif>已发货</option>
                                <option value="3" @if ($v->status == 2) selected @endif>交易完成</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop

@section('js')

<script>

    $('.selectSm').change(function () {

        var ids = $(this).attr('ids');
        var sta = $(this).val();

        $.post('/admin/orders/'+ids+'?+sta='+sta,
        {
            '_method': 'put',
            '_token': "{{csrf_token()}}"
        },
        function(data) {
            console.log(data);
        }
        )

    })
</script>
</script>
@stop