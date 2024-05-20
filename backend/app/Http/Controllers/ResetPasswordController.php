<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ResetPasswordService;
use App\DTO\ResetPasswordDTO;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    private $resetPasswordService;

    public function __construct(ResetPasswordService $resetPasswordService)
    {
        $this->resetPasswordService = $resetPasswordService;
    }

    public function sendResetPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $resetPasswordDTO = new ResetPasswordDTO($request->input('email'));
        $status = $this->resetPasswordService->sendResetLink($resetPasswordDTO);

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'E-mail enviado com sucesso!']);
        } else {
            return response()->json(['error' => 'Falha ao enviar e-mail de redefinição de senha.'], 500);
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);


        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {

            $user->forceFill([
                'password' => bcrypt($password),
            ])->save();

        });

        if ($status === Password::PASSWORD_RESET) {
            return response()->json(['message' => 'Senha redefinida com sucesso!']);
        } else {
            return response()->json(['error' => 'Falha ao redefinir a senha.'], 500);
        }
    }
}
