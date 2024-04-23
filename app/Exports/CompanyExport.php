<?php

namespace App\Exports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CompanyExport implements FromView,ShouldAutoSize
{
    use Exportable;
   private $companies;

   public function __construct() {
    $this->companies = Company::orderBy('created_at','desc')->get();
   }

   public function view() : View{

        return view('report.companies',[
            'companies'=>$this->companies
        ]);

   }
}
