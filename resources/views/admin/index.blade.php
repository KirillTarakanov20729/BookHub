@extends('layouts.index-form')

@section('index')

   @include('includes.admin.index.admin-index-page-button', ['route' => 'admin.books.index', 'title' => 'Книги'])

   @include('includes.admin.index.admin-index-page-button', ['route' => 'admin.publishers.index', 'title' => 'Издатели'])

   @include('includes.admin.index.admin-index-page-button', ['route' => 'admin.authors.index', 'title' => 'Авторы'])

   @include('includes.admin.index.admin-index-page-button', ['route' => 'admin.genres.index', 'title' => 'Жанры'])

   @include('includes.admin.index.admin-index-page-button', ['route' => 'admin.users.index', 'title' => 'Пользователи'])

   @include('includes.admin.index.admin-index-page-button', ['route' => 'admin.subscription_types.index', 'title' => 'Виды подписок'])

   @include('includes.admin.index.admin-index-page-button', ['route' => 'admin.features.index', 'title' => 'Особенности'])

    <x-form.error name="error" />

@endSection
