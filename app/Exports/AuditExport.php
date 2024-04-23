<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Spatie\Activitylog\Models\Activity;

class AuditExport implements FromView,ShouldAutoSize
{
   use Exportable;
   private $audits;

   public function __construct() {
    $this->audits = Activity::orderBy('created_at','desc')->get();
   }

   public function view() : View{

        return view('report.audits',[
            'audits'=>$this->audits
        ]);

   }
}

