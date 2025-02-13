<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class DeferralController extends Controller
{
    public function store(Request $request)
    {
        try {
            $params = $request->validate([
                'contract_id' => 'required|integer',
                'period_start' => 'required|date',
                'period_end' => 'required|date',
                "value" => 'required|numeric|min:1',
            ]);
     
            $start = Date::createFromDate($params['period_start']);
            $end = Date::createFromDate($params['period_end']);
            
            $mouth = $start->diffInMonths($end);

            $value = $params['value'] / $mouth;
            
            $deferral = [];

            for ($i = 0; $i <= $mouth; $i++) {

                $deferral[] = [
                    'contract_id' => $params['contract_id'],
                    'installement' => $i + 1,
                    'billing_date' => $start->format('Y-m-d'),
                    'value' => $value
                ];

                $start->addMonth();
            }
            
            return response()->json($deferral, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()],  400);
        }
    }

    public function show(Request $request)
    {
        return response()->json([
            'contract_id' => (int)$request->id,
            'installement' => 1,
            'billing_date' => Date::now()->format('Y-m-d'),
            'value' => 100
        ]);
    }
}
