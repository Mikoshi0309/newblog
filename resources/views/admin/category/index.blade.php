@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">分类</h1>
            <a class="btn pull-right" role="button" href="{{ url('admin/category/create') }}">
                <i class="glyphicon glyphicon-plus icon-list-alt"></i>
            </a>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        <table data-toggle="table" data-url=""  data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true" >category ID</th>
                                <th data-field="id" data-sortable="true">category ID</th>
                                <th data-field="name"  data-sortable="true">category Name</th>
                                <th data-field="action" data-sortable="false">操作</th>
                            </tr>
                            </thead>
                            @foreach($data as $k=>$v)
                                <tr>
                                    <td class="bs-checkbox">
                                        <input data-index="0" name="toolbar1" type="checkbox">
                                    </td>
                                    <td style="">{{ $k }}</td>
                                    <td style="">{{ $v }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ url('admin/category/'.$k.'/edit') }}" style="margin-right: 10px;"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="javascript:;" class="trash" onclick="del({{ $k }})" ><span class="glyphicon glyphicon-trash"></span></a>
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
                $.post('{{ url('admin/category') }}/'+id,{'_method':'delete','_token':'{{ csrf_token() }}'},function(data){
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