<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Product Stock Report</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h1 { text-align: center; font-size: 18px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th { background-color: #FFEB99; font-weight: bold; padding: 8px; border: 1px solid #ccc; }
        td { padding: 6px; border: 1px solid #ccc; text-align: center; }
        .low-stock { background-color: #FFF1D9; }
        .out-stock { background-color: #FFC7CE; }
        .logo { width: 120px; margin-bottom: 10px; }
    </style>
</head>
<body>

    <!-- Logo -->
    <div style="text-align: center;">
        <img src="{{ env('APP_URL') . '/images/meemgoldlogo.png' }}" class="logo" alt="Company Logo">
    </div>

    <!-- Title -->
    <h1>Product Stock Report</h1>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>SKU</th>
                <th>Quantity</th>
                <th>Min Quantity</th>
                <th>Status</th>
                <th>Last Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                @php
                    $quantity = $product->ProductStock?->quantity ?? 0;
                    $minQty = $product->ProductStock?->min_quantity ?? 0;
                    $rowClass = ($quantity === 0 && $quantity < $minQty ) ? 'out-stock' : ($quantity < $minQty ? 'low-stock' : '');
                @endphp
                <tr class="{{ $rowClass }}">
                    <td style="text-align: left;">{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $quantity }}</td>
                    <td>{{ $minQty }}</td>
                    <td>
                        {{ $quantity === 0 ? 'Out of Stock' : ($quantity < $minQty ? 'Low Stock' : 'In Stock') }}
                    </td>
                    <td>{{ $product->ProductStock?->updated_at?->format('d/m/Y H:i') ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
