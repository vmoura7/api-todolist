<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource 
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $due_date = date('d-m-Y', strtotime($this->due_date));

        return [
            'id' => (integer)$this->id,
            'title' => (string)$this->title,
            'description' => (string)$this->description,
            'due_date' => (string)$due_date,
            'is_done' => (boolean)$this->is_done,
        ];
    }
}