<?php

namespace App\Transformer;

class EmployeeTransformer {

    protected $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function toArray() {

        // dd($this->user);

        return [
            'id' => $this->user->id,
            'name' => sprintf(
                "%s %s",
                $this->user->first_name,
                $this->user->last_name
            ),
            'phone' => $this->user->phone,
            'email' => $this->user->email
        ];
    }

    public function toJson() {
        return json_encode($this->toArray());
    }

    public function __toString() {
        return $this->toJson();
    }

}