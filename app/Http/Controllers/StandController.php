<?php

namespace App\Http\Controllers;

use App\Models\Expo;
use App\Models\Stand;
use Illuminate\Http\Request;

class StandController extends Controller
{
    public function standsHome()
    {
        $stands = Stand::all();
        $expos = Expo::all();
        return view('stands.stands-home', ['stands' => $stands, 'expos' => $expos]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $expos = Expo::all();
        if (request()->get('expo_id')) {
            $selected_expo = Expo::find(request()->get('expo_id'));
            if ($selected_expo==null) {
                # code...
                $stands = Stand::all();
            } else {
                $stands = Stand::where('expo_id', $selected_expo->id)->get();

            }
        } else {
            $selected_expo = null;
            $stands = Stand::all();
        }
        return view('stands.index', ['stands' => $stands, 'expos' => $expos, 'selected_expo' => $selected_expo]);
    }


    /**
     * Show the form for creating stands in bulk .
     */
    public function bulkCreate(Expo $expo)
    {
        $expos = Expo::all();
        return view('stands.bulk-create', ['expos' => $expos, 'selected_expo' => $expo]);
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function initial_store(Request $request)
    {
        $normal_start = 1;
        $normal_end = intval($request['normal-stands-count']);
        $partial_start = $normal_end + 1;
        $partial_end = $partial_start + $request['partial-stands-count'];
        //dd($request, $normal_end, $partial_start,  $partial_end);
        for ($i = $normal_start; $i <= $normal_end; $i++) {
            # code...
            Stand::create(
                [
                    "code" => $i,
                    "partial_time" => false,
                    "expo_id" => $request['expo_id']
                ]
            );
        }
        for ($i = $partial_start; $i <= $partial_end; $i++) {
            # code...
            Stand::create(
                [
                    "code" => $i,
                    "partial_time" => true,
                    "expo_id" => $request['expo_id']
                ]
            );
        }
        return redirect()->route('stands.home');
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
