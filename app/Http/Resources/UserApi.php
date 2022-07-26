<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserApi extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'name'                  => $this->name,
            'last_name'             => $this->last_name,
            'identification_type'   => $this->identification_type,
            'identification_number' => $this->identification_number,
            'birth_date'            => $this->birth_date,
            'password'              => $this->password,
            'created_at'            => $this->craeted_at,
            'updated_at'            => $this->updated_at
        ];
    }
}
