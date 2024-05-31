@extends('layouts.create-form')

@section('form')

    <x-form.store-form action="{{route('admin.publishers.update', ['id' => $publisher->id])}}" method="POST">
        @method('PUT')
        <x-form.label>
            Измените издателя
        </x-form.label>

        <x-form.item>
            <x-form.input type="text" name="name" placeholder="Имя" value="{{old('name', $publisher->name)}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.button>
                Изменить
            </x-form.button>
        </x-form.item>

        <x-form.input type="hidden" name="id" value="{{ $publisher->id }}"/>

    </x-form.store-form>

@endsection

