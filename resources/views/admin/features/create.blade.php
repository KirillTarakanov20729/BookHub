@extends('layouts.create-form')

@section('form')

    @include('includes.admin.create.create-form', ['entity' => 'features', 'entity_name' => 'возможности'])

@endsection
