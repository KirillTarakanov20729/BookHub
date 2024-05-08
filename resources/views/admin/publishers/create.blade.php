@extends('layouts.create-form')

@section('form')

    @include('includes.admin.create.create-form', ['entity' => 'publishers', 'entity_name' => 'издателя'])

@endsection
