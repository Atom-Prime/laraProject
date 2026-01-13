<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    public function toArray($request){
        return [
            'id' => $this->id,
            'active' => $this->active == true,
            'name' => $this->name,
            'year_birth' => $this->year_birth
        ];
    }
}
