<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

Artisan::command('stats', function () {
    $this->line('signups: '.DB::table('signups')->count().', mails: '.DB::table('mails')->count());
});
