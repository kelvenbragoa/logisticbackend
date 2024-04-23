<?php

namespace App\Exports;

use App\Models\Device;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DeviceExport implements FromView,ShouldAutoSize
{
    use Exportable;
    private $devices;
 
    public function __construct() {
     $this->devices = Device::orderBy('created_at','desc')->get();
    }
 
    public function view() : View{
 
         return view('report.devices',[
             'devices'=>$this->devices
         ]);
 
    }
}
