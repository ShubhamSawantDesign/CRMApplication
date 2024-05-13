<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Price Quotation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .quotation-container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }
    h1 {
      text-align: center;
    }
    .quotation-details {
      margin-bottom: 20px;
    }
    .quotation-details p {
      margin: 5px 0;
    }
    .header-details {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    .total {
      text-align: right;
    }
  </style>
</head>
<body>
  <div class="quotation-container">
    <div class="header-details">
      <div>
        <p><strong>Estimation ID:</strong> {{ $invoice_Details->estimate_id }}</p>
      </div>
      <div>
        <p><strong>Reference ID:</strong> {{ $invoice_Details->reference_id }}</p>
      </div>
    </div>
    <h1>Price Quotation</h1>
    <div class="quotation-details">
      <p><strong>Client:</strong> {{ $invoice_Details->customer_name }}</p>
      <p><strong>Address:</strong> {{ $invoice_Details->address }} </p>
      <p><strong>Subject:</strong> {{ $invoice_Details->subject }} </p>
      <p><strong>Date:</strong> {{ $invoice_Details->estimateDate }}</p>
    </div>
    <table>
      <thead>
        <tr>
          <th>Sr. No.</th>
          <th>Item Name</th>
          <th>Quantity</th>
          <th>Unit Price</th>
          <th>Total Cost</th>
        </tr>
      </thead>
      <tbody>
        <!-- Populate with your items dynamically -->
        @php
        $cn=1;
        @endphp
       @foreach($invoice_items as $item)
        <tr>
          <td>{{ $cn++; }}</td>
          <td>{{ $item->item }}</td>
          <td>{{ $item->quantity }}</td>
          <td>{{ $item->cost }}.00</td>
          <td>{{ $item->total_Cost }}.00</td>
        </tr>
        @endforeach
        <!-- End of dynamic items -->
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4">Subtotal</td>
          <td>{{ $invoice_Details->total_amount }}</td>
        </tr>
        <tr>
          <td colspan="4">CGST (9%)</td>
          <td>{{ $invoice_Details->cgst }}.00</td>
        </tr>
        <tr>
          <td colspan="4">IGST (18%)</td>
          <td>{{ $invoice_Details->sgst }}.00</td>
        </tr>
        <tr>
          <td colspan="4">Other Charges</td>
          <td>{{ $invoice_Details->other_cost }}.00</td>
        </tr>
        <tr class="total">
          <td colspan="4">Total</td>
          <td>{{ $invoice_Details->final_amount }}.00</td>
        </tr>
      </tfoot>
    </table>
    <p>{{ $invoice_Details->customer_note  }}.</p>
  </div>
</body>
</html>
