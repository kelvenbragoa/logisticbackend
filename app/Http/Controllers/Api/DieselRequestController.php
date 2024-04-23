<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DieselRequest;
use App\Models\Trip;
use Illuminate\Http\Request;

class DieselRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $searchQuery = request('query');

        $dieselrequest = DieselRequest::query()
        ->when(request('query'),function($query,$searchQuery){
            $query->where('name','like',"%{$searchQuery}%");
        })
        ->with('trip')
        // ->with('loadstatus')
        ->orderBy('id','asc')
        ->paginate();

        return response()->json([
            'dieselrequest' => $dieselrequest
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
        $dieselrequest = DieselRequest::create($data);

        return response()->json([
            'dieselrequest' => $dieselrequest
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $dieselrequest = DieselRequest::with('trip')->findOrFail($id);

        return response()->json([
            'dieselrequest' => $dieselrequest
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $dieselrequest = DieselRequest::findOrFail($id);
        $trip = Trip::all();

        return response()->json([
            'dieselrequest' => $dieselrequest,
            'trip'=>$trip
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $dieselrequest = DieselRequest::findOrFail($id);

        $dieselrequest->update($data);

        return response()->json([
            'dieselrequest' => $dieselrequest
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dieselrequest = DieselRequest::findOrFail($id);

        $dieselrequest->delete();

        return response()->noContent();
    }
}
