<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Foundation\Iam\Contracts\IamService as Contract;

final class IamService implements Contract
{
    public function findUserByToken(string $token): ?array
    {
        $user = User::query()->where('api_token', hash('sha256', $token))->first();

        return $user === null ? null : ['id' => $user->id, 'name' => $user->name];
    }
}
