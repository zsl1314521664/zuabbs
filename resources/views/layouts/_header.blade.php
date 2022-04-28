{{--<div class="nav-top">--}}
{{--    <div class="nav-title">--}}
{{--        <img src="/uploads/images/static/logo.png"><span style="font-weight: bold;opacity: 0.8">在郑航校园生活服务平台</span>--}}
{{--    </div>--}}
{{--</div>--}}
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
    <div class="container nav-middle">
        <a class="navbar-brand " href="{{ url('/') }}">
            在郑航校园服务平台
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
{{--                <li class="nav-item {{ active_class(if_route('topics.index')) }}"><a class="nav-link" href="{{ route('topics.index') }}">航友圈</a></li>--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ active_class(if_route('topics.index')) }} {{ category_nav_active(1) }} {{ category_nav_active(2) }}{{ category_nav_active(3) }}{{ category_nav_active(4) }}{{ category_nav_active(5) }}{{ category_nav_active(6) }}{{ category_nav_active(7) }}"
                       href="{{ route('topics.index') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        航友圈
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{ active_class(if_route('topics.index')) }}" href="{{ route('topics.index') }}">全部话题</a>
                        <a class="dropdown-item {{ category_nav_active(1) }}" href="{{ route('categories.show', 1) }}">郑式通知</a>
                        <a class="dropdown-item {{ category_nav_active(2) }}" href="{{ route('categories.show', 2) }}">失物招领&寻物启事</a>
                        <a class="dropdown-item {{ category_nav_active(3) }}" href="{{ route('categories.show', 3) }}">兼职发布/勤工俭学</a>
                        <a class="dropdown-item {{ category_nav_active(4) }}" href="{{ route('categories.show', 4) }}">社团/组织/比赛招募</a>
                        <a class="dropdown-item {{ category_nav_active(5) }}" href="{{ route('categories.show', 5) }}">考研人</a>
                        <a class="dropdown-item {{ category_nav_active(6) }}" href="{{ route('categories.show', 6) }}">职来职往</a>
                        <a class="dropdown-item {{ category_nav_active(7) }}" href="{{ route('categories.show', 7) }}">其他帖子</a>
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a class="dropdown-item" href="#">Something else here</a>--}}
                    </div>
                </li>
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">航发言</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">航信息</a></li>
                @else
                <li class="nav-item"><a class="nav-link {{ active_class(if_route('topics.create')) }}" href="{{ route('topics.create') }}">航发言</a></li>

                <li class="nav-item"><a class="nav-link {{ info_nav_active(Auth::id()) }}" href="{{ route('users.show',Auth::id()) }}">航信息</a></li>
{{--                航帮助--}}
                @endguest
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link dropdown-toggle {{ active_class(if_route('about')) }} {{ active_class(if_route('map')) }}"--}}
{{--                       href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">--}}
{{--                        航帮助--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                        <a class="dropdown-item {{ active_class(if_route('about')) }}" href="{{ route('about') }}">关于我们</a>--}}
{{--                        <a class="dropdown-item {{ active_class(if_route('map')) }}" href="{{ route('map') }}">校园地图</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
                <li class="nav-item"><a class="nav-link {{ active_class(if_route('about')) }}" href="{{ route('about') }}">关于我们</a></li>
{{--                <li class="nav-item {{ category_nav_active(3) }}"><a class="nav-link" href="{{ route('categories.show', 3) }}">问答</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link{{ active_class(if_route('about')) }}" href="{{ route('about') }}">航帮助</a></li>--}}

            </ul>
            <form action="{{ route('search') }}" method="get" class="form-inline my-2 my-lg-0" style="margin-right: 20px">
                <input class="form-control mr-sm-2" type="search" name="name" placeholder="请输入关键词" required aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">搜索</button>
            </form>
            <ul class="navbar-nav navbar-right">
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">注册</a></li>
                @else
                    <li class="nav-item">
                        <a class="nav-link mt-1 mr-3 font-weight-bold" href="{{ route('topics.create') }}">
                            <i class="fa fa-plus"></i>
                        </a>
                    </li>
                    <li class="nav-item notification-badge">
                        <a class="nav-link mr-3 badge badge-pill badge-{{ Auth::user()->notification_count > 0 ? 'hint' : 'secondary' }} text-white" href="{{ route('notifications.index') }}">
                            {{ Auth::user()->notification_count }}
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle" width="30px" height="30px">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @can('manage_contents')
                                <a class="dropdown-item" href="{{ url(config('administrator.uri')) }}">
                                    <i class="fas fa-tachometer-alt mr-2"></i>
                                    管理后台
                                </a>
                                <div class="dropdown-divider"></div>
                            @endcan
                            <a class="dropdown-item" href="{{ route('users.show',Auth::id()) }}">
                                <i class="far fa-user mr-2"></i>
                                个人中心
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('users.edit',Auth::id()) }}">
                                <i class="far fa-edit mr-2"></i>
                                编辑资料
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" id="logout" href="#">
                                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('您确定要退出吗？');">
                                    {{ csrf_field() }}
                                    <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                                </form>
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>