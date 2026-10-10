<?php

declare(strict_types=1);

namespace App\Handlers;

use Foundation\Iam\Events\UserRegistered;
use Illuminate\Support\Facades\DB;
use Microservices\Contracts\Stream\Handler;

final class RecordSignup implements Handler
{
    public function handle(string $name, array $payload): void
    {
        DB::table('signups')->insertOrIgnore(['user_id' => UserRegistered::from($payload)->id, 'created_at' => now()]);
    }
}
