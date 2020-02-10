<?php

namespace App\Services\Interfaces;

interface NotificationInterface
{
    /**
     * @param int $orderId
     * @return void
     */
    public function sendCreatedOrderNotification(int $orderId);

    /**
     * @param int $callbackRequestId
     * @return void
     */
    public function sendCreatedCallbackRequestNotification(int $callbackRequestId);
}
