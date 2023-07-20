<?php

namespace App\Http\Controllers;

use App\Models\Expo;
use App\Models\Stand;
use Illuminate\Http\Request;

class StandController extends Controller
{
    /**
     * Display a listing of the stands.
     */
    public function index()
    {
        return view('stands.index', [
            'stands' => Stand::all(),
        ]);
    }
}
