@extends('layouts.index-form')

@section('index')

    @include('includes.user.index-books.album.album', ['title' => 'Интересные новинки', 'books' => $data['newest_books'], 'with_pagination' => false])

    @include('includes.user.index-books.album.album', ['title' => 'Книги в жанре фантастика', 'books' => $data['fantasy_books'], 'with_pagination' => false])

    @include('includes.user.index-books.album.album', ['title' => 'Книги Достоевского', 'books' => $data['dostoevsky_books'], 'with_pagination' => false])

@endsection
