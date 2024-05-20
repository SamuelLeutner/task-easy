<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\DTO\UserDTO;
use App\DTO\LoginDTO;
use App\Mail\PasswordResetEmail;
use App\Services\UserServices;
use App\Models\PasswordResetModel;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function __construct(protected UserServices $userServices){

    }

    public function register(Request $request){

        $request->validate([
            'email' => ['required', 'string','max:255'],
            'name' => ['required','string', 'max:255'],
            'password'=> ['required', 'string', 'min:6'],
            'accountName' => ['required', 'string', 'max:255']
        ]);

        $userDTO = new UserDTO(

            $request->input('email'),
            $request->input('name'),
            $request->input('password'),
            $request->input('accountName'),
            $request->input('aboutUs'),
            $request->input('currentPosition'),
            $request->input('focusArea'),
            $request->input('managementArea'),
            $request->input('quantityEnterprise'),
            $request->input('quantityTeam'),
            $request->input('reason'),
);
        $response = $this->userServices->createUser($userDTO);

        return response($response);
    }


    public function login(Request $request){

        $loginDTO = new LoginDTO(
            $request->input('email'),
            $request->input('password')
        );

        $response = $this->userServices->login($loginDTO);

        return response($response, 200);
    }
    public function resetPasswordRequest(Request $request){

        $email = 'destinatario@example.com';
        $token = Str::random(60);

        $newPassordReset = new PasswordResetModel();
        $newPassordReset->hash = $token;
        $newPassordReset->email = $email;

        $newPassordReset->save();


        Mail::to($email)->send(new PasswordResetEmail($token));

        return response('Caso este email esteja cadastrado na base de dados você recebera um email', 200);
    }



    public function user(){
        $user = auth()->user();
        return response($user, 200);
    }

    public function logout(){

        auth()->user()->tokens()->delete();
        return response('usuario deslogado', 200);
    }

}
