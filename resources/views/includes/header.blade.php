<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-black justify-content-start">
        <button class="navbar-toggler ms-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white fs-4 {{Request::route()->getName() == 'home' ? 'active' : 'non-active'}}" href="{{ route('home') }}">{{__('Главная')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fs-4 {{ Request::route()->getName() == 'books' ? 'active': 'non-active' }}" href="#">{{__("Мои книги")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fs-4 {{ Request::route()->getName() == 'subs' ? 'active': 'non-active' }}" href="#">{{__('Подписки')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fs-4 {{ Request::route()->getName() == 'account' || Request::route()->getName() == 'login' ? 'active': 'non-active' }}" href="{{ route('account') }}">{{__("Аккаунт")}}</a>
                </li>
                @can('view', auth()->user())
                    <li class="nav-item">
                        <a class="nav-link text-white fs-4 {{ Request::route()->getName() == 'admin.index' ? 'active': 'non-active' }}"
                           href="{{ route('admin.index') }}">{{__("Админ")}}</a>
                    </li>
                @endcan
            </ul>
        </div>
    </nav>
</header>

