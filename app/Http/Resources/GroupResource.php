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
            'package' => new PackageResource(Package::find($this->package_id)),
            'users' => UserResource::collection($this->users),
        ];
    }
}
