<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class EmployeeResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {

        $skills = [];

        foreach ($this->skills as $skill) {
            $skills = Arr::add($skills, $skill->name, $skill->pivot->score);
        }

        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'email'     => $this->email,
            'position'  => $this->position,
            'birthdate' => $this->birthdate,
            'address'   => $this->address,
            'skills'    => $skills
        ];
    }
}
