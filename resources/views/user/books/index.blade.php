@extends('layouts.index-form')

@section('index')

    @include('includes.admin.search.search-panel', ['index_route' => 'user.books.index', 'selects' => ['genre', 'author', 'publisher', 'age_limit']])

    @include('includes.user.index-books.album.album', ['title' => null, 'books' => $books, 'with_pagination' => true])
@endsection
