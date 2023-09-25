<?php

namespace App\Contracts;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface IOAuthRepository extends IRepository
{
    public function register(Request $request): JsonResponse;

    public function login(Request $request): JsonResponse;
}
