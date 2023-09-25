<?php

namespace App\Contracts;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

interface IWalletRepository extends IRepository
{
    /**
     * Should return all wallets
     *
     * @return Illuminate\Database\Eloquent\Collection<Wallet>
     */
    public function all(): Collection;

    /**
     * Should find one wallet
     *
     * @param App\Models\Wallet $wallet
     * @return  \App\Models\Wallet|\Illuminate\Http\JsonResponse
     */
    public function find(Wallet $wallet):  Wallet|JsonResponse;

    /**
     * Should update some wallet
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Wallet $wallet
     * @return \App\Models\Wallet|\Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Wallet $wallet):  Wallet|JsonResponse;

    /**
     * Should delete some wallet
     *
     * @param \App\Models\Wallet $wallet
     * @return \App\Models\Wallet|\Illuminate\Http\JsonResponse
     */
    public function delete(Wallet $wallet):  Wallet|JsonResponse;

    /**
     * Should store some wallet
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\Wallet|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request):  Wallet|JsonResponse;
}
