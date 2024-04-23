<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeDeviceRequest;
use App\Models\TypeDevice;
use Illuminate\Http\Request;

class TypeDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $searchQuery = request('query');

        $typedevice = TypeDevice::query()
        ->when(request('query'),function($query,$searchQuery){
            $query->where('name','like',"%{$searchQuery}%");
        })
        ->with('devices.devicestatus')
        ->with('devices.deviceavailability')
        ->orderBy('name','asc')
        ->paginate();

        return response()->json([
            'typedevice' => $typedevice
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
    public function store(StoreTypeDeviceRequest $request)
    {
        //
        $data = $request->all();
        $typedevice = TypeDevice::create($data);

        return response()->json([
            'typedevice' => $typedevice
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $typedevice = TypeDevice::findOrFail($id);

        return response()->json([
            'typedevice' => $typedevice
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $typedevice = TypeDevice::findOrFail($id);

        return response()->json([
            'typedevice' => $typedevice
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $typedevice = TypeDevice::findOrFail($id);

        $typedevice->update($data);

        return response()->json([
            'typedevice' => $typedevice
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $typedevice = TypeDevice::findOrFail($id);

        $typedevice->delete();

        return response()->noContent();
    }
}
