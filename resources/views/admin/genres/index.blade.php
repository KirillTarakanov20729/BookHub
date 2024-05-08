@extends('layouts.index-form')

@section('index')

    @include('includes.admin.search.search-panel', [
    'index_route' => 'admin.genres.index',
    'create_route' => 'admin.genres.create',
    'selects' => []])

    @include('includes.admin.table.table', ['entities' => $genres, 'columns' => ['ID', 'Название', 'Действие']])

@endsection
