@extends('layouts.app')

@section('content')
    <div class="mt-2">
        <h2>{{ __("Страница списка книг") }}</h2>
        @if (empty($books))
            <div>
                <h2>{{__("Книг нет")}}</h2>
            </div>
        @else
            <div>
                @foreach($books as $book)
                    <div>
                        <a href="{{route('books.show', $book['id'])}}">
                            {{__($book['name'])}}
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
