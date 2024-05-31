@extends('layouts.create-form')

@section('form')

    <x-form.store-form action="{{route('admin.books.store')}}" method="POST" enctype="multipart/form-data">

        <x-form.label>
            Создайте книгу
        </x-form.label>

        <x-form.item>
            <x-form.input type="text" name="name" placeholder="Название" value="{{old('name')}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.textarea type="text" name="short_description" placeholder="Короткое описание">
                {{old('short_description')}}
            </x-form.textarea>
        </x-form.item>

        <x-form.item>
            <x-form.textarea type="text" name="full_description" placeholder="Полное описание">
                {{old('full_description')}}
            </x-form.textarea>
        </x-form.item>

        <x-form.item>
            <x-form.input type="number" name="release_date" placeholder="Год написания" value="{{old('release_date')}}" />
        </x-form.item>

        <x-form.item>
            <x-form.select name="age_limit_id">
                @foreach($data->age_limits as $age_limit)
                    <option @if(old('age_limit_id') == $age_limit['id']) selected @endif value="{{ $age_limit['id'] }}">{{ $age_limit['age_limit'] }}</option>
                @endforeach
            </x-form.select>
            <x-form.error name="age_limit_id"/>
        </x-form.item>

        <x-form.item>
            <x-form.select name="genres_id[]" multiple>
                @foreach($data->genres as $genre)
                    <option @if(in_array($genre['id'], old('genres_id', []))) selected @endif value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                @endforeach
            </x-form.select>
        </x-form.item>

        <x-form.item>
            <x-form.select name="authors_id[]" multiple>
                @foreach($data->authors as $author)
                    <option @if(in_array($author['id'], old('authors_id', []))) selected @endif value="{{ $author['id'] }}">{{ $author['full_name'] }}</option>
                @endforeach
            </x-form.select>
        </x-form.item>

        <x-form.item>
            <x-form.select name="publishers_id[]" multiple>
                @foreach($data->publishers as $publisher)
                    <option @if(in_array($publisher['id'], old('publishers_id', []))) selected @endif value="{{ $publisher['id'] }}">{{ $publisher['name'] }}</option>
                @endforeach
            </x-form.select>
        </x-form.item>

        <x-form.item>
            <x-form.select name="subscription_type_id">
                @foreach($data->subscription_types as $subscription_type)
                    <option @if(old('subscription_type_id') == $subscription_type['id']) selected @endif value="{{ $subscription_type['id'] }}">{{ $subscription_type['name'] }}</option>
                @endforeach
            </x-form.select>
        </x-form.item>

        <x-form.item>
            <x-form.input type="file" name="image"/>
        </x-form.item>

        <x-form.item>
            <x-form.input type="file" name="text"/>
        </x-form.item>

        <x-form.error name="error" />

        <x-form.item>
            <x-form.button>
                Создать
            </x-form.button>
        </x-form.item>


    </x-form.store-form>

@endsection
