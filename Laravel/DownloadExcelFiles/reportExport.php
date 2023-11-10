<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport implements FromCollection
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        // get data for report and covert to array
        return Report::get()->toArray();
    }
}
