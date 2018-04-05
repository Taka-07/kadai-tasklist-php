<header>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            {{-- ナビバーの設定 --}}
            <div class="navbar-header">
                {{-- 横幅が狭い時にハンバーガーボタンが出る設定 --}}
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{-- 「Tasklist」のリンクを表示　(リンク先は"/") --}}
                <a class="navbar-brand" href="/">Tasklist</a>
            </div>
            {{-- ナビバーの右側に「Signup, Login」のリンクを表示 (リンク先は"signup.get","login.get") --}}
            {{-- ナビバーの右側に「新規タスクの投稿」のリンクを表示 (リンク先は"tasks.create") --}}
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    {{-- Authファザード 7.2 --}}
                    {{-- Auth::check() は現在の閲覧者がログイン中の場合とログインしていない場合でナビバーの表示を分ける --}}
                    @if (Auth::check())
                        {{-- ログイン後のナビバー表示 --}}
                        <li>{!! link_to_route('users.index', 'Users') !!}</li>
                        <li class="dropdown">
                            {{-- ドロップダウンメニューの設定　(Auth::user()->nameによってログインしているユーザの名前を取得し表示する) --}}
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">My profile</a></li>
                                <li>{!! link_to_route('tasks.index', 'タスク一覧') !!}</li>
                                <li role="separator" class="divider"></li>
                                <li>{!! link_to_route('logout.get', 'Logout') !!}</li>
                            </ul>
                        </li>
                    @else
                        {{-- ログイン前のナビバー表示 --}}
                        <li>{!! link_to_route("signup.get", "Signup") !!}</li>
                        <li>{!! link_to_route("login.get", "Login") !!}</li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>