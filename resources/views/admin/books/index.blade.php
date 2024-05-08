@extends('layouts.index-form')

@section('index')

    @include('includes.admin.search.search-panel', [
    'index_route' => 'admin.books.index',
    'create_route' => 'admin.books.create',
    'selects' => ['genre', 'author', 'publisher', 'age_limit', 'subscription_type']])

    @include('includes.admin.table.table', ['entities' => $books, 'columns' => ['ID', 'Название', 'Жанр', 'Авторы', 'Издатель', 'Возрастное ограничение', 'Год написания', 'Тип подписки', 'Действие']])

@endsection
