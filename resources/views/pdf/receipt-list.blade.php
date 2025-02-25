<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Comprobantes</title>
    
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
        font-size: 16px;
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
        	<div style="border: 1px solid black; border-bottom: none; text-align: center; font-size: 30px; padding: 20px; font-weight: bold;">LISTA DE COMPROBANTES</div>
            <table>
                <thead class="text-center" style="font-weight: bold;">
                    <tr>
                        <td width="70px">NÚMERO</td>
                        <td width="70px">FECHA</td>
                        <td width="80px">TIPO</td>
                        <td width="130px">TÍTULO</td>
                        <td width="130px">GLOSA</td>
                        <td width="70px">DEBE</td>
                        <td width="70px">HABER</td>
                    </tr>
                </thead>
                <tbody>
	                @foreach($receipts as $receipt)   
	                    <tr style="page-break-inside: avoid;">
	                        <td class="text-content">{{ $receipt['number'] }}</td>
	                        <td class="text-content">{{ $receipt['date'] }}</td>
                            <td class="text-content">{{ $receipt['type'] }}</td>
	                        <td class="text-content">{{ $receipt['title'] }}</td>
	                        <td class="text-content">{{ $receipt['glosa'] }}</td>
	                        <td class="text-content">{{ $receipt['total_debe_bs'] }}</td>
                            <td class="text-content">{{ $receipt['total_haber_bs'] }}</td>
	                    </tr>
	                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>