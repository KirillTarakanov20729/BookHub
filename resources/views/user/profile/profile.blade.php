@extends('layouts.index-form')

@section('index')

    <x-card.item class="shadow-sm w-100 mb-5">
        <h2 class="fw-bold">Текущая книга</h2>
        <p class="fs-4">{{ $active_book->name }}</p>
    </x-card.item>

    <x-card.item class="shadow-sm w-100 mb-5">
        <h2 class="fw-bold">Любимый жанр</h2>
        <p class="fs-4">Фантастика</p>
    </x-card.item>

    <x-card.item class="shadow-sm w-100 mb-5">
        <h2 class="fw-bold">Всего книг прочитано</h2>
        <p class="fs-4">4</p>
    </x-card.item>

    <x-card.item class="shadow-sm w-100 mb-5">
        <h2 class="fw-bold">Подписка</h2>
        @if($user->subscription->subscription_type_id == 1)
            <p class="fs-4">Без подписки</p>
        @elseif($user->subscription->subscription_type_id == 2)
            <p class="fs-4">Базовая подписка</p>
        @else()
            <p class="fs-4">Премиум подписка</p>
        @endif

    </x-card.item>

    <x-form.button class="w-25 mb-3">
        Изменить подписку
    </x-form.button>

    <x-form.form action="{{route('logout')}}" method="POST">
        <x-form.button class="w-25">
            Выйти
        </x-form.button>
    </x-form.form>






@endsection
