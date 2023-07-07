<?php

namespace App\Observers;

use App\Models\Expo;
use App\Models\User;

class ExpoObserver
{

    public function creating(Expo $expo): void{
        $expo->created_by = User::where('email', 'admin@jucux.com')->first()->id;
        $expo->updated_by = User::where('email', 'admin@jucux.com')->first()->id;
    }
    /**
     * Handle the Expo "created" event.
     */
    public function created(Expo $expo): void
    {
        //
    }

    /**
     * Handle the Expo "updated" event.
     */
    public function updated(Expo $expo): void
    {
        //
    }

    /**
     * Handle the Expo "deleted" event.
     */
    public function deleted(Expo $expo): void
    {
        //
    }

    /**
     * Handle the Expo "restored" event.
     */
    public function restored(Expo $expo): void
    {
        //
    }

    /**
     * Handle the Expo "force deleted" event.
     */
    public function forceDeleted(Expo $expo): void
    {
        //
    }
}
