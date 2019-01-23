@extends('layout.admin')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        订单详情
                    </font>
                </font>
            </strong>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead style="font-size: 13px">
                    <tr>
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
                                    订单ID
                                </font>
                            </font>
                        </th>
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    商品ID
                                </font>
                            </font>
                        </th>
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    商品名称
                                </font>
                            </font>
                        </th>
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    单价
                                </font>
                            </font>
                        </th>
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    数量
                                </font>
                            </font>
                        </th>
                        <th scope="col">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    处理
                                </font>
                            </font>
                        </th>
                    </tr>
                </thead>
                <tbody style="font-size: 11px">
                	@foreach($rs as $k => $v)
                    <tr>
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
                                    {{$v->oid}}
                                </font>
                            </font>
                        </td>
                        <td>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->gid}}
                                </font>
                            </font>
                        </td>
                        <td>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->gname}}
                                </font>
                            </font>
                        </td>
                        <td>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$v->price}}
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
                                </font>
                            </font>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop