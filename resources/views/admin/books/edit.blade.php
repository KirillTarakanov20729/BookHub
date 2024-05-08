@extends('layouts.create-form')

@section('form')

    <x-form.form action="{{route('admin.books.update', ['id' => $book->id])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <x-form.label>
            Измените книгу
        </x-form.label>

        <x-form.item>
            <x-form.input type="text" name="name" placeholder="Название" value="{{old('name', $book->name)}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.textarea type="text" name="short_description" placeholder="Короткое описание">
                {{old('short_description', $book->short_description)}}
            </x-form.textarea>
        </x-form.item>

        <x-form.item>
            <x-form.textarea type="text" name="full_description" placeholder="Полное описание" >
                {{old('full_description', $book->full_description)}}
            </x-form.textarea>
        </x-form.item>

        <x-form.item>
            <x-form.input type="date" name="release_date" value="{{old('release_date', $book->release_date ? $book->release_date->format('Y-m-d') : '')}}"/>
        </x-form.item>


        <x-form.item>
            <x-form.select name="age_limit_id">
                @foreach($age_limits as $age_limit)
                    <option value="{{ $age_limit->id }}" @if($book->age_limit_id == $age_limit->id) selected @endif>{{ $age_limit->age_limit }}</option>
                @endforeach
            </x-form.select>
        </x-form.item>

        <x-form.item>
            <x-form.select name="genres_id[]" multiple>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" @if(in_array($genre->id, $book->genres->pluck('id')->toArray())) selected @endif>{{ $genre->name }}</option>
                @endforeach
            </x-form.select>
        </x-form.item>

        <x-form.item>
            <x-form.select name="authors_id[]" multiple>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" @if(in_array($author->id, $book->authors->pluck('id')->toArray())) selected @endif>{{ $author->name }}</option>
                @endforeach
            </x-form.select>
        </x-form.item>

        <x-form.item>
            <x-form.select name="publishers_id[]" multiple>
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}" @if(in_array($publisher->id, $book->publishers->pluck('id')->toArray())) selected @endif>{{ $publisher->name }}</option>
                @endforeach
            </x-form.select>
        </x-form.item>

        <x-form.item>
            <x-form.select name="subscription_type_id">
                @foreach($subscription_types as $subscription_type)
                    @if($subscription_type->id == 1)
                        <option value="{{ $subscription_type->id }}" @if($book->subscription_type_id == $subscription_type->id) selected @endif>Без подписки </option>
                    @elseif ($subscription_type->id == 2)
                        <option value="{{ $subscription_type->id }}" @if($book->subscription_type_id == $subscription_type->id) selected @endif> Базовая подписка</option>
                    @elseif ($subscription_type->id == 3)
                        <option value="{{ $subscription_type->id }}" @if($book->subscription_type_id == $subscription_type->id) selected @endif>Премиум подписка</option>
                    @endif
                @endforeach
            </x-form.select>
        </x-form.item>

        <x-form.item>
            <x-form.input type="file" name="image"/>
        </x-form.item>

        <x-form.item>
            <x-form.input type="file" name="text"/>
        </x-form.item>

        <x-form.item>
            <x-form.button>
                Изменить
            </x-form.button>
        </x-form.item>

        <x-form.input type="hidden" name="id" value="{{ $book->id }}"/>

    </x-form.form>

@endsection

