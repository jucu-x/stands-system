<?php

namespace App\Http\Controllers;

use App\Enums\ExpoSelectorCriteria;
use App\Models\Expo;
use App\Models\ExpoSelector;
use Illuminate\Http\Request;

class CurrentExpoController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $expo_id)
    {
        ExpoSelector::updateOrCreate(
            ['criterion' => ExpoSelectorCriteria::Current->value],
            ['expo_id' => $expo_id]
        );
        return redirect()->route('expos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $expo_id)
    {
        ExpoSelector::updateOrCreate(
            ['criterion' => ExpoSelectorCriteria::Current->value],
            ['expo_id' => null]
        );
        return redirect()->route('expos.index');
    }
}
