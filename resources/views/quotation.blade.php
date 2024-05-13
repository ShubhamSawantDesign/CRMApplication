<h1>Quotation</h1>
<p>Customer Name: {{ $customer_name }}</p>
<table>
    <tr>
        <th>Description</th>
        <th>Price</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{ $item['description'] }}</td>
        <td>{{ $item['price'] }}</td>
    </tr>
    @endforeach
    <tr>
        <td>Total</td>
        <td>{{ $total }}</td>
    </tr>
</table>
