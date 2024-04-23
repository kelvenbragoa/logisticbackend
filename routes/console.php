<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->everyFiveSeconds();

// Artisan::command('app:check-device')->everyFiveSeconds();
Schedule::command('app:check-device')->hourly();