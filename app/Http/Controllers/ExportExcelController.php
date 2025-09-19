<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function exportProduct() 
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }
}
