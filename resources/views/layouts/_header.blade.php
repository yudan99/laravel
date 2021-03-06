{{--<div class="navbar-remarks">--}}

{{--</div>--}}
<nav class="navbar navbar-expand-lg navbar-light navbar-static-topyao">
    <div class="container">
        <!-- Branding Image -->
        <a class="navbar-brand " href="{{ url('/') }}">
            凑学
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
{{--            <ul class="navbar-nav navbar-right">--}}
{{--                <!-- Authentication Links -->--}}
{{--                <li class="nav-item"><a class="nav-link" href="#">登录</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link" href="#">注册</a></li>--}}
{{--            </ul>--}}
            <ul class="navbar-nav navbar-right">
                <!-- 登录注册链接开始 -->
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">注册</a></li>
                @else

                    <li class="nav-item">
                        <a class="nav-link mt-1 mr-3 font-weight-bold" href="{{ route('file_shares.create') }}">
                            分享
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle" width="36px" height="36px">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('users.show', Auth::id()) }}">个人中心</a>
                            <a class="dropdown-item" href="{{ route('users.edit', Auth::id()) }}">编辑资料</a>
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" id="logout" href="#"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出登录</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
            @endguest
            <!-- 登录注册链接结束 -->
            </ul>
        </div>
    </div>
</nav>
