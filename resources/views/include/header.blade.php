<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ activeLink('blog*') }}" href="{{ route('blog') }}">{{__('Блог')}}</a>
        </li>
        @role('admin')
          <li class="nav-item">
            <a class="nav-link {{ activeLink('admin*') }}" href="{{ route('admin.dashboard') }}">{{__('Админка')}}</a>
          </li>
        @endrole
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ activeLink('user*') }}" aria-current="page" href="{{ route('user.posts') }}">{{__('Мои посты')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ activeLink('user*') }}" aria-current="page" href="{{ route('logout') }}">{{__('Выйти')}}</a>
        </li>
      </ul>
    </div>
  </div>
</nav>