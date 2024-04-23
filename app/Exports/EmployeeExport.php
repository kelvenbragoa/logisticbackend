<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EmployeeExport implements FromView,ShouldAutoSize
{
    use Exportable;
   private $employees;

   public function __construct() {
    $this->employees = Employee::orderBy('created_at','desc')->get();
   }

   public function view() : View{

        return view('report.employees',[
            'employees'=>$this->employees
        ]);

   }
}
