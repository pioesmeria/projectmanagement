<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'task_id' => $this->task_id,
            'task_description' => $this->task_description,
            'status' => $this->status,
            'account_id' => $this->account_id
        ];
    }
}
