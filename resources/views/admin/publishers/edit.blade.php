@extends('layouts.create-form')

@section('form')

    @include('includes.admin.edit.edit-form', ['entity' => $publisher, 'entity_name' => 'издателя'])

@endsection
