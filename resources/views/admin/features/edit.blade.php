@extends('layouts.create-form')

@section('form')

    @include('includes.admin.edit.edit-form', ['entity' => $feature, 'entity_name' => 'возможности'])

@endsection
