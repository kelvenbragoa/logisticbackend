<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $searchQuery = request('query');

        $driver = Driver::query()
        ->when(request('query'),function($query,$searchQuery){
            $query->where('name','like',"%{$searchQuery}%");
        })
        // ->with('trip')
        // ->with('loadstatus')
        ->orderBy('name','asc')
        ->paginate();

        return response()->json([
            'driver' => $driver
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
        $driver = Driver::create($data);

        return response()->json([
            'driver' => $driver
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $driver = Driver::findOrFail($id);

        return response()->json([
            'driver' => $driver
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $driver = Driver::findOrFail($id);
        // $trip = Trip::all();

        return response()->json([
            'driver' => $driver,
            // 'trip'=>$trip
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $driver = Driver::findOrFail($id);

        $driver->update($data);

        return response()->json([
            'driver' => $driver
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $driver = Driver::findOrFail($id);

        $driver->delete();

        return response()->noContent();
    }
}
