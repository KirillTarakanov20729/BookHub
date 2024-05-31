@extends('layouts.create-form')

@section('form')

    <x-form.store-form action="{{route('admin.' . $entity->getTable() . '.update', ['id' => $entity->id])}}" method="POST">
        @method('PUT')

        <x-form.label>
            Напишите название {{$entity_name}}
        </x-form.label>
        <x-form.item>
            <x-form.input type="text" name="name" placeholder="Название" value="{{old('name', $entity->name)}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.button>
                Изменить
            </x-form.button>
        </x-form.item>

        <input type="hidden" name="id" value="{{ $entity->id }}">

    </x-form.store-form>

@endsection
