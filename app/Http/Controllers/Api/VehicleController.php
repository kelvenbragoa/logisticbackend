<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trela;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $searchQuery = request('query');

        $vehicle = Vehicle::query()
        ->when(request('query'),function($query,$searchQuery){
            $query->where('name','like',"%{$searchQuery}%");
        })
        ->with('trela')
        // ->with('loadstatus')
        ->orderBy('name','asc')
        ->paginate();

        return response()->json([
            'vehicle' => $vehicle
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
        $data = $request->all();
        $vehicle = Vehicle::create($data);

        return response()->json([
            'vehicle' => $vehicle
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $vehicle = Vehicle::with('trela')->findOrFail($id);

        return response()->json([
            'vehicle' => $vehicle
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $vehicle = Vehicle::findOrFail($id);
        $trela = Trela::all();

        return response()->json([
            'vehicle' => $vehicle,
            'trela'=>$trela
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $vehicle = Vehicle::findOrFail($id);

        $vehicle->update($data);

        return response()->json([
            'vehicle' => $vehicle
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $vehicle = Vehicle::findOrFail($id);

        $vehicle->delete();

        return response()->noContent();
    }
}
