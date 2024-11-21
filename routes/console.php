<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

use Illuminate\Support\Facades\Schedule;

// Tambahkan jadwal di bawah ini di routes/console.php
Schedule::call(function () {
    Artisan::call('reset:data');
})->yearlyOn(1, 1, '00:00'); // Jalankan tiap 1 Januari pukul 00:00
