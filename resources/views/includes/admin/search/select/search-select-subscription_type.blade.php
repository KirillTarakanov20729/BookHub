<x-form.item>
    <x-form.select class="form-select form-select-lg" name="subscription_type_id">
        <option @if(request('subscription_type_id') == 0) selected @endif value="0">Любая</option>
        <option @if(request('subscription_type_id') == 1) selected @endif value="1">Без подписки</option>
        <option @if(request('subscription_type_id') == 2) selected @endif value="2">Базовая</option>
        <option @if(request('subscription_type_id') == 3) selected @endif value="3">Премиум</option>
    </x-form.select>
</x-form.item>
