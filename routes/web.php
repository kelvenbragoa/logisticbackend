<?php

use App\Models\Delivery;
use App\Models\User;
use App\Notifications\Device;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $delivery = Delivery::find(3);
    // User::find(1)->notify(new Device($delivery));
    $users = User::all();

    Notification::send($users, new Device($delivery));
});
