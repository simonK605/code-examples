<?php

namespace App\Http\TestController;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;

class ReportController extends Controller
{
    public function testReport()
    {
        // download report
        return Excel::download(new ReportExport(), 'test_report.csv');
    }
}
