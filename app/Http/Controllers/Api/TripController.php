<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\DieselRequest;
use App\Models\Driver;
use App\Models\Expenses;
use App\Models\Trela;
use App\Models\Trip;
use App\Models\TripStatus;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $searchQuery = request('query');

        $trip = Trip::query()
        ->when(request('query'),function($query,$searchQuery){
            $query->where('name','like',"%{$searchQuery}%");
        })
        ->with('vehicle')
        ->with('driver')
        ->with('destination')
        ->with('trela')
        ->with('user')
        ->with('tripstatus')
        ->orderBy('id','asc')
        ->paginate();

        return response()->json([
            'trip' => $trip
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $driver = Driver::all();
        $destination = Destination::with('trela')->orderBy('departure','asc')->get();
        $trela = Trela::all();
        $user = User::all();
        $tripstatus = TripStatus::all();
        $vehicle = Vehicle::all();

        return response()->json([
            'driver'=>$driver,
            "destination"=>$destination,
            "trela"=>$trela,
            "user"=>$user,
            "tripstatus"=>$tripstatus,
            "vehicle"=>$vehicle
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $destination = Destination::find($data["destination_id"]);
        $trip = Trip::create([
            "user_id"=>Auth::user()->id,
            "vehicle_id"=>$data["vehicle_id"],
            "driver_id"=>$data["driver_id"],
            "destination_id"=>$data["destination_id"],
            "trela_id"=>$destination->trela_id,
            "trip_status_id"=>1,
        ]);

        return response()->json([
            'trip' => $trip
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $trip = Trip::with('vehicle.trela')
        ->with('driver')
        ->with('destination.trela')
        ->with('trela')
        ->with('user')
        ->with('tripstatus')->findOrFail($id);
        $destination = Destination::where('id',$trip->destination_id)->with('loadstatus')->with('trela')->get();
        $dieselrequest = DieselRequest::where("trip_id",$id)->orderBy('created_at','desc')->get();
        $expenses = Expenses::where("trip_id",$id)->orderBy('created_at','desc')->get();

        return response()->json([
            'trip' => $trip,
            "destination" => $destination,
            "dieselrequest" => $dieselrequest,
            "expense" => $expenses
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $trip = Trip::findOrFail($id);
        $driver = Driver::all();
        $destination = Destination::with('trela')->get();
        $trela = Trela::all();
        $vehicle = Vehicle::all();
        $user = User::all();
        $tripstatus = TripStatus::all();

        return response()->json([
            
            'trip'=>$trip,
            'driver' => $driver,
            'destination' => $destination,
            'trela' => $trela,
            'user' => $user,
            'tripstatus' => $tripstatus,
            "vehicle"=>$vehicle
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $trip = Trip::findOrFail($id);

        $trip->update($data);

        return response()->json([
            'trip' => $trip
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $trip = Trip::findOrFail($id);

        $trip->delete();

        return response()->noContent();
    }
}
