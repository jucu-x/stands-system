<?php

namespace App\Http\Controllers;

use App\Models\Expo;
use App\Models\Stand;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home()
    {
        // TODO: Get the id of the selected event
        $selected_expo_id = null;
        $selected_expo = Expo::find($selected_expo_id);
        $stands = $selected_expo?->stands;
        return view('home', ['stands' => $stands, 'selected_expo' => $selected_expo]);
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
