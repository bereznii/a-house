<?php

namespace App\Repositories;

use App\Entities\CallbackRequest;

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

    /**
     * @param int $isChecked
     * @return bool
     */
    public function confirmCallbackRequest(int $isChecked): bool
    {
        $status = false;
        $record = CallbackRequest::find(request('recordId'));

        if (isset($record)) {
            $status = $record->update(['is_called' => $isChecked]);
            $status = ($status > 0) ? true : false;
        }

        return $status;
    }
}
