<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>MikoBlog</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cufon-yui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/arial.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cuf_run.js') }}"></script>
    <script type="text/javascript" src="{{ asset('layer/layer.js') }}"></script>
    <!-- CuFon ends -->
</head>
<body>
<div class="main">
    <div class="header">
        <div class="header_resize">
            <div class="logo">
                <h1><a href="{{ url('/') }}">Miko<span> Blog</span></a><small>PHP LINUX MYSQL APACHE</small></h1>
            </div>
            <div class="clr"></div>
            <div class="menu_nav">
                <ul>
                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="support.html">Support</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li class="last"><a href="contact.html">Contact Us</a></li>
                </ul>
                <div class="search">
                    <form id="form" name="form" method="post" action="{{ url('search/') }}">
                        {{ csrf_field() }}
                        <span>
                          <input name="key" type="text" class="keywords" id="textfield" maxlength="50" placeholder="请输入...." />
                        </span>
                        <input type="image" src="{{ asset('images/search.gif') }}" class="button" />

                    </form>
                </div>
                <!--/search -->
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="clr"></div>
@yield('content')


    <div class="fbg">
        <div class="fbg_resize">
            <div class="col c1">
                <h2><span>Image Gallery</span></h2>
                <a href="#"><img src="{{ asset('images/gallery_1.jpg') }}" width="58" height="58" alt="pix" /></a> <a href="#"><img src="{{ url('images/gallery_2.jpg') }}" width="58" height="58" alt="pix" /></a> <a href="#"><img src="{{ asset('images/gallery_3.jpg') }}" width="58" height="58" alt="pix" /></a> <a href="#"><img src="{{ asset('images/gallery_4.jpg') }}" width="58" height="58" alt="pix" /></a> <a href="#"><img src="{{ asset('images/gallery_5.jpg') }}" width="58" height="58" alt="pix" /></a> <a href="#"><img src="{{ asset('images/gallery_6.jpg') }}" width="58" height="58" alt="pix" /></a> </div>
            <div class="col c2">
                <h2><span>Lorem Ipsum</span></h2>
                <p>Lorem ipsum dolor<br />
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam.</p>
            </div>
            <div class="col c3">
                <h2><span>Contact</span></h2>
                <p>Nullam quam lorem, tristique non vestibulum nec, consectetur in risus. Aliquam a quam vel leo gravida gravida eu porttitor dui. Nulla pharetra, mauris vitae interdum dignissim, justo nunc suscipit ipsum. <a href="#">mail@example.com</a><br />
                    <a href="#">+1 (123) 444-5677</a></p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="footer">
            <div class="clr"></div>
        </div>
    </div>
</div>
</body>
</html>