<?php

namespace App\DTO;

class ResetPasswordDTO
{
    public string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }
}
