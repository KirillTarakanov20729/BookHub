@extends('layouts.create-form')

@section('form')

    @include('includes.admin.edit.edit-form', ['entity' => $genre, 'entity_name' => 'жанра'])

@endsection
