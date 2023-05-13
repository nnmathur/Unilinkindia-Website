<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CalendarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->event_name,
            'start' => $this->start_date,
            'end' => $this->new_date,
            'desc' => $this->description,
            'newd' => $this->end_date,
            'color' => $this->color,
            'leave_type' => $this->leave_type,
        ];
    }
}
