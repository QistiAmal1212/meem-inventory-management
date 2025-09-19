<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportPdfController extends Controller
{
    public function exportProduct()
    {
        $products = Product::all();

        $pdf = Pdf::loadView('exports.products', ['products' => $products]);

        return $pdf->download('product.pdf');
    }
}
