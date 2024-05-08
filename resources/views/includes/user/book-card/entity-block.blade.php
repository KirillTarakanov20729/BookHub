<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="fs-4">
        {{ $title }}
    </div>

    <div class="fs-4">
        @foreach($entities as $key => $entity)
            {{ $entity->name }}@if (!$loop->last),@endif
        @endforeach
    </div>
</div>
