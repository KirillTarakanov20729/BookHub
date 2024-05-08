@extends('layouts.create-form')

@section('form')

    @include('includes.admin.create.create-form', ['entity' => 'authors', 'entity_name' => 'автора'])

@endsection
