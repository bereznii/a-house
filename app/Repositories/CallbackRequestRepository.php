<?php

namespace App\Repositories;

use App\Models\CallbackRequest;

class CallbackRequestRepository
{
    /**
     * @param array $data
     * @return bool
     */
    public function saveCallbackRequest(array $data): bool
    {
        $record = app(CallbackRequest::class);
        $record->name = $data['name'] ?? '';
        $record->phone = $data['phone'] ?? '';
        $record->comment = $data['comment'] ?? '';
        $record->save();

        return true;
    }
}
