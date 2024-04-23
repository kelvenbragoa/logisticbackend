<?php

namespace App\Http\Controllers\Api;

use App\Exports\TransactioExport;
use App\Exports\TransactionExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $searchQuery = request('query');

        $transaction = Transaction::query()
        ->when(request('query'),function($query,$searchQuery){
            $query->where('name','like',"%{$searchQuery}%");
        })
        ->with('device')
        ->with('delivery')
        ->with('user')
        ->with('employee')
        ->with('operation')
        ->orderBy('created_at','desc')
        ->paginate();

        return response()->json([
            'transaction' => $transaction
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
    public function store(StoreTransactionRequest $request)
    {
        //
        $data = $request->all();
        $transaction = Transaction::create($data);

        return response()->json([
            'transaction' => $transaction
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $transaction = Transaction::findOrFail($id);

        return response()->json([
            'transaction' => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $transaction = Transaction::findOrFail($id);

        return response()->json([
            'transaction' => $transaction
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $transaction = Transaction::findOrFail($id);

        $transaction->update($data);

        return response()->json([
            'transaction' => $transaction
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $transaction = Transaction::findOrFail($id);

        $transaction->delete();

        return response()->noContent();
    }

    public function export() 
    {
    
            return Excel::download(new TransactionExport(), 'transaction.xlsx');
        
    }
}
