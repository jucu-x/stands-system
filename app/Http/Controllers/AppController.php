<?php

namespace App\Http\Controllers;

use App\Models\Expo;
use App\Models\ExpoSelector;
use App\Models\Stand;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home()
    {
        // TODO: Get the id of the selected event
        $current_expo = ExpoSelector::current()->expo;
        $stands = $current_expo?->stands;
        return view('home', ['stands' => $stands, 'current_expo' => $current_expo]);
    }

    public function about()
    {
        return view('about');
    }

    /**
     * Dummy action to show the dummy view
     */
    public function dump($desc=null)
    {
        return view('dump', ['message'=>$desc]);
    }
}
