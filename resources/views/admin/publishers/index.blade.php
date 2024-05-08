@extends('layouts.index-form')

@section('index')

    @include('includes.admin.search.search-panel', [
    'index_route' => 'admin.publishers.index',
    'create_route' => 'admin.publishers.create',
    'selects' => []])


   @include('includes.admin.table.table', ['entities' => $publishers, 'columns' => ['ID', 'Название', 'Действие']])

@endsection
