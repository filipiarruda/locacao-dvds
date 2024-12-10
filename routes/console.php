<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('app:update-dvd-prices')->everyThreeMinutes();
