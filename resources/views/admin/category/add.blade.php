@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">添加分类</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" class="form-horizontal" action="{{ route('category.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>父级分类</label>
                                <select class="form-control" name="cate_id">
                                    <option value="0">==请选择==</option>
                                    @foreach($data as $k=>$v)
                                        <option value="{{ $k }}" @if(old('cate_id') && old('cate_id') == $k) selected @endif>{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">分类名称</label>
                                <input id="name" name="name" class="form-control" placeholder="请填写分类名称" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="has-error">
                                        <strong class="help-block">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">提交</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection