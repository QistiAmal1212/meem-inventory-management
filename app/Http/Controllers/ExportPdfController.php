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

    public function exportProductStock()
    {
        $products = Product::all();

        $pdf = Pdf::loadView('exports.pdf.product-stock', [
            'products' => $products
        ])->setPaper('A4', 'portrait')
        ->setOptions([
            'isRemoteEnabled' => true,
        ]);
    
        return $pdf->stream('stock.pdf'); 
    }
}
