{{-- resources/views/emails/orders/paid.blade.php --}}

<x-mail::message>
<table width="100%" cellpadding="0" cellspacing="0" style="font-family: Arial, sans-serif;">
    <tr>
        <td>
            <h2 style="color:#212529;">Halo, {{ $order->user->name }}</h2>

            <p style="color:#555;">
                Terima kasih! Pembayaran untuk pesanan
                <strong>#{{ $order->order_number }}</strong> telah kami terima.
                Kami sedang memproses pesanan Anda.
            </p>

            <!-- TABLE -->
            <table width="100%" cellpadding="8" cellspacing="0"
                style="border-collapse: collapse; margin-top:15px;">
                <thead style="background:#f8f9fa;">
                    <tr>
                        <th align="left" style="border:1px solid #dee2e6;">Produk</th>
                        <th align="center" style="border:1px solid #dee2e6;">Qty</th>
                        <th align="right" style="border:1px solid #dee2e6;">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td style="border:1px solid #dee2e6;">
                            {{ $item->product_name }}
                        </td>
                        <td align="center" style="border:1px solid #dee2e6;">
                            {{ $item->quantity }}
                        </td>
                        <td align="right" style="border:1px solid #dee2e6;">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </td>
                    </tr>
                    @endforeach
                    <tr style="background:#f1f3f5;">
                        <td colspan="2" style="border:1px solid #dee2e6;">
                            <strong>Total</strong>
                        </td>
                        <td align="right" style="border:1px solid #dee2e6;">
                            <strong>
                                Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                            </strong>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- BUTTON -->
            <p style="text-align:center; margin:25px 0;">
                <a href="{{ route('orders.show', $order) }}"
                    style="
                        background:#0d6efd;
                        color:#fff;
                        padding:12px 20px;
                        text-decoration:none;
                        border-radius:6px;
                        display:inline-block;
                        font-weight:bold;
                    ">
                    Lihat Detail Pesanan
                </a>
            </p>

            <p style="color:#555;">
                Jika ada pertanyaan, silakan balas email ini.
            </p>

            <p>
                Salam,<br>
                <strong>{{ config('app.name') }}</strong>
            </p>
        </td>
    </tr>
</table>
</x-mail::message>
