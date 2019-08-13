<?php

namespace App\Http\Resources;

use App\Package;
use Illuminate\Http\Resources\Json\JsonResource;
class GroupResource extends JsonResource
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
            'user_count' => count($this->users),
            'package' => new PackageResource($this->package),
            'confirmed_agent' =>new UserResource($this->agent),
            'users' => UserResource::collection($this->users),
            'status' => 'found',
        ];
    }
}
