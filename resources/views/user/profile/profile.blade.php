@extends('layouts.index-form')

@section('index')

    @include('includes.user.profile.data-block', ['title' => 'Текущая книга', 'data' => isset($active_book) ? $active_book->name : 'Нет активной книги'])

    @include('includes.user.profile.data-block', ['title' => 'Любимые жанры', 'data' => collect($favorite_genres)->map(fn($genre) => $genre->name)->join(', ')])

    @include('includes.user.profile.data-block', ['title' => 'Любимые авторы', 'data' => collect($favorite_authors)->map(fn($author) => $author->name)->join(', ')])

    @include('includes.user.profile.data-block', ['title' => 'Всего книг прочитано', 'data' => $total_read_books])

    @include('includes.user.profile.data-block', ['title' => 'Подписка', 'data' => $user->subscription->subscription_type_id == 1 ? 'Без подписки' : ($user->subscription->subscription_type_id == 2 ? 'Базовая подписка' : 'Премиум подписка')])

    <x-form.button class="w-25 mb-3">
        Изменить подписку
    </x-form.button>

    <x-form.form action="{{route('logout')}}" method="POST">
        <x-form.button class="w-25">
            Выйти
        </x-form.button>
    </x-form.form>

@endsection
