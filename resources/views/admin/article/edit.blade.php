@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">编辑文章</h1>
        </div>
        @if ($errors->has('error'))
            <span class="has-error">
                <strong class="help-block">{{ $errors->first('error') }}</strong>
            </span>
        @endif
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-9">
                        <form role="form" action="{{ url('admin/article/'.$data->id.'') }}" method="post"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label>父级分类</label>
                                <select class="form-control" name="cate_id">
                                    <option value="0">==请选择==</option>
                                    @foreach($category_data as $k=>$v)
                                        <option value="{{ $k }}" @if((isset($data) ? $data->cate_id : old('cate_id')) == $k) selected @endif>{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">标题</label>
                                <input class="form-control" placeholder="请填写标题" id="title" name="title" value="{{ $data->title or old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="has-error">
                                        <strong class="help-block">{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="description">描述</label>
                                <textarea class="form-control" rows="3" id="description" name="description" >{{ $data->description or old('description') }}</textarea>

                            </div>

                            <div class="form-group">
                                <label for="tag">关键字</label>
                                <select class="form-control" name="tags[]" id="tag" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->name }}" @if(isset($data) && $data->tags->contains($tag)) selected @endif>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="file">上传封面</label>
                                <input type="file" id="file" name="file">
                                @if ($errors->has('file'))
                                    <span class="has-error">
                                        <strong class="help-block">{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <img src="{{ $data->imageurl or old('file') }}" alt="" id="art_thumb_img" style="max-width:350px;max-height:100px;">
                            </div>

                            <div class="form-group">
                                <label for="content">内容</label>
                                <script type="text/javascript" charset="utf-8" src="{{ asset('ueditor/ueditor.config.js') }}"></script>
                                <script type="text/javascript" charset="utf-8" src="{{ asset('ueditor/ueditor.all.min.js') }}"> </script>
                                <script type="text/javascript" charset="utf-8" src="{{ asset('ueditor/lang/zh-cn/zh-cn.js') }}"></script>
                                <script id="editor" name="content" type="text/plain" style="width:860px;height:500px;">{!! $data->content or old('content') !!}</script>
                                <script type="text/javascript">
                                    var ue = UE.getEditor('editor');
                                </script>
                                <style>
                                    .edui-default{line-height: 28px;}
                                    div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                    {overflow: hidden; height:20px;}
                                    div.edui-box{overflow: hidden; height:22px;}
                                    .select2-container--default.select2-container--focus .select2-selection--multiple {
                                        border: solid #9e9e9e33 1px !important;
                                    }
                                    .select2-container--default .select2-selection--multiple {
                                        border: 1px solid #9e9e9e33 !important;
                                    }
                                </style>
                                @if ($errors->has('content'))
                                    <span class="has-error">
                                        <strong class="help-block">{{ $errors->first('content') }}</strong>
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
    <script type="text/javascript" src="{{ asset('js/funs.js') }}" charset="UTF-8"></script>
    <link href="//cdn.bootcss.com/select2/4.0.3/css/select2.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $("#tag").select2({
            placeholder: "请选择",
            allowClear: true,
            tags: true
        });
        $(function(){
            //上传看得到图片
            $("#file").change(function(){
                var objUrl = getObjectURL(this.files[0]);
                if (objUrl) {
                    $("#art_thumb_img").attr("src", objUrl).fadeIn();
                }
            });
        });
    </script>
@endsection