<x-form.item class="me-2">
    <x-form.select class="form-select form-select-lg" name="author_id">
        <option value="0">Любой</option>
        @foreach($authors as $author)
            <option @if(request('author_id') == $author->id) selected @endif value="{{ $author->id }}">{{ $author->name }}</option>
        @endforeach
    </x-form.select>
</x-form.item>
