<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Compras</title>
    
    <style>
    .text-center {
        text-align: center;
    }

    .text-content {
        text-align: center;
        font-size: 10pt;
    }

    .text-totals {
        text-align: center;
        font-weight: bold;
        font-size: 12pt;
        background-color: #ffdddd;
    }

    .invoice-box {
        max-width: 100%;
        /* margin: auto;
        padding: 30px;
        border: 2px solid #000;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15); */
        font-size: 12px;
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
        background: #f2f4f8;
        color: #00000;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <div class="car-items">
        	<div style="border: 1px solid black; border-bottom: none;">
                <div style="text-align: center; font-size: 30px; padding: 20px; font-weight: bold;">LIBRO DE COMPRAS</div>
                <!-- <div style="font-size: 20px; padding: 10px; font-weight: bold;">GESTION - PERIODO:</div>
                <div style="margin: 3px; font-size: 20px; padding: 10px; font-weight: bold; border: 1px solid black;">
                    <div style="display: inline-block; width: 20%;">AÑO: 2022</div>
                    <div style="display: inline-block; width: 40%;">MES: ENERO</div>
                </div> -->
                <div style="margin: 3px; font-size: 20px; padding: 10px; font-weight: bold; border: 1px solid black;">
                    <div style="display: inline-block; width: 60%;">NOMBRE O RAZON SOCIAL : PUBLICIDAD VIAL IMAGEN S.R.L.</div>
                    <div style="display: inline-block; width: 30%;">NIT: 164692025</div>
                </div>
                <!-- <div style="margin: 3px; font-size: 20px; padding: 10px; font-weight: bold; border: 1px solid black;">
                    <div style="display: inline-block; width: 60%;">SUCURSAL: LA PAZ</div>
                </div> -->
            </div>
            <table>
                @php
                    $total = 0;
                    $totalNoCf = 0;
                    $totalSubTotal = 0;
                    $totalDiscounts = 0;
                    $totalBaseCf = 0;
                    $totalcf = 0;
                @endphp
                <thead class="text-center" style="font-weight: bold;">
                    <tr>
                        <td width="30px">Nº</td>
                        <td width="70px">FECHA</td>
                        <td width="80px">NIT</td>
                        <td width="150px">NOMBRE O RAZÓN SOCIAL</td>
                        <td width="80px">Nº DE LA FACTURA</td>
                        <td width="80px">Nº DE DUI</td>
                        <td width="100px">Nº DE AUTORIZACION</td>
                        <td width="100px">IMPORTE TOTAL</td>
                        <td width="100px">IMPORTE NO SUJETO A CREDITO FISCAL</td>
                        <td width="100px">SUBTOTAL</td>
                        <td width="100px">DESCUENTOS BONIFICACIONES Y REBAJAS</td>
                        <td width="100px">IMPORTE BASE PARA CREDITO FISCAL</td>
                        <td width="100px">CREDITO FISCAL</td>
                        <td width="100px">CODIGO DE CONTROL</td>
                        <td width="100px">TIPO DE COMPRA</td>
                    </tr>
                </thead>
                <tbody>
	                @foreach($purchases as $key => $purchase)   
                        @php
                            $total += $purchase['total'];
                            $totalNoCf += $purchase['no_cf'];
                            $totalSubTotal += $purchase['subtotal'];
                            $totalDiscounts += $purchase['discounts'];
                            $totalBaseCf += $purchase['base_cf'];
                            $totalcf += $purchase['cf'];
                        @endphp  
	                    <tr style="page-break-inside: avoid;">
                            <td class="text-content">{{ $key + 1 }}</td>
	                        <td class="text-content">{{ $purchase['date'] }}</td>
	                        <td class="text-content">{{ $purchase['nit'] }}</td>
	                        <td class="text-content">{{ $purchase['business_name'] }}</td>
	                        <td class="text-content">{{ $purchase['number'] }}</td>
                            <td class="text-content">{{ $purchase['dui'] }}</td>
                            <td class="text-content">{{ $purchase['authorization'] }}</td>
	                        <td class="text-content">{{ number_format($purchase['total'], 2, '.', ',') }}</td>
	                        <td class="text-content">{{ number_format($purchase['no_cf'], 2, '.', ',') }}</td>
	                        <td class="text-content">{{ number_format($purchase['subtotal'], 2, '.', ',') }}</td>
                            <td class="text-content">{{ number_format($purchase['discounts'], 2, '.', ',') }}</td>
                            <td class="text-content">{{ number_format($purchase['base_cf'], 2, '.', ',') }}</td>
	                        <td class="text-content">{{ number_format($purchase['cf'], 2, '.', ',') }}</td>
	                        <td class="text-content">{{ $purchase['control_code'] }}</td>
	                        <td class="text-content">{{ $purchase['type'] }}</td>
	                    </tr>
	                @endforeach
                        <tr>
                            <td colspan="5"></td>
                            <td class="text-totals" colspan="2">TOTALES (BS):</td>
                            <td class="text-totals">{{ number_format($total, 2, '.', ',') }}</td>
                            <td class="text-totals">{{ number_format($totalNoCf, 2, '.', ',') }}</td>
                            <td class="text-totals">{{ number_format($totalSubTotal, 2, '.', ',') }}</td>
                            <td class="text-totals">{{ number_format($totalDiscounts, 2, '.', ',') }}</td>
                            <td class="text-totals">{{ number_format($totalBaseCf, 2, '.', ',') }}</td>
                            <td class="text-totals">{{ number_format($totalcf, 2, '.', ',') }}</td>
                            <td colspan="2"></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>