@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">文章</h1>
            <a class="btn pull-right" role="button" href="{{ url('admin/article/create') }}">
                <i class="glyphicon glyphicon-plus icon-list-alt"></i>
            </a>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toggle="table" data-url=""  data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="id" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true" >Article ID</th>
                            <th data-field="id" data-sortable="true">Article ID</th>
                            <th data-field="title"  data-sortable="false">Article Title</th>
                            <th data-field="category"  data-sortable="false">Article_Category</th>
                            <th data-field="count"  data-sortable="true">View_Count</th>
                            <th data-field="time" data-sortable="true">Article Time</th>
                            <th data-field="action" data-sortable="false">操作</th>
                        </tr>
                        </thead>
                        @foreach($data as $v)
                            <tr>
                                <td class="bs-checkbox">
                                    <input data-index="0" name="toolbar1" type="checkbox">
                                </td>
                                <td style="">{{ $v->id }}</td>
                                <td style="">{{ $v->title }}</td>
                                <td style="">@if($v->category) {{ $v->category->name }} @else 无分类 @endif</td>
                                <td style="">{{ $v->view_count }}</td>
                                <td style="">{{ $v->created_at }}</td>
                                <td class="action-buttons">
                                    <a href="{{ url('admin/article/'.$v->id.'/edit') }}" style="margin-right: 10px;"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="javascript:;" class="trash" onclick="del({{ $v->id }})" ><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function del(id){
            layer.confirm('您确定要删除吗？',{
                btn:['确定','取消']
            },function(){
                $.post('{{ url('admin/article/') }}/'+id,{'_method':'delete','_token':'{{ csrf_token() }}'},function(data){
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