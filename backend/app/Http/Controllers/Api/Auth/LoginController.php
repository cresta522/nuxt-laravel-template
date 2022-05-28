<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::query()->where('email', $email)->first();

        // Hash::check(今入力されたパスワード、DBに保存された暗号化済みのパスワード)
        if (!$user || !Hash::check($password, $user->password)) {
            //ユーザーがいない｜または｜DBのパスワードと合致していれば
            throw ValidationException::withMessages([
                'email' => ['メールアドレスかパスワードが違います。'],
            ]);
        }

        $token = $user->createToken('token')->plainTextToken;
        //tokenという名前で返す
        return response()->json(compact('token'), 200);
    }
}
