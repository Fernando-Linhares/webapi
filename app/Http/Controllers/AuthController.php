<?php

namespace App\Http\Controllers;

use App\Contracts\IOAuthRepository;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;

class AuthController extends Controller
{
    public function __construct(
        private IOAuthRepository $reposity
    ){}

    public function register(UserRegisterRequest $request)
    {
        return $this->reposity->register($request);
    }

    public function login(Request $request)
    {
        return $this->reposity->login($request);
    }
}
