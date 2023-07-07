<?php

namespace App\Observers;

use App\Models\Expo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ExpoObserver
{

    public function creating(Expo $expo): void{
        $expo->created_by = Auth::id();
        $expo->updated_by = Auth::id();
    }
    public function updating(Expo $expo): void{
        $expo->updated_by = Auth::id();
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
