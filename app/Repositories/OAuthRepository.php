<?php

namespace App\Repositories;

use App\Contracts\IOAuthRepository;
use App\Models\User;
use DateTime;
use Illuminate\Http\{ Request, JsonResponse };
use Illuminate\Support\Facades\Auth;

class OAuthRepository implements IOAuthRepository
{
    public function __construct(private User $user){}

    public function login(Request $request): JsonResponse
    {
        $expiration = new DateTime('+1 day');

        if($this->validate($request->all()))
            return response()->json([
                'token' => $this
                    ->user
                    ->where('email', $request->email)
                    ->first()
                    ->createToken(
                        $expiration->getTimestamp(),
                        ['*'],
                        $expiration
                    )
                    ->accessToken,
                'expiration' => $expiration->format('H:i:s')
            ]);


        return response()->json([
            'error' => 'validation error'
        ], 401);
    }

    private function validate(array $userData): bool
    {
        return Auth::attempt([
            'email' => $userData['email'],
            'password' => $userData['password']
        ]);
    }

    public function register(Request $request): JsonResponse
    {
        $userData = [
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password)
        ];

        $user = $this->user->firstOrCreate($userData);

        $expiration = new DateTime('+1 day');

        return response()->json([
            'token' => $user->createToken(
                    $expiration->getTimestamp(),
                    ['*'],
                    $expiration
                )
                ->accessToken,
            'expiration'=> $expiration->format('H:i:s')
        ]);
    }
}
