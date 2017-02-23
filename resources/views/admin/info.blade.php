@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">基本信息</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3 col-lg-offset-1">
            <div class="panel panel-blue panel-widget ">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <em class="glyphicon glyphicon-font glyphicon-l"></em>
                    </div>
                    <div class="col-sm-9 col-lg-6 widget-right">
                        <div class="large text-center">{{ $article_count }}</div>
                        <div class="text-center">Articles</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3 ">
            <div class="panel panel-orange panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <em class="glyphicon glyphicon-list-alt glyphicon-l"></em>
                    </div>
                    <div class="col-sm-9 col-lg-6 widget-right">
                        <div class="large text-center">{{ $category_count }}</div>
                        <div class="text-center">Categorys</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-teal panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <em class="glyphicon glyphicon-tags glyphicon-l"></em>
                    </div>
                    <div class="col-sm-9 col-lg-6 widget-right">
                        <div class="large text-center">{{ $tag_count }}</div>
                        <div class="text-center">Tags</div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    <div class="row col-xs-12">
        <ul class="list-group">
            <li class="list-group-item">
                <label>操作系统:</label><span>{{ PHP_OS }}</span>
            </li>
            <li class="list-group-item">
                <label>运行环境:</label><span>{{ $_SERVER['SERVER_SOFTWARE'] }}</span>
            </li>
            <li class="list-group-item">
                <label>PHP运行方式:</label><span>apache2handler</span>
            </li>
            <li class="list-group-item">
                <label>静静设计-版本:</label><span>v-1.0</span>
            </li>
            <li class="list-group-item">
                <label>上传附件限制:</label><span>{{ get_cfg_var("upload_max_filesize") }}</span>
            </li>
            <li class="list-group-item">
                <label>北京时间:</label><span>{{ date("Y-m-d H:i:s") }}</span>
            </li>
            <li class="list-group-item">
                <label>服务器域名/IP:</label><span>{{ $_SERVER['SERVER_NAME'] }} {{ $_SERVER['SERVER_ADDR'] }}</span>
            </li>
            <li class="list-group-item">
                <label>Host:</label><span>{{ $_SERVER['SERVER_ADDR'] }}</span>
            </li>
        </ul>
    </div>
@endsection