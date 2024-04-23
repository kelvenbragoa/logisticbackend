<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeliveryRequest;
use App\Models\Company;
use App\Models\Delivery;
use App\Models\Device;
use App\Models\Transaction;
use App\Models\TypeDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $searchQuery = request('query');
        // $delivery = Delivery::query()
        // ->when(request('query'),function($query,$searchQuery){
        //     $query->where('name','like',"%{$searchQuery}%");
        // })
        // ->orderBy('name','asc')
        // ->paginate();

        // return response()->json([
        //     'delivery' => $delivery
        // ]);
        $typedevices = TypeDevice::with('devices.devicestatus')->with('devices.deviceavailability')->with('devices.typedevice')->with('devices.employeeholding.employee')->with('devices.employeeholding.company')->get();
        $companies = Company::with('employees.deviceinhold.device')->get();
        return response()->json([
            'companies' => $companies,
            'typedevices' => $typedevices
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
    public function store(StoreDeliveryRequest $request)
    {
        //
        $data = $request->all();
        $user = Auth::user();

        $deliverytest = Delivery::where('device_id',$data['device_id'])
                                ->where('operation_id',1)->count();

        $deliverytest2 = Delivery::where('employee_id',$data['employee_id'])
                                ->where('operation_id',1)->count();
        if($deliverytest>0){
            return response()->json([
               'message' => 'Este dispositivo se encontra em uso em uma operação'
            ],422);
        }
        if($deliverytest2>0){
            return response()->json([
               'message' => 'Este funcionário ja tem um dispositivo alocado'
            ],422);
        }


 
        $delivery = Delivery::create([
            'device_id' => $data['device_id'],
            'company_id' => $data['company_id'],
            'employee_id'=> $data['employee_id'],
            'observation_delivery'=> $data['observation_delivery'] ?? null,
            'delivered_by_user_id'=> $user->id,
            'delivered_date'=> now(),
            'operation_id'=> 1,
        ]);

        $device = Device::find($data['device_id']);
        $device->update([
            'device_availability_id' => 2,
        ]);
        $transaction = Transaction::create([
            'delivery_id' => $delivery->id,
            'device_id' => $data['device_id'],
            'user_id' => $user->id,
            'employee_id' => $data['employee_id'],
            'operation_id' => 1,
        ]);

        return response()->json([
            'delivery' => $delivery
        ]);
    }

    public function deliveriesdragdrop(Request $request){
        $data = $request->all();
        $user = Auth::user();

        $deliverytest = Delivery::where('device_id',$data['device_id'])
                                ->where('operation_id',1)->count();

        $deliverytest2 = Delivery::where('employee_id',$data['employee_id'])
                                ->where('operation_id',1)->count();
        if($deliverytest>0){
            return response()->json([
               'message' => 'Este dispositivo se encontra em uso em uma operação'
            ],422);
        }
        if($deliverytest2>0){
            return response()->json([
               'message' => 'Este funcionário ja tem um dispositivo alocado'
            ],422);
        }


 
        $delivery = Delivery::create([
            'device_id' => $data['device_id'],
            'company_id' => $data['company_id'],
            'employee_id'=> $data['employee_id'],
            'observation_delivery'=> $data['observation_delivery'] ?? null,
            'delivered_by_user_id'=> $user->id,
            'delivered_date'=> now(),
            'operation_id'=> 1,
        ]);

        $device = Device::find($data['device_id']);
        $device->update([
            'device_availability_id' => 2,
        ]);
        $transaction = Transaction::create([
            'delivery_id' => $delivery->id,
            'device_id' => $data['device_id'],
            'user_id' => $user->id,
            'employee_id' => $data['employee_id'],
            'operation_id' => 1,
        ]);

        return response()->json([
            'delivery' => $delivery
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $delivery = Delivery::findOrFail($id);

        return response()->json([
            'delivery' => $delivery
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $delivery = Delivery::findOrFail($id);

        return response()->json([
            'delivery' => $delivery
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $delivery = Delivery::findOrFail($id);
        $user = Auth::user();

        $delivery->update([
            'observation_returning'=> $data['observation_returning'] ?? null,
            'returned_by_user_id'=> $user->id,
            'returned_date'=> now(),
            'operation_id'=>2
        ]);
        $device = Device::find($delivery->device_id);
        $device->update([
            'device_availability_id' => 1,
        ]);
        $transaction = Transaction::create([
            'delivery_id' => $delivery->id,
            'device_id' => $delivery->device_id,
            'user_id' => $user->id,
            'employee_id' => $delivery->employee_id,
            'operation_id' => 2,
        ]);

        return response()->json([
            'delivery' => $delivery
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $delivery = Delivery::findOrFail($id);

        $delivery->delete();

        return response()->noContent();
    }
}
