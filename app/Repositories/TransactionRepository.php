<?php

namespace App\Repositories;

use App\Contracts\ITransactionRepository;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TransactionRepository implements ITransactionRepository
{
    public function __construct(
        private Transaction $transaction
    ){}

    /**
     * Should return all transactions
     *
     * @return Illuminate\Database\Eloquent\Collection<Transaction>
     */
    public function all(): Collection
    {
        return $this->transaction->all();
    }

    /**
     * Should find one transaction
     *
     * @param App\Models\Transaction $transaction
     * @return  App\Models\Transaction|Illuminate\Http\JsonResponse
     */
    public function find(Transaction $transaction): Transaction|JsonResponse
    {
        return $transaction
        ?? response()->json([
            'error' => 'transaction not found'
        ], 404);
    }

    /**
     * Should update some transaction
     *
     * @param Illuminate\Http\Request $request
     * @param App\Models\Transaction $transaction
     * @return App\Models\Transaction|Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Transaction $transaction): Transaction|JsonResponse
    {
        if($transaction->update($request->all()))
            return $transaction;

        return response()->json([
            'error' => 'transaction can not be updated'
        ], 500);
    }

    /**
     * Should delete shome transaction
     *
     * @param App\Models\Transaction $transaction
     * @return App\Models\Transaction|Illuminate\Http\JsonResponse
     */
    public function delete(Transaction $transaction): Transaction|JsonResponse
    {
        if($transaction->delete())
            return $transaction;

        return response()->json([
            'error' => 'transaction can not be deleted'
        ], 500);
    }

    /**
     * Should store some transaction
     *
     * @param \Illuminate\Http\Request $request
     * @return App\Models\Transaction|Illuminate\Http\JsonResponse
     */
    public function store(Request $request): Transaction|JsonResponse
    {
        return $this->transaction->create($request->all())
        ?? response()->json([
            'error' => 'transaction can not be created'
        ], 500);
    }
}
