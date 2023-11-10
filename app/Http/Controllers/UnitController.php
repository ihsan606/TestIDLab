<?php

namespace App\Http\Controllers;

use App\Http\Resources\UnitResource;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();

        $result = new UnitResource($units, 'Successfully list all unit');

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $unit = Unit::create([
            'name' => $request->name,
        ]);

        $result = new UnitResource($unit, 'Successfully add new unit');

        return $result;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $unit = Unit::find($id);

        if(!$unit) {
            return new UnitResource(null, 'data tidak ditemukan', false);
        }
       
        $result = new UnitResource($unit, 'successfully get detail unit', true);

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
