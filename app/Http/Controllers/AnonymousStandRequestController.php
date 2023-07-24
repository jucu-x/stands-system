<?php

namespace App\Http\Controllers;

use App\Models\AnonymousStandRequest;
use App\Models\Stand;
use App\Models\StandRequest;
use Illuminate\Http\Request;

class AnonymousStandRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Stand $stand)
    {
        return view('stands.requests.anonymous.create', ['stand' => $stand]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Stand $stand)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'address' => 'nullable|max:255',
                'phone_number' => 'required|max:15|min:7',
                'request_message' => 'nullable|max:2000',
                'stand_start_date' => 'nullable|date',
                'stand_end_date' => 'nullable|date',
            ]
        );

        $parentStandRequest = StandRequest::create(array_merge($validated, ['stand_id' => $stand->id]));
        AnonymousStandRequest::create(array_merge($validated, ['id' => $parentStandRequest->id]));
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnonymousStandRequest $anonymousStandRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnonymousStandRequest $anonymousStandRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnonymousStandRequest $anonymousStandRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnonymousStandRequest $anonymousStandRequest)
    {
        //
    }
}
