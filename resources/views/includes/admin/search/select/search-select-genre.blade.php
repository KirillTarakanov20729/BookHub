<x-form.item class="me-2">
    <x-form.select class="form-select form-select-lg" name="genre_id">
        <option value="0">Любой</option>
        @foreach($genres as $genre)
            <option @if(request('genre_id') == $genre->id) selected @endif value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </x-form.select>
</x-form.item>
