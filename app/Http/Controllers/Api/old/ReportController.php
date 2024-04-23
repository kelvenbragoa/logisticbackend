<?php

namespace App\Http\Controllers\Api;

use App\Exports\AuditExport;
use App\Exports\CompanyExport;
use App\Exports\DeviceExport;
use App\Exports\EmployeeExport;
use App\Exports\TransactionExport;
use App\Exports\TypeDeviceExport;
use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    //
    public function exporttransaction() 
    {
            return Excel::download(new TransactionExport(), 'transaction.xlsx');
    }
    public function exportuser() 
    {
            return Excel::download(new UserExport(), 'transaction.xlsx');
    }
    public function exportcompany() 
    {
            return Excel::download(new CompanyExport(), 'transaction.xlsx');
    }
    public function exportdevice() 
    {
            return Excel::download(new DeviceExport(), 'transaction.xlsx');
    }
    public function exporttypedevice() 
    {
            return Excel::download(new TypeDeviceExport(), 'transaction.xlsx');
    }
    public function exportaudit() 
    {
            return Excel::download(new AuditExport(), 'transaction.xlsx');
    }
    public function exportemployee() 
    {
            return Excel::download(new EmployeeExport(), 'transaction.xlsx');
    }
}
