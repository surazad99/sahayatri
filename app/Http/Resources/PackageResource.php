<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'name' => $this->name,
            'num_of_days' => $this->num_of_days,
            //provide the link for the destinations array for particular package
            'destinations' => PackageDestinationResource::collection($this->destinations),
        ];
    }
}
