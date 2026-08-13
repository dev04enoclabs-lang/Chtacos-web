<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendResetCodeMail;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function showLinkrequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetCode(Request $request)
    {
        $request->validate(
            ['email' => 'required|email|exists:users,email'],
            [
                // Mensajes para errors en el sistema
                'email.required' => 'El correo electrónico es obligatorio 😁.',
                'email.email' => 'Ingrese Un correo valido ejm: ejemplo123@gamil.com',
                'email.exists' => 'Correo Electronico no reconocido en el sistema',
            ]
        );

        $code = rand(100000, 999999);

        // Consulta corregida
        $user = User::where('email', $request->email)->first();

        $user->reset_code = $code;
        $user->reset_code_expires_at = Carbon::now()->addMinutes(15); // Minutos de expiracion de codigo
        $user->save();

        Mail::to($user->email)->send(new SendResetCodeMail($code));

        return redirect()->route('password.reset.form', ['email' => $request->email])
            ->with('status', 'Hemos enviado un código de 6 dígitos a tu correo.');
    }

    public function showResetForm(Request $request)
    {
        return view('auth.reset-password', ['email' => $request->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users,email',
                'code' => 'required|numeric',
                'password' => 'required|min:6|confirmed',

            ],
            [
                'code.required' => 'El código de verificación es obligatorio.',
                'code.numeric' => 'El código debe ser un numero valido.',

                'password.required' => 'La nueva contraseña es obligatoria.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
                'password.confirmed' => 'Las contraseñas no coinciden.',
            ]

        );

        $user = user::where('email', $request->email)
            ->where('reset_code', $request->code)
            ->where('reset_code_expires_at', '>', Carbon::now())
            ->first();
        if (!$user) {
            return back()->withErrors(['code' => 'El código es inválido o ha expirado.']);
        }

        $user->password = Hash::make($request->password);
        $user->reset_code = null;
        $user->reset_code_expires_at = null;
        $user->save();

        return redirect()->route('login')->with('status', 'Tu contraseña ha sido actualizada correctamente.');

    }

}
