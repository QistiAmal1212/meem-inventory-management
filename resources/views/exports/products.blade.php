<table>
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>