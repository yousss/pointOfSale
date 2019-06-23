<?php

namespace Modules\User\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class AuthResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'token' => auth()->user()->createToken('pointOfSale')->accessToken,
            'roles' => RoleResource::collection(auth()->user()->roles), 
        ];
    }
}
