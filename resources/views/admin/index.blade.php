@extends('layouts.index-form')

@section('index')

    <x-card.item>
        <x-card.button>
            <x-card.a href="{{ route('admin.books.index') }}">
                Книги
            </x-card.a>
        </x-card.button>
    </x-card.item>


    <x-card.item>
        <x-card.button>
            <x-card.a href="{{ route('admin.publishers.index') }}">
                Издательства
            </x-card.a>
        </x-card.button>
    </x-card.item>

    <x-card.item>
        <x-card.button>
            <x-card.a href="{{ route('admin.authors.index') }}">
                Авторы
            </x-card.a>
        </x-card.button>
    </x-card.item>

    <x-card.item>
        <x-card.button>
            <x-card.a href="{{ route('admin.genres.index') }}">
                Жанры
            </x-card.a>
        </x-card.button>
    </x-card.item>

    <x-card.item>
        <x-card.button>
            <x-card.a href="{{route('admin.users.index')}}">
                Пользователи
            </x-card.a>
        </x-card.button>
    </x-card.item>

@endSection
