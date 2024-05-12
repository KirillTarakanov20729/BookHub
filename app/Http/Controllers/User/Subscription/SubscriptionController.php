<?php

namespace App\Http\Controllers\User\Subscription;

use App\Http\Controllers\Controller;
use App\Services\User\SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    private SubscriptionService $service;
    public function __construct(SubscriptionService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $subscription_types = $this->service->get_subscription_types();

        return view('user.subscriptions.index', [
            'subscription_types' => $subscription_types
        ]);
    }

    public function change_subscription(int $subscription_type_id)
    {
        $this->service->change_subscription(Auth::user(), $subscription_type_id);

        return redirect()->route('user.subscriptions.index');
    }
}
