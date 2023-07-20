<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpoStandBulkRequest;
use App\Models\Expo;
use App\Models\Stand;
use Illuminate\Http\Request;

class ExpoStandBulkController extends Controller
{
    /**
     * Show the form for creating stands for an expo in bulk .
     */
    public function create(Expo $expo)
    {
        return view('expos.stands.bulk.create', ['expo' => $expo, 'all_expos' => Expo::all()]);
    }

    /**
     * Store the newly bulk created stands for an expo in storage.
     */
    public function store(StoreExpoStandBulkRequest $request, Expo $expo)
    {
        $validated = $request->validated();

        $intervals = $this->bulkStandCodesIntervals(
            $validated['normal-stands-count'],
            $validated['partial-stands-count'],
            intval($expo->stands()->orderBy('code', 'desc')->first()?->code)
        );

        foreach ($intervals as $type => $interval) {
            for ($i = $interval[0]; $i <= $interval[1]; $i++) {
                Stand::create(
                    [
                        "code" => $i,
                        "partial_time" => $type == 'partial',
                        "expo_id" => $expo->id
                    ]
                );
            }
        }
        return redirect()->route('expos.stands.index', $expo);
    }

    /**
     * Remove the specified STANDS in expo from storage
     */
    public function destroy(Expo $expo)
    {
        $expo->stands()->delete();
        return back();
    }

    /**
     * Calcs codes to be assigned to the new stands created in bulk
     */
    private function bulkStandCodesIntervals($normal_stands_amount, $partial_stands_amount, $last_code = 0): array
    {
        $normal_interval = [0, -1];
        $partial_interval = [0, -1];
        $normal_interval[0] = $last_code + 1;
        $normal_interval[1] = $last_code + $normal_stands_amount;
        $partial_interval[0] = $normal_interval[1] + 1;
        $partial_interval[1] = $normal_interval[1] + $partial_stands_amount;
        return [
            'normal' => $normal_interval,
            'partial' => $partial_interval
        ];
    }
}
