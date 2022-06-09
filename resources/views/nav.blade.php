<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
  <div class="container">
    <a class="navbar-brand" href="/">
      <h2 class="text-white pt-1">プログラミング教材口コミ</h2>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/">教材一覧</a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link" href="/login">ログイン</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">ユーザー登録</a>
        </li>
        @endguest

        @auth
        <li class="nav-item">
          <form class="nav-link" action="/logout" method="post">
            @csrf
            <button id="logoutButton" type="submit">ログアウト</button>
          </form>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
