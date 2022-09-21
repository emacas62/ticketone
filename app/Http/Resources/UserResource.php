<?php

namespace App\Http\Resources;

class UserResource extends BaseResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'password' => $this->password,
            'authToken' => $this->authToken,
            'birthDate' => $this->birthDate,
            'city' => $this->city,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
