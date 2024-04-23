<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransactionExport implements FromView,ShouldAutoSize
{
   use Exportable;
   private $transactions;

   public function __construct() {
    $this->transactions = Transaction::orderBy('created_at','desc')->get();
   }

   public function view() : View{

        return view('report.transactions',[
            'transactions'=>$this->transactions
        ]);

   }
}
