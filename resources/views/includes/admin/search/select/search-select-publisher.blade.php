<x-form.item class="me-2">
    <x-form.select class="form-select form-select-lg" name="publisher_id">
        <option value="">Любой</option>
        @foreach($data->publishers as $publisher)
            <option @if(request('publisher_id') == $publisher['id']) selected @endif value="{{ $publisher['id'] }}">{{ $publisher['name'] }}</option>
        @endforeach
    </x-form.select>
</x-form.item>
