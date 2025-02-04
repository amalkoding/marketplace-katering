@extends('app.main')

@section('title', 'Invoice Order Customer')
@section('description', 'Cetak invoice order customer.')

@section('content')
<div class="card border-0 shadow-sm mt-5">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h5 class="card-title">Invoice Order Customer</h5>
        <a href="{{ route('order-customer.index') }}" class="btn btn-danger">Kembali</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="invoice-table">
            <tbody>
                <tr>
                    <th>Nama Customer</th>
                    <td>{{ $orderCustomer->user->name }}</td>
                </tr>
                <tr>
                    <th>Email Customer</th>
                    <td>{{ $orderCustomer->user->email }}</td>
                </tr>
                <tr>
                    <th>Nama Menu</th>
                    <td>{{ $orderCustomer->menu->name }}</td>
                </tr>
                <tr>
                    <th>Harga Menu</th>
                    <td>Rp {{ number_format($orderCustomer->menu->price, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah Porsi</th>
                    <td>{{ $orderCustomer->jumlah_porsi }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pengiriman</th>
                    <td>{{ \Carbon\Carbon::parse($orderCustomer->tanggal_pengiriman)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>Rp {{ number_format($orderCustomer->menu->price * $orderCustomer->jumlah_porsi, 2, ',', '.') }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mt-4 text-end">
            <button class="btn btn-dark" onclick="printInvoice()">Cetak Invoice</button>
        </div>
    </div>
</div>

<script>
    function printInvoice() {
        var content = document.getElementById('invoice-table').outerHTML;
        
        var printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Invoice Order</title>');
        printWindow.document.write('<style>table { width: 100%; border-collapse: collapse; } th, td { padding: 8px 12px; border: 1px solid #ddd; text-align: left; }</style></head>');
        printWindow.document.write('<body>');
        printWindow.document.write(content);
        printWindow.document.write('</body></html>');
        
        printWindow.document.close();
        printWindow.print();
        printWindow.close();
    }
</script>
@endsection