<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductStockExport implements FromView, WithStyles, WithEvents, ShouldAutoSize
{
    public function view(): View
    {
        $products = Product::with('ProductStock')->get();

        return view('exports.product-stock', [
            'products' => $products
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        // Header row style (B6:F6)
        $sheet->getStyle('D6:I6')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFEB99'); // soft yellow
        $sheet->getStyle('D6:I6')->getFont()->setBold(true);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Insert logo
                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setName('Logo');
                $drawing->setDescription('Company Logo');
                $drawing->setPath(public_path('images/meemgoldlogo.png')); // path to your logo
                $drawing->setHeight(50);
                $drawing->setCoordinates('D2');
                $drawing->setWorksheet($sheet);


                // Conditional row colors
                $highestRow = $sheet->getHighestRow();
                for ($row = 7; $row <= $highestRow; $row++) { // data starts at B7
                    $quantity = $sheet->getCell('F'.$row)->getValue(); // Quantity in column D
                    $minQty = $sheet->getCell('G'.$row)->getValue();  // Min Quantity in column E

                    if ($quantity == 0 && $quantity < $minQty) {
                        $sheet->getStyle("D{$row}:I{$row}")->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()->setARGB('FFFFC7CE'); // light red
                    } elseif ($quantity < $minQty) {
                        $sheet->getStyle("D{$row}:I{$row}")->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()->setARGB('FFFFF2CC'); // light yellow
                    }
                }
            }
        ];
    }
}
