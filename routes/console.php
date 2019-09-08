<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('debug', function () {
    \DB::enableQueryLog();
    Artisan::call('scout:import', [
        'model' => \App\Employee::class
    ]);
    var_dump(\DB::getQueryLog());
    var_dump(json_encode(\App\Employee::search('*')->take(2)->raw()));
})->describe('debug');
