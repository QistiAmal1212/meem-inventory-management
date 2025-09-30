<table>
    <thead>
             <tr><td colspan="6"></td></tr> <!-- row 1 -->
            <tr><td colspan="6"></td></tr> <!-- row 2 -->
            <tr><td colspan="6"></td></tr> <!-- row 3 -->
            <tr><td colspan="6"></td></tr> <!-- row 4 -->
            <tr><td colspan="6"></td></tr> <!-- row 5 -->
        <tr style="background-color: #FFEB99; font-weight: bold;">
            <th style="padding: 8px;"></th><th style="padding: 8px;"></th><th style="padding: 8px;"></th>
            <th style="padding: 8px; border: 1px solid #ccc;">Product Name</th>
            <th style="padding: 8px; border: 1px solid #ccc;">SKU</th>
            <th style="padding: 8px; border: 1px solid #ccc;">Quantity</th>
            <th style="padding: 8px; border: 1px solid #ccc;">Min Quantity</th>
            <th style="padding: 8px; border: 1px solid #ccc;">Status</th>
            <th style="padding: 8px; border: 1px solid #ccc;">Last Updated</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td style="padding: 6px;"></td>  <td style="padding: 6px;"></td>  <td style="padding: 6px;"></td>
            <td style="padding: 6px; border: 1px solid #ccc;">{{ $product->name }}</td>
            <td style="padding: 6px; border: 1px solid #ccc;">{{ $product->sku }}</td>
            <td style="padding: 6px; border: 1px solid #ccc;">{{ $product->ProductStock?->quantity ?? 0 }}</td>
            <td style="padding: 6px; border: 1px solid #ccc;">{{ $product->ProductStock?->min_quantity ?? 0 }}</td>
            <td style="padding: 6px; border: 1px solid #ccc;">
                {{ $product->ProductStock?->quantity === 0 
                    ? 'Out of Stock' 
                    : ($product->ProductStock?->quantity < $product->ProductStock?->min_quantity 
                        ? 'Low Stock' 
                        : 'In Stock') }}
            </td>
            <td style="padding: 6px; border: 1px solid #ccc;">{{ $product->ProductStock?->updated_at?->format('d/m/Y H:i') ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
