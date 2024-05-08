@extends('layouts.index-form')

@section('index')

    @include('includes.admin.search.search-panel', [
    'index_route' => 'admin.authors.index',
    'create_route' => 'admin.authors.create',
    'selects' => []])

    @include('includes.admin.table.table', ['entities' => $authors, 'columns' => ['ID', 'Название', 'Действие']])

@endsection
