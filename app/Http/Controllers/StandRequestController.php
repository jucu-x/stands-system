<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use App\Models\StandRequest;
use Illuminate\Http\Request;

class StandRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Stand $stand)
    {

        return view('stands.requests.index', ['stand'=>$stand, 'stand_requests'=>$stand->requests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StandRequest $standRequest)
    {
        return view('stands.requests.show', ['stand_request'=>$standRequest]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StandRequest $standRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StandRequest $standRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stand $stand, StandRequest $standRequest)
    {
        $standRequest->delete();
        return redirect()->route('stands.stand_requests.index', $stand);
    }
}
