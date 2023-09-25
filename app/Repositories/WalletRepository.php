<?php

namespace App\Repositories;

use App\Contracts\IWalletRepository;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class WalletRepository implements IWalletRepository
{
    public function __construct(
        private Wallet $wallet
    ){}

    /**
     * Should return all wallets
     *
     * @return Illuminate\Database\Eloquent\Collection<Wallet>
     */
    public function all(): Collection
    {
        return $this->wallet->all();
    }

    /**
     * Should find one wallet
     *
     * @param \App\Models\Wallet $wallet
     * @return  \App\Models\Wallet|\Illuminate\Http\JsonResponse
     */
    public function find(Wallet $wallet): Wallet
    {
        return $wallet
        ?? response()->json([
            'error' => 'create wallet fail'
        ], 500);
    }

    /**
     * Should update some wallet
     *
     * @param Illuminate\Http\Request $request
     * @param \App\Models\Wallet $wallet
     * @return \App\Models\Wallet|\Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Wallet $wallet): Wallet|JsonResponse
    {
        if($wallet->update($request->all()))
            return $wallet;

        return response()->json([
            'error' => 'update wallet fail'
        ], 500);
    }

    /**
     * Should delete some wallet
     *
     * @param \App\Models\Wallet $wallet
     * @return \App\Models\Wallet|\Illuminate\Http\JsonResponse
     */
    public function delete(Wallet $wallet): Wallet|JsonResponse
    {
        if($wallet->delete())
            return $wallet;

        return response()->json([
            'error' => 'delete wallet fail'
        ], 500);
    }

    /**
     * Should store some wallet
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\Wallet|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request): Wallet|JsonResponse
    {
        return $this->wallet->create($request->all())
            ?? response()->json([
            'error' => 'create wallet fail'
        ], 500);
    }
}
