<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ __('transactions.invoice') }} #TXN-2024-{{ str_pad($transaction->id, 3, '0', STR_PAD_LEFT) }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; }
        .info { margin-bottom: 20px; }
        .info p { margin: 5px 0; }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; }
        .total { text-align: right; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>{{ __('transactions.invoice') }}</h1>
        <p>#TXN-2024-{{ str_pad($transaction->id, 3, '0', STR_PAD_LEFT) }}</p>
    </div>

    <div class="info">
        <h3>{{ __('transactions.general_info') }}</h3>
        <p><strong>{{ __('transactions.date') }}:</strong> {{ $transaction->created_at->format('d/m/Y') }}</p>
        <p><strong>{{ __('transactions.buyer') }}:</strong> {{ $transaction->buyer->name }}</p>
        <p><strong>{{ __('transactions.seller') }}:</strong> {{ $transaction->seller->name }}</p>
        <p><strong>{{ __('transactions.status') }}:</strong> {{ __('transactions.' . $transaction->status) }}</p>
    </div>

    <div class="info">
        <h3>{{ __('transactions.product_details') }}</h3>
        <table class="table">
            <thead>
            <tr>
                <th>{{ __('transactions.product') }}</th>
                <th>{{ __('transactions.quantity') }}</th>
                <th>{{ __('transactions.unit_price') }}</th>
                <th>{{ __('transactions.total') }}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $transaction->offer->title }}</td>
                <td>{{ $transaction->quantity }} {{ $transaction->offer->unit }}</td>
                <td>{{ $transaction->unit_price }}€/{{ $transaction->offer->unit }}</td>
                <td>{{ $transaction->amount }}€</td>
            </tr>
            </tbody>
        </table>
        <p class="total">{{ __('transactions.total') }}: {{ $transaction->amount }}€</p>
    </div>
</div>
</body>
</html>
