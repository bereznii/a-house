<?php

namespace App\Services;

use App\Jobs\CallbackRequestCreatedJob;
use App\Jobs\OrderCreatedJob;
use App\Services\Interfaces\NotificationInterface;

class EmailNotificationService implements NotificationInterface
{
    /**
     * @var string
     */
    private string $adminEmail;

    /**
     * EmailNotificationService constructor.
     */
    public function __construct()
    {
        $this->adminEmail = config('notification.admin_email');
    }

    /**
     * @return void
     */
    public function sendCreatedOrderNotification(int $orderId)
    {
        dispatch(new OrderCreatedJob($this->adminEmail, $orderId));

        logger("ORDER {$orderId} | Notification sent to {$this->adminEmail}");
    }

    /**
     * @param int $callbackRequestId
     */
    public function sendCreatedCallbackRequestNotification(int $callbackRequestId)
    {
        dispatch(new CallbackRequestCreatedJob($this->adminEmail, $callbackRequestId));

        logger("ORDER {$callbackRequestId} | Notification sent to {$this->adminEmail}");
    }
}
