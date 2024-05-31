@extends('layouts.create-form')

@section('form')

    <x-form.store-form action="{{route('admin.subscription_types.update', ['id' => $subscription_type->id])}}" method="POST">
        @method('PUT')

        <x-form.label>
            Напишите название типа подписки
        </x-form.label>

        <x-form.item>
            <x-form.input type="text" name="name" placeholder="Название" value="{{old('name', $subscription_type->name)}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.input type="integer" name="price" placeholder="Цена" value="{{old('price', $subscription_type->price)}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.select name="features_id[]" multiple>
                @foreach($features as $feature)
                    <option value="{{ $feature->id }}" @if(in_array($feature->id, $subscription_type->features->pluck('id')->toArray())) selected @endif>{{ $feature->name }}</option>
                @endforeach
            </x-form.select>
        </x-form.item>

        <x-form.item>
            <x-form.button>
                Изменить
            </x-form.button>
        </x-form.item>

        <input type="hidden" name="id" value="{{ $subscription_type->id }}">

    </x-form.store-form>

@endsection
