<?php

namespace App\Observers;

use App\Entities\Order;
use App\Services\NotificationService;

class OrderObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param  \App\Entities\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        $adminEmail = config('notification.admin_email');

        $service = app(NotificationService::class);
        $service->sendEmailNotification($adminEmail, $order->id);
    }
}
