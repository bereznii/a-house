<?php

namespace App\Repositories;

use App\Entities\CallbackRequest as Model;

class CallbackRequestRepository
{
    /**
     * @return mixed|string
     */
    protected function instantiate()
    {
        return Model::class;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function saveCallbackRequest(array $data): bool
    {
        $record = $this->instantiate();
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
        $record = $this->instantiate()->find(request('recordId'));

        if (isset($record)) {
            $status = $record->update(['is_called' => $isChecked]);
            $status = ($status > 0) ? true : false;
        }

        return $status;
    }
}
