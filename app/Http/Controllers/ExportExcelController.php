<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Exports\ProductStockExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function exportProduct()
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }

    public function exportProductStock()
    {
        return Excel::download(new ProductStockExport, 'stocks.xlsx');
    }
}
