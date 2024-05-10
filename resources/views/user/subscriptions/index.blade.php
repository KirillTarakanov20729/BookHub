@extends('layouts.index-form')

@section('index')
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

       @include('includes.user.profile.subscriptions-page.subscription-card', ['title' => 'Бесплатная', 'price' => '0', 'features' => ['Стандартный набор книг'], 'subscription_type_id' => 1])

       @include('includes.user.profile.subscriptions-page.subscription-card', ['title' => 'Базовая', 'price' => '500', 'features' => ['Расширенный набор книг'], 'subscription_type_id' => 2])

       @include('includes.user.profile.subscriptions-page.subscription-card', ['title' => 'Премиум', 'price' => '1000', 'features' => ['Полный набор книг'], 'subscription_type_id' => 3])
    </div>
@endSection
