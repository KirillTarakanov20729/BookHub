<div class="col">
    <div class="card mb-4 rounded-3 shadow-sm">

        <div class="card-header py-3">
            <h4 class="my-0 fw-normal"> {{ $title }}</h4>
        </div>

        <div class="card-body">
            <h1 class="card-title pricing-card-title"> {{ $price }}₽<small class="text-muted fw-light">/месяц</small></h1>

            <ul class="list-unstyled mt-3 mb-4">
                @foreach($subscription_type->features as $feature)
                    <li>{{ $feature->name }}</li>
                @endforeach
            </ul>

            <x-card.button type="button" class="w-100 btn btn-lg">
                <x-card.a href="{{ route('user.subscriptions.change_subscription', ['subscription_type_id' => $subscription_type_id]) }}">
                    Подписаться
                </x-card.a>
            </x-card.button>

        </div>
    </div>
</div>
