@extends('layouts.index-form')

@section('index')

    @include('includes.admin.search.search-panel', [
    'index_route' => 'admin.subscription_types.index',
    'create_route' => 'admin.subscription_types.create',
    'selects' => []])


   @include('includes.admin.table.table', ['entities' => $subscription_types, 'columns' => ['ID', 'Название', 'Особенности', 'Цена','Действие']])

@endsection
