@if(!empty($title))
    <h1>{{ $title }}</h1>
@endif

<div class="album py-3">

    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 g-4">
        @foreach($books as $book)
            @include('includes.user.card.book-card', ['book' => $book])
        @endforeach
    </div>
    @if($with_pagination)
        {{ $books->links() }}
    @endif
</div>

