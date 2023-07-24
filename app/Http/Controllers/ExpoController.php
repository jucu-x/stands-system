<?php

namespace App\Http\Controllers;

use App\Models\Expo;
use App\Models\ExpoSelector;
use Illuminate\Http\Request;

class ExpoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expos = Expo::all();
        return view('expos.index', ["expos"=>$expos, "current_expo"=>ExpoSelector::current()?->expo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Expo::create($request->all());
        return redirect()->route('expos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expo $expo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expo $expo)
    {
        return view('expos.edit', ['expo'=>$expo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expo $expo)
    {
        $expo->update($request->all());
        return redirect()->route('expos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expo $expo)
    {
        $expo->delete();
        return redirect()->route('expos.index');
    }
}
