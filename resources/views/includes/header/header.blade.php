<header>
    <x-navbar.navbar>
        <x-navbar.navbar-body>

                <x-navbar.ul>

                    <x-navbar.li>
                        <x-navbar.a href="{{ route('user.books.main') }}">Главная</x-navbar.a>
                    </x-navbar.li>

                    <x-navbar.li>
                        <x-navbar.a href="{{ route('user.books.index') }}">Все книги</x-navbar.a>
                    </x-navbar.li>

                    @if(!@empty(Auth::user()->active_book_id))
                    <x-navbar.li>
                        <x-navbar.a href="{{ route('user.books.show', ['book' => \Illuminate\Support\Facades\Auth::user()->active_book_id]) }}">Текущая книга</x-navbar.a>
                    </x-navbar.li>
                    @endif

                    <x-navbar.li>
                        @guest
                            <x-navbar.a href="{{route('login')}}">Аккаунт</x-navbar.a>
                        @endguest
                        @auth
                            <x-navbar.a href="{{route('profile')}}">Аккаунт</x-navbar.a>
                        @endauth
                    </x-navbar.li>

                    @can('view', auth()->user())
                        <x-navbar.li>
                            <x-navbar.a href="{{route('admin')}}">Админка</x-navbar.a>
                        </x-navbar.li>
                    @endcan

                </x-navbar.ul>

        </x-navbar.navbar-body>
    </x-navbar.navbar>
</header>
