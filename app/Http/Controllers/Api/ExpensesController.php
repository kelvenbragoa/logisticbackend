<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expenses;
use App\Models\Trip;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $searchQuery = request('query');

        $expenses = Expenses::query()
        ->when(request('query'),function($query,$searchQuery){
            $query->where('name','like',"%{$searchQuery}%");
        })
        ->with('trip')
        // ->with('loadstatus')
        ->orderBy('id','asc')
        ->paginate();

        return response()->json([
            'expenses' => $expenses
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
        $expenses = Expenses::create($data);

        return response()->json([
            'expenses' => $expenses
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $expenses = Expenses::with('trip')->findOrFail($id);

        return response()->json([
            'expenses' => $expenses
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $expenses = Expenses::findOrFail($id);
        $trip = Trip::all();

        return response()->json([
            'expenses' => $expenses,
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
        $expenses = Expenses::findOrFail($id);

        $expenses->update($data);

        return response()->json([
            'expenses' => $expenses
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $expenses = Expenses::findOrFail($id);

        $expenses->delete();

        return response()->noContent();
    }
}
