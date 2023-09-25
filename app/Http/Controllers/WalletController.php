<?php

namespace App\Http\Controllers;

use App\Contracts\IWalletRepository;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function __construct(
        private IWalletRepository $repository
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->repository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        return $this->repository->find($wallet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wallet $wallet)
    {
        return $this->repository->update($request, $wallet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {
        return $this->repository->delete($wallet);
    }
}
