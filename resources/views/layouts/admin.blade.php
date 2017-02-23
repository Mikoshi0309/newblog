<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forms</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-table.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('layer/layer.js') }}"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('js/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/respond.min.js') }}"></script>

    <![endif]-->
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                        <li><a href="{{ url('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li class="active"><a href="index.html"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
        <li><a href="{{ url('admin/article/create') }}"><span class="glyphicon glyphicon-th"></span> Widgets</a></li>
        <li><a href="charts.html"><span class="glyphicon glyphicon-stats"></span> Charts</a></li>
        <li><a href="tables.html"><span class="glyphicon glyphicon-list-alt"></span> Tables</a></li>
        <li><a href="forms.html"><span class="glyphicon glyphicon-pencil"></span> Forms</a></li>
        <li><a href="panels.html"><span class="glyphicon glyphicon-info-sign"></span> Alerts &amp; Panels</a></li>
        <li class="parent ">
            <a href="#">
                <span class="glyphicon glyphicon-list"></span> Dropdown <span data-toggle="collapse" href="#sub-item-0" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-0">
                <li>
                    <a class="" href="#">
                        <span class="glyphicon glyphicon-share-alt"></span> Sub Item 1
                    </a>
                </li>
                <li>
                    <a class="" href="#">
                        <span class="glyphicon glyphicon-share-alt"></span> Sub Item 2
                    </a>
                </li>
                <li>
                    <a class="" href="#">
                        <span class="glyphicon glyphicon-share-alt"></span> Sub Item 3
                    </a>
                </li>
            </ul>
        </li>
        <li role="presentation" class="divider"></li>
        <li class="parent ">
            <a href="#">
                <span class="glyphicon glyphicon-list"></span> 文章
                <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right">
                    <em class="glyphicon glyphicon-s glyphicon-plus"></em>
                </span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="" href="{{ url('admin/article') }}">
                        <span class="glyphicon glyphicon-share-alt"></span> 文章列表
                    </a>
                </li>
                <li>
                    <a class="" href="{{ url('admin/article/create') }}">
                        <span class="glyphicon glyphicon-share-alt"></span> 添加文章
                    </a>
                </li>
            </ul>
        </li>
        <li class="parent ">
            <a href="#">
                <span class="glyphicon glyphicon-list"></span> 分类
                <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right">
                    <em class="glyphicon glyphicon-s glyphicon-plus"></em>
                </span>
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li>
                    <a class="" href="{{ url('admin/category') }}">
                        <span class="glyphicon glyphicon-share-alt"></span> 分类列表
                    </a>
                </li>
                <li>
                    <a class="" href="{{ url('admin/category/create') }}">
                        <span class="glyphicon glyphicon-share-alt"></span> 添加分类
                    </a>
                </li>
            </ul>
        </li>
        <li><a href="{{ url('admin/tag') }}" target=""><span class="glyphicon glyphicon-plus-sign"></span> 标签列表</a></li>
        <li><a href="{{ url('admin/comment') }}" target=""><span class="glyphicon glyphicon-plus-sign"></span> 评论列表</a></li>
    </ul>
</div><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
@yield('content')

</div>


<script src="{{ asset('js/chart.min.js') }}"></script>
<script src="{{ asset('js/chart-data.js') }}"></script>
<script src="{{ asset('js/easypiechart.js') }}"></script>
<script src="{{ asset('js/easypiechart-data.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/bootstrap-table.js') }}"></script>

<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>

</html>