<?php

namespace App\Http\Controllers;

use App\Models\Expo;
use App\Models\Stand;
use Illuminate\Http\Request;

class StandController extends Controller
{

    /**************************************************************
     *                                                            *
     *              RESOURCE CONTROLLER METHODS                   *
     *                                                            *
     **************************************************************/

    /**
     * Display a listing of the stands.
     */
    public function index()
    {
        return view('stands.index', [
            'stands' => Stand::all(),
        ]);
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
    public function show(Stand $stand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stand $stand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stand $stand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stand $stand)
    {
        //
    }


    /***********************************************
     *                                             *
     *              BULK OPERATIONS                *
     *                                             *
     ***********************************************/

    /**
     * Show the form for creating stands for an expo in bulk .
     */
    public function bulkCreate(Expo $expo)
    {
        $expos = Expo::all();
        return view('stands.bulk-create', ['expos' => $expos, 'selected_expo' => $expo]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function bulkStore(Request $request)
    {

        $validated = $request->validate(
            [
                'expo_id' => 'exists:expos,id',
                'normal-stands-count' => 'integer|numeric|min:0|max:150',
                'partial-stands-count' => 'integer|numeric|min:0|max:150',
            ]
        );

        $interval = $this->bulkCodesIntervals(
            $validated['normal-stands-count'],
            $validated['partial-stands-count'],
            Stand::lastCodeInExpo($validated['expo_id'])
        );
        for ($i = $interval['normal_code_i']; $i <= $interval['normal_code_n']; $i++) {
            Stand::create(
                [
                    "code" => $i,
                    "partial_time" => false,
                    "expo_id" => $validated['expo_id']
                ]
            );
        }
        for ($i = $interval['partial_code_i']; $i <= $interval['partial_code_n']; $i++) {
            Stand::create(
                [
                    "code" => $i,
                    "partial_time" => true,
                    "expo_id" => $validated['expo_id']
                ]
            );
        }
        return redirect()->route('stands.index');
    }

    /**
     * Remove all STANDS in expo
     */
    public function destroyAllInExpo(Expo $expo)
    {
        Stand::where('expo_id', $expo->id)->delete();
        return back();
    }

    /*****************************************************
     *                                                   *
     * -   -   -   -   -   UTILITIES   -   -   -   -   - *
     *                                                   *
     *****************************************************/

    /**
     * Calcs codes to be assigned to the new stands created in bulk
     */
    private function bulkCodesIntervals($normal_stands_amount, $partial_stands_amount, $last_code = 0): array
    {
        $normal_code_i = $last_code + 1;
        $normal_code_n = $last_code + $normal_stands_amount;
        $partial_code_i = $normal_code_n + 1;
        $partial_code_n = $normal_code_n + $partial_stands_amount;
        return [
            'normal_code_i' => $normal_code_i,
            'normal_code_n' => $normal_code_n,
            'partial_code_i' => $partial_code_i,
            'partial_code_n' => $partial_code_n
        ];
    }
}
