@extends('layouts.create-form')

@section('form')

    <x-form.store-form action="{{route('admin.subscription_types.store')}}" method="POST">

        <x-form.label>
            Напишите название типа подписки
        </x-form.label>

        <x-form.item>
            <x-form.input type="text" name="name" placeholder="Название" value="{{old('name')}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.input type="integer" name="price" placeholder="Цена" value="{{old('price')}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.select name="features_id[]" multiple>
                @foreach($features as $feature)
                    <option @if(in_array($feature->id, old('$features_id', []))) selected @endif value="{{ $feature->id }}">{{ $feature->name }}</option>
                @endforeach
            </x-form.select>
        </x-form.item>

        <x-form.item>
            <x-form.button>
                Создать
            </x-form.button>
        </x-form.item>

    </x-form.store-form>

@endsection
