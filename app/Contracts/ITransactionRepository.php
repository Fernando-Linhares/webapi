<?php

namespace App\Contracts;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface ITransactionRepository extends IRepository
{
    /**
     * Should return all transactions
     *
     * @return Illuminate\Database\Eloquent\Collection<Transaction>
     */
    public function all(): Collection;

    /**
     * Should find one transaction
     *
     * @param App\Models\Transaction $transaction
     * @return  App\Models\Transaction|Illuminate\Http\JsonResponse
     */
    public function find(Transaction $transaction): Transaction|JsonResponse;

    /**
     * Should update some transaction
     *
     * @param Illuminate\Http\Request $request
     * @param App\Models\Transaction $transaction
     * @return App\Models\Transaction|Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Transaction $transaction): Transaction|JsonResponse;

    /**
     * Should delete shome transaction
     *
     * @param App\Models\Transaction $transaction
     * @return App\Models\Transaction|Illuminate\Http\JsonResponse
     */
    public function delete(Transaction $transaction): Transaction|JsonResponse;

    /**
     * Should store some transaction
     *
     * @param \Illuminate\Http\Request $request
     * @return App\Models\Transaction|Illuminate\Http\JsonResponse
     */
    public function store(Request $request): Transaction|JsonResponse;
}
