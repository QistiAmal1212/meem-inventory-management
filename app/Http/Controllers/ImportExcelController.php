<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    public function importProduct()
    {
        Excel::import(new ProductImport, 'product.xlsx');
    }
}
