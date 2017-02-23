@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">评论</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        <table data-toggle="table" data-url=""  data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="id" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true" >Comment ID</th>
                                <th data-field="id" data-sortable="true">Comment ID</th>
                                <th data-field="name"  data-sortable="true">Comment Name</th>
                                <th data-field="time" data-sortable="true">Comment Time</th>
                                <th data-field="action" data-sortable="false">操作</th>
                            </tr>
                            </thead>
                            @foreach($data as $v)
                                <tr>
                                    <td class="bs-checkbox">
                                        <input data-index="0" name="toolbar1" type="checkbox">
                                    </td>
                                    <td style="">{{ $v->id }}</td>
                                    <td style="">{{ $v->name }}</td>
                                    <td style="">{{ $v->created_at }}</td>
                                    <td class="action-buttons">
                                        <a href="javascript:;" class="trash" onclick="del({{ $v->id }})"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function del(id){
            layer.confirm('您确定要删除吗？',{
                btn:['确定','取消']
            },function(){
                $.post('{{ url('admin/comment') }}/'+id,{'_method':'delete','_token':'{{ csrf_token() }}'},function(data){
                    if(!data.status){
                        layer.msg(data.msg,{icon:6});
                        location.href = location.href;
                    }else{
                        layer.msg(data.msg,{icon:5});
                    }
                },'json');
                // layer.msg('确定删除',{icon:1});
            },function(){
                //            layer.msg('',{
                //                time:20000,
                //                btn:[]
                //            });
//                layer.close();
            });
        }
    </script>
@endsection