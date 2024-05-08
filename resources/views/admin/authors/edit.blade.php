@extends('layouts.create-form')

@section('form')

    @include('includes.admin.edit.edit-form', ['entity' => $author, 'entity_name' => 'автора'])

@endsection
