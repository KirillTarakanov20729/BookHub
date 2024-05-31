@extends('layouts.create-form')

@section('form')

    <x-form.store-form action="{{route('admin.genres.update', ['id' => $genre->id])}}" method="POST">
        @method('PUT')
        <x-form.label>
            Измените жанр
        </x-form.label>

        <x-form.item>
            <x-form.input type="text" name="name" placeholder="Название" value="{{old('name', $genre->name)}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.button>
                Изменить
            </x-form.button>
        </x-form.item>

        <x-form.input type="hidden" name="id" value="{{ $genre->id }}"/>

    </x-form.store-form>

@endsection

