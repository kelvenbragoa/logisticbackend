<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Delivery;
use App\Models\Destination;
use App\Models\Device;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\Transaction;
use App\Models\TypeDevice;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::count();
        $drivers = Driver::count();
        $vehicles = Vehicle::count();
        $destinations = Destination::count();
        // $dataDeliveryDay = [];
        // $dataDeliveryMonth = [];
        // $typedevices = TypeDevice::get();
        // $companies2 = Company::get();
        // $pieData = [];
        // $pieLabel = [];
        // $polarData = [];
        // $polarLabel = [];
        // $transactions = Transaction::
        // with('device')
        // ->with('user')
        // ->with('employee.company')
        // ->with('operation')
        // ->orderBy('created_at', 'DESC')->limit(5)->get();

        // foreach ($companies2 as $company){
        //     $polarLabel[] = $company->name;
        //     $polarData[] = $company->employees->count();
        // }

        // foreach ($typedevices as $typedevice){
        //     $pieLabel[] = $typedevice->name;
        //     $pieData[] = $typedevice->devices->count();
        // }

        // for ($x = 1; $x <= 31; $x++) {
        //     $deliveryChartDay = Delivery::whereDay('created_at',$x)->whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->count();
        //     $dataDeliveryDay[]=$deliveryChartDay;
        // }

        // for ($x = 1; $x <= 12; $x++) {
        //     $deliveryChartMonth = Delivery::whereMonth('created_at',$x)->whereYear('created_at',date('Y'))->count();
        //     $dataDeliveryMonth[]=$deliveryChartMonth;
        // }

        return response()->json([
            'users' => $users,
            'destinations' => $destinations,
            'vehicles' => $vehicles,
            'drivers' => $drivers,
            // 'dataDeliveryDay'=>$dataDeliveryDay,
            // 'dataDeliveryMonth'=>$dataDeliveryMonth,
            // 'transactions'=>$transactions,
            // 'pieLabel'=>$pieLabel,
            // 'pieData'=>$pieData,
            // 'polarLabel'=>$polarLabel,
            // 'polarData'=>$polarData
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
