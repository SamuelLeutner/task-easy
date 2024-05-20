<?php

namespace App\Services;

use App\DTO\ResetPasswordDTO;
use Illuminate\Support\Facades\Password;

class ResetPasswordService
{
    public function sendResetLink(ResetPasswordDTO $resetPasswordDTO)
    {
        $status = Password::sendResetLink(

            ['email' => $resetPasswordDTO->email]

        );

        return $status;
    }
}
