<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResepResource;
use App\Models\Resep;
use App\Models\ResepBahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResepController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required',
            'description'         => 'required',
            'duration'         => 'required',
            'portion'         => 'required',
            'bahans'         => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $resep = Resep::create([
            'name' => $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'portion' => $request->portion,
        ]);


        $bahans = $request->bahans;
        if($bahans) {
            foreach ($bahans as $bahan) {
                ResepBahan::create([
                    'resep_id' => $resep->id,
                    'bahan_id' => $bahan['bahan_id'],
                    'qty' => $bahan['qty']
                ]);
            }
        }
       
        $result = new ResepResource($resep, 'Successfully add new resep');

        return $result;
    }

    /**
     * Display the specified resource.
     */
    public function show(Resep $resep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resep $resep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resep $resep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resep $resep)
    {
        //
    }
}
