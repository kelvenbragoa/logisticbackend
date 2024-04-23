<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\LoadStatus;
use App\Models\Trela;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $searchQuery = request('query');

        $destination = Destination::query()
        ->when(request('query'),function($query,$searchQuery){
            $query->where('name','like',"%{$searchQuery}%");
        })
        ->with('loadstatus')
        ->with('trela')
        ->orderBy('departure','asc')
        ->paginate();

        return response()->json([
            'destination' => $destination
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $load = LoadStatus::get();
        $trela = Trela::get();

        return response()->json([
            'load' => $load,
            'trela' => $trela
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $destination = Destination::create($data);

        return response()->json([
            'destination' => $destination
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $destination = Destination::with('trela')->with('loadstatus')->findOrFail($id);

        return response()->json([
            'destination' => $destination
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $destination = Destination::findOrFail($id);
        $loadstatus = LoadStatus::all();
        $trela = Trela::all();

        return response()->json([
            'destination' => $destination,
            'load'=>$loadstatus,
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
        $destination = Destination::findOrFail($id);

        $destination->update($data);

        return response()->json([
            'destination' => $destination
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $destination = Destination::findOrFail($id);

        $destination->delete();

        return response()->noContent();
    }
}
