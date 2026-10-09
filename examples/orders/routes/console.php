<?php

use Foundation\Billing\Contracts\BillingService;
use Foundation\Billing\Shadows\CustomerShadow;
use Illuminate\Support\Facades\Artisan;

Artisan::command('customers:show {id}', function (BillingService $billing, int $id) {
    $this->line('copy: '.(CustomerShadow::query()->find($id)->name ?? '-'));
    $this->line('rpc: '.($billing->customerName($id) ?? '-'));
});
