<?php

namespace App\Http\Controllers;

use App\Models\AnonymousStandRequest;
use App\Models\Stand;
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
    public function store(Request $request)
    {
        //
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
