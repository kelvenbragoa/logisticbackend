<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UserExport implements FromView,ShouldAutoSize
{
    use Exportable;
   private $users;

   public function __construct() {
    $this->users = User::orderBy('created_at','desc')->get();
   }

   public function view() : View{

        return view('report.users',[
            'users'=>$this->users
        ]);

   }
}
