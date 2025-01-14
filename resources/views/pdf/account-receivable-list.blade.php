<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cuentas Por Cobrar</title>
    
    <style>
    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .text-content {
        text-align: center;
        font-weight: bold;
        font-size: 11pt;
    }

    .text-title {
        text-align: center;
        font-weight: bold;
        font-size: 12pt;
        color: #000;
    }
    
    .invoice-box {
        max-width: 100%;
        margin: auto;
        padding: 30px;
        border: 2px solid #000;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 14px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .car-items table {
        border-collapse: collapse;
        width: 100%;
    }

    .car-items table td, th {
        border: 1px solid #000;
        padding: 3px;
    }

    .car-items table thead tr {
        background: #ca0000;
        color: #fff;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <div class="car-items">
        	<div style="border: 1px solid black; border-bottom: none; text-align: center; font-size: 30px; padding: 20px; font-weight: bold;">LISTA DE CUENTAS POR COBRAR</div>
            <table>
                <thead class="text-center" style="font-weight: bold;">
                    <tr>
                        <td width="70px">CITE</td>
                        <td width="70px">FECHA</td>
                        <td width="60px">COMPROBANTE</td>
                        <td width="60px">NÚMERO</td>
                        <td width="60px">TOTAL</td>
                        <td width="70px">PAGADO</td>
                        <td width="60px">SALDO</td>
                        <td width="120px">CLIENTE</td>
                        <td width="120px">USUARIO</td>
                    </tr>
                </thead>
                <tbody>
	                @foreach($accounts as $account)   
	                    <tr style="page-break-inside: avoid;">
	                        <td class="text-content">{{ $account['cite'] }}</td>
	                        <td class="text-content">{{ $account['date'] }}</td>
	                        <td class="text-content">{{ $account['type'] }}</td>
	                        <td class="text-content">{{ $account['number'] }}</td>
	                        <td class="text-content">{{ $account['amount'] }}</td>
                            <td class="text-content">{{ $account['amount_paid'] }}</td>
                            <td class="text-content">{{ $account['balance'] }}</td>
                            <td class="text-content">{{ $account['customer'] }}</td>
                            <td class="text-content">{{ $account['user'] }}</td>
	                    </tr>
	                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>