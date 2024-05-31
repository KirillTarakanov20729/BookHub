@extends('layouts.index-form')

@section('index')

    <x-form.form action="{{route('admin.books.index')}}" method="GET">

        <div class="d-flex justify-content-between align-items-center">

            <div class="d-flex col-10">

                <x-form.item class="me-2 col-3">
                    <x-form.input name="name" placeholder="Поиск" value="{{request('name')}}"/>
                </x-form.item>

                <x-form.item class="me-2">
                    <x-form.select class="form-select form-select-lg" name="genre_id">
                        <option value="">Любой</option>
                        @foreach($data->genres as $genre)
                            <option @if(request('genre_id') == $genre['id']) selected @endif value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                        @endforeach
                    </x-form.select>
                </x-form.item>

                <x-form.item class="me-2">
                    <x-form.select class="form-select form-select-lg" name="author_id">
                        <option value="">Любой</option>
                        @foreach($data->authors as $author)
                            <option @if(request('author_id') == $author['id']) selected @endif value="{{ $author['id'] }}">{{ $author['last_name'] }}</option>
                        @endforeach
                    </x-form.select>
                </x-form.item>

                <x-form.item class="me-2">
                    <x-form.select class="form-select form-select-lg" name="publisher_id">
                        <option value="">Любой</option>
                        @foreach($data->publishers as $publisher)
                            <option @if(request('publisher_id') == $publisher['id']) selected @endif value="{{ $publisher['id'] }}">{{ $publisher['name'] }}</option>
                        @endforeach
                    </x-form.select>
                </x-form.item>

                <x-form.item class="me-2">
                    <x-form.select class="form-select form-select-lg" name="age_limit_id">
                        <option value="">Без ограничений</option>
                        @foreach($data->age_limits as $age_limit)
                            <option value="{{ $age_limit['id'] }}" @if(request()->get('age_limit_id') == $age_limit['id']) selected @endif>{{ $age_limit['age_limit'] }}+</option>
                        @endforeach
                    </x-form.select>
                </x-form.item>

                <x-form.item>
                    <x-form.select class="form-select form-select-lg" name="subscription_type_id">
                        <option value="">Любая</option>
                        @foreach($data->subscription_types as $subscription_type)
                            <option @if(request('subscription_type_id') == $subscription_type['id']) selected @endif value="{{ $subscription_type['id'] }}">{{ $subscription_type['name'] }}</option>
                        @endforeach
                    </x-form.select>
                </x-form.item>


            </div>

            <div class="d-flex">

                <x-form.item>
                    <x-card.a href="{{route('admin.books.create')}}">
                        <x-card.button>
                            Создать
                        </x-card.button>
                    </x-card.a>
                </x-form.item>

                <x-form.item>
                    <x-card.button type="submit">
                        Поиск
                    </x-card.button>
                </x-form.item>
            </div>

        </div>

    </x-form.form>

    <table class="table table-bordered border-primary">
        <thead>
        <tr>
            @include('includes.admin.table.table-columns', ['columns' => ['ID', 'Название', 'Жанры', 'Авторы', 'Издатели', 'Возрастное ограничение', 'Год написания', 'Тип подписки', 'Действие']])
        </tr>
        </thead>

        <tbody>
        @foreach($books as $book)
            <tr>
                <th>{{ $book->id }}</th>

                <td>{{ $book->name }}</td>

                <td>
                    @foreach($book->genres as $genre)
                        {{ $genre->name }} <hr>
                    @endforeach
                </td>

                <td>
                    @foreach($book->authors as $author)
                        {{ $author->full_name }} <hr>
                    @endforeach
                </td>

                <td>
                    @foreach($book->publishers as $publisher)
                        {{ $publisher->name }} <hr>
                    @endforeach
                </td>

                <td>{{ $book->age_limit->age_limit }}</td>

                <td>{{ $book->release_date }}</td>

                <td>{{ $book->subscription_type->name }}</td>

                <td class="col-3">
                    <div class="d-flex justify-content-center">

                        <x-form.button class="btn-sm me-2">
                            <x-card.a href="{{route('admin.books.edit', ['id' => $book->id])}}">
                                Изменить
                            </x-card.a>
                        </x-form.button>


                        <x-form.store-form action="{{route('admin.books.delete', ['id' => $book->id])}}" method="POST">
                            @method('DELETE')

                            <x-form.button class="btn-sm">
                                УДАЛИТЬ
                            </x-form.button>
                        </x-form.store-form>
                    </div>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $books->links() }}

@endsection
