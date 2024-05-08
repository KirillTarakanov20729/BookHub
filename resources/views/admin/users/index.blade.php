@extends('layouts.index-form')

@section('index')

    @include('includes.admin.search.search-panel', [
    'index_route' => 'admin.users.index',
    'selects' => []])

    @include('includes.admin.table.table', ['entities' => $users, 'columns' => ['ID', 'Имя', 'Email', 'Тип подписки']])

@endsection
