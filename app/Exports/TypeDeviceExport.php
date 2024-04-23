<?php

namespace App\Exports;

use App\Models\TypeDevice;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TypeDeviceExport implements FromView,ShouldAutoSize
{
    use Exportable;
    private $typedevices;
 
    public function __construct() {
     $this->typedevices = TypeDevice::orderBy('created_at','desc')->get();
    }
 
    public function view() : View{
 
         return view('report.typedevices',[
             'typedevices'=>$this->typedevices
         ]);
 
    }
}
