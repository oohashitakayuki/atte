<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atte</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  <div class="app">
    <header class="header">
      <h1 class=header__heading>Atte</h1>
      <nav>
        <ul class="header-nav">
          @if (Auth::check())
          <li class="header-nav__item">
            <a class="header-nav__link" href="/">ホーム</a>
            <a class="header-nav__link" href="/attendance">日付一覧</a>
            <form class="form" action="/logout" method="post">
              @csrf
              <button class="header-nav__button">ログアウト</button>
            </form>
          </li>
          @endif
        </ul>
      </nav>
    </header>

    <div class="content">
      @yield('content')
    </div>

    <footer class="footer">
      <p class=copy-right>Atte, inc.</p>
    </footer>
  </div>
</body>
</html>