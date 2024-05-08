@extends('layouts.create-form')

@section('form')

    @include('includes.admin.create.create-form', ['entity' => 'genres', 'entity_name' => 'жанра'])

@endsection
