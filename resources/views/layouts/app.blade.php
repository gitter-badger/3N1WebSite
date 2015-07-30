<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>
        @section('title')
            「赣+」赣州青年社区
        @show
    </title>

    <link href="{{ asset('/bowerAssets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bowerAssets/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/style/style_old.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/style/style.css') }}" rel="stylesheet">
    <script src="{{ asset('bowerAssets/jquery/dist/jquery.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Header -->
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topNav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">赣+ <small>青年家园</small></a>
        </div>

        <div class="collapse navbar-collapse" id="topNav">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('topic*') ? 'active' : '' }}"><a href="{{ url('/topic') }}">{{ trans('app.Topic') }}</a></li>
                <li class="{{ Request::is('article*') ? 'active' : '' }}"><a href="{{ url('/article') }}">资讯</a></li>
                <li class="{{ Request::is('blog*') ? 'active' : '' }}"><a href="{{ url('/blog') }}">日志</a></li>
                <li class="{{ Request::is('zone*') ? 'active' : '' }}"><a href="{{ url('/zone') }}">赣+小栈</a></li>
                <li class="{{ Request::is('contact*') ? 'active' : '' }}"><a href="{{ url('/contact') }}">联系我们</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-rocket"></i> {{ trans('app.Launch') }}</a>
                    <ul class="dropdown-menu" role="menu">
                        @if (Auth::check())
                            <li><a href="{{ url('/topic/create') }}"><i class="fa fa-plus"></i> &nbsp;{{ trans('app.Create Topic') }}</a></li>
                            @if (Auth::check() && Auth::user()->hasRole('admin'))
                                <li><a href="{{ url('/blog/create') }}"><i class="fa fa-plus"></i> &nbsp;{{ trans('app.Create Blog') }}</a></li>
                                <li><a href="{{ url('/article/create') }}"><i class="fa fa-plus"></i> &nbsp;{{ trans('app.Create Article') }}</a></li>
                            @endif
                        @else
                            <li><a href="{{ url('/auth/login') }}"><i class="fa fa-user"></i> &nbsp;{{ trans('app.Login') }}</a></li>
                        @endif
                    </ul>
                </li>
                @if (Auth::guest())
                    <li class="{{ Request::is('auth/login') ? 'active' : '' }}"><a href="{{ url('/auth/login') }}">{{ trans('app.Login') }}</a></li>
                    <li class="{{ Request::is('auth/register') ? 'active' : '' }}"><a href="{{ url('/auth/register') }}">{{ trans('app.Register') }}</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            @if (Auth::check() && Auth::user()->hasRole('admin'))
                                <li><a href="{{ url('/admin') }}">{{ trans('app.Dashboard') }}</a></li>
                            @endif
                            <li><a href="{{ url('/me') }}">{{ trans('app.User Center') }}</a></li>
                            <li><a href="{{ url('/auth/logout') }}">{{ trans('app.Logout') }}</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Flash notice -->
<div class="container">
    @include('flash::message')
</div>


@yield('content')


<!-- Footer -->
<footer>
    <div class="container">
        <div class="text-right">
            关注我们: &nbsp;
            <a target="_blank"><i class="fa fa-weibo"></i></a>&nbsp;
            <a target="_blank"><i class="fa fa-wechat"></i></a>&nbsp;
            <a target="_blank"><i class="fa fa-facebook"></i></a>&nbsp;

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            E-Mail: zhanghooyo(AT)gmail.com
        </div>
        <div class="text-right">
            链接: &nbsp;
            <a href="http://www.yi-gather.com" target="_blank">一起开工社区</a> &nbsp;
            <a href="http://www.youplus.cc" target="_blank">You+青年公寓</a> &nbsp;
            <a href="http://site.douban.com/143466/" target="_blank">706青年空间</a> &nbsp;
            <a href="http://chekucafe.com" target="_blank">车库咖啡</a> &nbsp;
            <a href="http://www.x-lab.tsinghua.edu.cn" target="_blank">清华x-lab</a> &nbsp;
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="http://www.un.org/zh/index.html" target="_blank">联合国</a> &nbsp;
            <a href="http://www.worldbank.org.cn" target="_blank">世界银行</a> &nbsp;
            <a href="http://open.163.com" target="_blank">网易公开课</a> &nbsp;
            <a href="http://www.ccyl.org.cn" target="_blank">中国共青团</a> &nbsp;
            <a href="http://aiesec.cn" target="_blank">AIESEC CN</a> &nbsp;
            <a href="http://www.bottledream.com" target="_blank">Bottle Dream</a> &nbsp;
        </div>

        <br>
        <div class="pull-right">
            &copy;2015
            <a href="http://dev4living.com" target="_blank">dev4living</a><a>/</a><a href="http://community.dev4living.com" target="_blank">Community</a>
        </div>
        <i class="fa fa-lightbulb-o"></i> Think difference, and do it.
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('bowerAssets/jquery-pjax/jquery.pjax.js') }}"></script>
<script src="{{ asset('bowerAssets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bowerAssets/nprogress/nprogress.js') }}"></script>
<link href="{{ asset('bowerAssets/nprogress/nprogress.css') }}" rel="stylesheet">
<!-- NProgress -->
<script>
$(document).ready(function() {
    $(document).pjax('a', 'body');

    $(document).on('pjax:start', function() {
        NProgress.start();
    });
    $(document).on('pjax:end', function() {
        NProgress.done();
    });
});
</script>
</body>
</html>
