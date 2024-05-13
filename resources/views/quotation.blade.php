
<table>
    <tr>
        <th>Customer Name</th>
        <th>Testing</th>
        <th><img src="{{ url('img/images.png') }}" alt="Logo" style="width:100px;"></th>
    </tr>
</table>
<h1>Quotation</h1>
<p>Customer Name: {{ $invoice_Details->customer_name }}</p>
<table>
    <tr>
        <th>Description</th>
        <th>Price</th>
    </tr>
    <tr>
        <td>Total</td>
        <td>15000</td>
    </tr>
</table>
