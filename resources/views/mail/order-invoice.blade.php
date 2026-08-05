<x-mail::message>
# Solara order invoice

Hello {{ $order['customer_name'] }},

Thank you for your order. Your order number is **{{ $order['number'] }}**.

<x-mail::table>
| Product | Quantity | Amount |
| :------ | :------: | -----: |
@foreach ($order['items'] as $item)
| {{ $item['name'] }} | {{ $item['quantity'] }} | ${{ number_format($item['line_total'], 0) }} |
@endforeach
</x-mail::table>

**Payment method:** {{ $order['payment_method'] }}

<x-mail::panel>
Subtotal: **${{ number_format($order['totals']['subtotal'], 0) }}**  
Membership discount: **-${{ number_format($order['totals']['discount'], 0) }}**  
Shipping: **${{ number_format($order['totals']['shipping'], 0) }}**  
Tax (3.5%): **${{ number_format($order['totals']['tax'], 0) }}**  
**Total: ${{ number_format($order['totals']['total'], 0) }}**
</x-mail::panel>

We’ll follow up with delivery and availability details.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
