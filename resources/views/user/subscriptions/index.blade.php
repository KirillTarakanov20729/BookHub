@extends('layouts.index-form')

@section('index')
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

        @foreach($subscription_types as $subscription_type)
            @include('includes.user.profile.subscriptions-page.subscription-card', ['title' => $subscription_type->name, 'price' => $subscription_type->price, 'subscription_type_id' => $subscription_type->id])
        @endforeach

    </div>
@endSection
