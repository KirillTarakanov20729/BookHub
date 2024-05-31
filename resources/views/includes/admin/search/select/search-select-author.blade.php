<x-form.item class="me-2">
    <x-form.select class="form-select form-select-lg" name="author_id">
        <option value="">Любой</option>
        @foreach($data->authors as $author)
            <option @if(request('author_id') == $author['id']) selected @endif value="{{ $author['id'] }}">{{ $author['last_name'] }}</option>
        @endforeach
    </x-form.select>
</x-form.item>
