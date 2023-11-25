@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div>
            <a href="{{route('admin.books.index')}}">
                <button class="btn btn-lg gradient-button w-25">
                   {{__('Книги')}}
                </button>
            </a>
        </div>

        <div class="mt-3">
            <a href="{{route('admin.authors.index')}}">
                <button class="btn btn-lg gradient-button w-25">
                    {{__('Авторы')}}
                </button>
            </a>
        </div>

        <div class="mt-3">
            <a href="{{route('admin.genres.index')}}">
                <button class="btn btn-lg gradient-button w-25">
                    {{__('Жанры')}}
                </button>
            </a>
        </div>

        <div class="mt-3">
            <a href="{{route('admin.users.index')}}">
                <button class="btn btn-lg gradient-button w-25">
                    {{__('Пользователи')}}
                </button>
            </a>
        </div>

    </div>
</div>
@endsection

