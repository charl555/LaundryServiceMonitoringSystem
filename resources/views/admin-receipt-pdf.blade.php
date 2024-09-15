<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .receipt-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }
        h2 {
            color: #4CAF50;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        h3 {
            color: #333;
            margin-bottom: 20px;
        }
        p {
            margin: 10px 0;
            line-height: 1.6;
        }
        .separator {
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
        .strong {
            font-weight: bold;
        }
        .thank-you {
            text-align: center;
            margin-top: 30px;
            font-size: 1.1em;
            color: #4CAF50;
        }
    </style>

    <h2>Wash n Dry </h2>
    <h3>Receipt Details</h3>
    <p>----------------------------------------------------</p>
    <p><strong>Receipt ID:</strong> {{ $receipt->id }}</p>
    <p><strong>User ID:</strong> {{ $receipt->user_id }}</p>
    <p><strong>Customer Name: </strong> {{ $user->name }}</p>
    <p>----------------------------------------------------</p>
    <p><strong>Service ID:</strong> {{ $receipt->ServiceID }}</p>
    <p><strong>Details:</strong>  {{ $service->ServiceDetails }}</p>
    <p><strong>Item Description:</strong> {{ $laundryItem->itemdescription }}</p>
    <p>----------------------------------------------------</p>
    <p><strong>Amount:</strong> {{ $receipt->Ammount }}</p>
    <p>----------------------------------------------------</p>
    <p><strong>Date Issued:</strong> {{ $receipt->created_at }}</p>
    <p>----------------------------------------------------</p>
    <p><strong>Return Policy</strong></p>
    <p><strong>Recleaning:</strong> Not satisfied? Return items within 7 days for a free recleaning.</p>
    <p><strong>Damages:</strong> Report any damages within 48 hours for evaluation and compensation.</p>
    <p><strong>Lost Items:</strong> Compensation up to 100 pesos per item for lost items.</p>
    <p><strong>Stain Removal:</strong> Some stains may not be fully removable; no liability for remaining stains.</p>
    <p><strong>Claim Period:</strong> Report any issues within 48 hours of pickup.</p>
    <p>----------------------------------------------------</p>
    <p>Thank you for choosing our services!</p>
</body>
</html>
