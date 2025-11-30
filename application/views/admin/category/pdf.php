<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Invoice</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      background-color: #fff;
      color: #333;
      display: flex;
      flex-direction: column;
    }

    .invoice-container {
      margin: 5% 1%;
      padding: 10% 1%;
      flex: 1 0 auto;
      display: flex;
      flex-direction: column;
    }

    .invoice-body {
      flex: 1 0 auto;
    }

    .header {
      background-color: #ed3337;
      color: #fff;
      padding: 10px 20px;
      text-align: center;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
      margin-bottom: 20px;
    }

    .header .logo {
      font-size: 20px;
      font-weight: bold;
    }

    .header .slogan {
      font-size: 12px;
      font-style: italic;
      margin-top: 5px;
    }

    .invoice-details {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
      padding: 0 10px;
    }

    .invoice-details div {
      width: 45%;
    }

    .invoice-details p {
      margin: 5px 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th {
      background-color: #ed3337;
      color: #fff;
      padding: 10px;
      text-align: left;
    }

    td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }

    .total-section {
      text-align: right;
      padding: 10px;
      background-color: #f5f5f5;
    }

    .total-section p {
      margin: 5px 0;
    }

    .total-due {
      background-color: #ed3337;
      color: #fff;
      padding: 10px;
      font-weight: bold;
    }

    .payment-method,
    .terms {
      margin: 20px 0;
      padding: 10px;
      background-color: #f5f5f5;
    }

    .signature {
      text-align: right;
      margin-top: 20px;
    }

    .footer {
      background-color: #ed3337;
      color: #fff;
      text-align: center;
      padding: 10px;
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
      flex-shrink: 0;
    }

    .invoice-details-right {
      float: right !important;
    }

    .invoice-details-left {
      float: left !important;
    }
  </style>
</head>

<body>
  <div class="invoice-container">
    <div class="invoice-body">
      <div class="invoice-details">
        <div class="invoice-details-left">
          <p><strong>INVOICE #</strong> 001</p>
          <p><strong>INVOICE DATE</strong> : October 31, 2024</p>
          <p><strong>DUE DATE</strong> : November 15, 2024</p>
        </div>
        <div class="invoice-details-right">
          <p><strong>BILL TO</strong></p>
          <p>Warner & Spencer</p>
          <p>123 Anywhere St., Any City, ST 12345</p>
          <p>123-456-7890</p>
        </div>
      </div>

      <table>
        <thead>
          <tr>
            <th>NO</th>
            <th>DESCRIPTION</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>ITEM/SERVICE</td>
            <td>$1.00</td>
            <td>500</td>
            <td>$500.00</td>
          </tr>
          <tr>
            <td>2</td>
            <td>ITEM/SERVICE</td>
            <td>$0.80</td>
            <td>300</td>
            <td>$240.00</td>
          </tr>
        </tbody>
      </table>

      <div class="total-section">
        <p>SUB-TOTAL $740.00</p>
        <p>TAX (10%) $74.00</p>
        <p class="total-due">Total Due $814.00</p>
      </div>

      <div class="payment-method">
        <p><strong>PAYMENT METHOD</strong></p>
        <p>Bank : Salford & Co. Bank</p>
        <p>Account Name : Alfredo Torres</p>
        <p>Account Number : 123456789</p>
      </div>

      <div class="terms">
        <p><strong>TERM AND CONDITIONS</strong></p>
        <p>Please make the payment by the due date to the account below. We accept bank transfer, credit card, or check.</p>
      </div>
    </div>
  </div>
</body>

</html>