<?php

namespace App\Services;
use App\Models\User;
use App\DTO\UserDTO;
use App\DTO\LoginDTO;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class UserServices
{
    public function createUser(UserDTO $userDTO)
    {

        $user = User::create([
            'email' => $userDTO->email,
            'name' => $userDTO->name,
            'password' => bcrypt ($userDTO->password),
            'accountName' => $userDTO->accountName,
            'aboutUs' => $userDTO->aboutUs,
            'currentPosition' => $userDTO->currentPosition,
            'focusArea' => $userDTO->focusArea,
            'managementArea' => $userDTO->managementArea,
            'quantityEnterprise' => $userDTO->quantityEnterprise,
            'quantityTeam' => $userDTO->quantityTeam,
            'reason' => $userDTO->reason,
        ]);

        $token = $user->createToken($userDTO->email)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return $response;
    }

    public function login(LoginDTO $loginDTO)
    {

        $user = User::where('email', $loginDTO->email)->first();

        if(!$user || !Hash::check($loginDTO->password, $user->password)){

            throw ValidationException::withMessages([
                'email' => ['email ou senha incorretos']
            ]);
        }

        $token = $user->createToken($loginDTO->email)->plainTextToken;
        $response = [
            'email' => $user,
            'token' => $token
        ];

        return $response;
    }
}
