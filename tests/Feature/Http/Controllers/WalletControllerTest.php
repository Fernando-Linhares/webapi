<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WalletControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Should return all wallets
     *
     * @test
     * @return void
     */
    public function index_should_return_all_wallets(): void
    {

    }
}
