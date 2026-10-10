<?php

use App\Models\User;
use Foundation\Iam\Events\UserRegistered;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Microservices\Contracts\Stream\Bus;

Artisan::command('users:register {name} {email}', function (Bus $bus, string $name, string $email) {
    $token = Str::random(40);

    DB::transaction(function () use ($bus, $name, $email, $token) {
        $user = User::query()->create(['name' => $name, 'email' => $email, 'api_token' => hash('sha256', $token)]);

        $bus->emit(new UserRegistered($user->id));
    });

    $this->line($token);
});
