<?php

namespace App\Http\Controllers;

use App\Models\Expo;
use App\Models\Stand;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ExpoStandController extends Controller
{
    /**
     * Display a listing of the stands for an expo
     */
    public function index(Expo $expo)
    {
        return view('expos.stands.index', [
            'stands' => $expo->stands,
            'all_expos' => Expo::all(),
            'expo' => $expo
        ]);
    }

    /**
     * Show the form for creating a new stand for this expo
     */
    public function create(Expo $expo)
    {
        return view('expos.stands.create', ['expo' => $expo]);
    }

    /**
     * Store a newly created expo's stand in storage.
     */
    public function store(Request $request, Expo $expo)
    {
        $validated = $request->validate([
            'code' => ['required', Rule::unique('stands')->where(fn (Builder $query) => $query->where('expo_id', $expo->id)), 'max:4'],
            'expected_cost' => 'decimal:0,2|nullable',
            'building' => 'max:255|nullable',
            'x' => 'numeric|nullable',
            'y' => 'numeric|nullable',
            'width' => 'numeric|nullable',
            'length' => 'numeric|nullable',
        ]);
        // dd(array_merge($validated, ['partial_time'=>$request->has('partial_time'),'expo_id'=>$expo->id]));
        Stand::create(array_merge($validated, ['partial_time' => $request->has('partial_time'), 'expo_id' => $expo->id]));
        return redirect()->route('expos.stands.index', $expo);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expo $expo, Stand $stand)
    {
        return view('expos.stands.edit', ['expo' => $expo, 'stand' => $stand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expo $expo, Stand $stand)
    {
        $validated = $request->validate([
            'code' => [
                'required',
                Rule::unique('stands')
                    ->where(fn (Builder $query) => $query->where('expo_id', $expo->id)->whereNot('code', $stand->code)),
                'max:4'
            ],
            'expected_cost' => 'decimal:0,2|nullable',
            'building' => 'max:255|nullable',
            'x' => 'numeric|nullable',
            'y' => 'numeric|nullable',
            'width' => 'numeric|nullable',
            'length' => 'numeric|nullable',
        ]);
        // dd(array_merge($validated, ['partial_time'=>$request->has('partial_time'),'expo_id'=>$expo->id]));
        $stand->update( array_merge($validated, ['partial_time' => $request->has('partial_time'), 'expo_id' => $expo->id]) );
        return redirect()->route('expos.stands.index', $expo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expo $expo, Stand $stand)
    {
        $stand->delete();
        return redirect()->route('expos.stands.index', $expo);
    }
}
