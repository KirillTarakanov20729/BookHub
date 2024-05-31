@extends('layouts.index-form')

@section('index')

    @include('includes.user.profile.profile-page.data-block', ['title' => 'Текущая книга', 'data' => isset($active_book) ? $active_book->name : 'Нет активной книги'])

    @include('includes.user.profile.profile-page.data-block', ['title' => 'Любимые жанры', 'data' => collect($favorite_genres)->map(fn($genre) => $genre->name)->join(', ')])

    @include('includes.user.profile.profile-page.data-block', ['title' => 'Любимые авторы', 'data' => collect($favorite_authors)->map(fn($author) => $author->full_name)->join(', ')])

    @include('includes.user.profile.profile-page.data-block', ['title' => 'Всего книг прочитано', 'data' => $total_read_books])

    @include('includes.user.profile.profile-page.data-block', ['title' => 'Подписка', 'data' => $user->subscription->subscription_type_id == 1 ? 'Без подписки' : ($user->subscription->subscription_type_id == 2 ? 'Базовая подписка' : 'Премиум подписка')])

    @include('includes.user.profile.profile-page.data-block', ['title' => 'Пароль', 'data' => isset($user->password_changed_at) ? 'Изменен ' . $user->password_changed_at->translatedFormat('d.m.Y') : 'Не менялся'])

    <div class="d-flex flex-column justify-content-center align-items-center">

        <x-card.button class="w-25 mb-3">
            <x-card.a href="{{ route('password.edit') }}">
                Изменить пароль
            </x-card.a>
        </x-card.button>

        <x-card.button class="w-25 mb-3">
            <x-card.a href="{{ route('user.subscriptions.index') }}">
                Изменить подписку
            </x-card.a>
        </x-card.button>

    </div>

    <x-form.store-form action="{{route('logout')}}" method="POST">
        <x-form.button class="w-25 text-uppercase">
            Выйти
        </x-form.button>
    </x-form.store-form>

@endsection
