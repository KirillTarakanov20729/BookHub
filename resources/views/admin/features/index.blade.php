@extends('layouts.index-form')

@section('index')

    @include('includes.admin.search.search-panel', [
    'index_route' => 'admin.features.index',
    'create_route' => 'admin.features.create',
    'selects' => []])

    @include('includes.admin.table.table', ['entities' => $features, 'columns' => ['ID', 'Название', 'Действие']])

@endsection
