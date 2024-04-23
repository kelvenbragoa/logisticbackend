<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeviceStatusRequest;
use App\Models\DeviceStatus;
use Illuminate\Http\Request;

class DeviceStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $searchQuery = request('query');

        $devicestatus = DeviceStatus::query()
        ->when(request('query'),function($query,$searchQuery){
            $query->where('name','like',"%{$searchQuery}%");
        })
        ->orderBy('name','asc')
        ->paginate();

        return response()->json([
            'devicestatus' => $devicestatus
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
    public function store(StoreDeviceStatusRequest $request)
    {
        //
        $data = $request->all();
        $devicestatus = DeviceStatus::create($data);

        return response()->json([
            'devicestatus' => $devicestatus
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $devicestatus = DeviceStatus::findOrFail($id);

        return response()->json([
            'devicestatus' => $devicestatus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $devicestatus = DeviceStatus::findOrFail($id);

        return response()->json([
            'devicestatus' => $devicestatus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $devicestatus = DeviceStatus::findOrFail($id);

        $devicestatus->update($data);

        return response()->json([
            'devicestatus' => $devicestatus
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $devicestatus = DeviceStatus::findOrFail($id);

        $devicestatus->delete();

        return response()->noContent();
    }
}
