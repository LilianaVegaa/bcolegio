<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detalle Alquiler</title>
    
    <style>
    @media print {
      .new-page {
        page-break-before: always !important;
        
      }
    }

    .text-right {
        text-align: right;
    }

    .container-box {
        max-width: 100%;
        /* margin: auto; */
        padding: 20px 20px 20px 20px;
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', sans-serif;
        color: #555;
    }
    
    .car-data table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .car-data table td {
        padding: 5px;
    }
    
    .car-data table tr.top table td {
        padding-bottom: 20px;
    }
    
    .car-data table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
        padding: 0px;
    }
    
    .car-data table tr.information table td {
        padding-bottom: 10px;
    }
    
    .car-items table {
        border: 3px #434343 solid;
        border-spacing: 7px;
        width: 100%;
    }

    .car-items table thead tr th {
        padding-left: 5px;
        text-align: left;
        color: #fff;
        background-color: #D42A2A
    }

    .car-items table tbody tr:nth-child(odd) {
        background-color: #e8e8e8;
    }

    .number {
        float:left;
        border: 2px solid #434343;
        background: #ffe4e4;
        padding: 5px;
        height: auto;
        width:180px;
    }

    .date {
        float:right;
        border: 2px solid #434343;
        background: #ffe4e4;
        padding: 5px;
        height: auto;
        width:180px;
    }

    .thumbnail {
        margin-left: auto;
        margin-right: auto;
        width: 800px; 
        height: 380px;
    }

    .column {
        width: 800px;
        display: block;
        vertical-align: text-top;
        margin-bottom: 15px;
    }
      
    .column:nth-child(odd) {
        height: 380px;  
    }

    .column:nth-child(even) {
        height: 380px;
    }

    .column img {
        margin-left: auto;
        margin-right: auto;
        display: block;
        max-width: 800px;
        max-height: 380px;
    }

    .footer {
        background-color: #e8e8e8;
        color: black; 
        text-align: center;
        font-size: 12px;
    }
    </style>
</head>

<body>
  @foreach($rentals as $rental)
    <div class="new-page">
        <div class="container-box">
            <div class="car-data">
                <table cellpadding="0" cellspacing="0">
                    <tr class="top">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td class="title">
                                        <img src="{{url('/img/logo.png')}}" style="width:300px;">
                                    </td>
                                    <td class="text-right">
                                        <strong>Publicidad Vial Imagen S.R.L</strong> <br>
                                        La Paz: Calle Nicolas Acosta Esq. Pedro Blanco N° 1471 <br>
                                        Santa Cruz: Barrio 2 de Agosto Calle 6 <br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <tr class="information">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <div class="number">
                                        <strong>N° De Reserva:</strong> <br>
                                        {{ $rental['id'] }}
                                    </div>
                                    <div class="date">
                                        <strong>Fecha emisión:</strong> <br>
                                        {{ date("d/m/Y") }}
                                    </div>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <div class="car-items">
                <table>
                    <thead>
                        <tr>
                            <th colspan="3">DATOS GENERALES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3"><strong>Fecha de Inicio: </strong>{{ $rental['date_start'] }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Fecha Fin: </strong>{{ $rental['date_end'] }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Cliente: </strong>{{ strtoupper($rental['client_name']) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Código del espacio: </strong>{{ $rental['billboard_code'] }} &nbsp; <strong>Ciudad: </strong>asdasd</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Ubicación: </strong>{{ $rental['billboard_location'] }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Impresión: </strong>{{ $rental['print'] }} &nbsp;&nbsp;&nbsp; <strong>Iluminación: </strong>{{ $rental['illumination'] }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Monto total impresión: </strong>{{ number_format($rental['pritings'], 2, '.', ',') }} Bs.</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Condición del alquiler: </strong>{{ $rental['condition'] }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Imp.Mensual: </strong>{{ $rental['amount_monthly'] }} Bs. &nbsp;&nbsp; <strong>Imp.Total: </strong>{{ $rental['amount_total'] }} Bs.</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Monto total: </strong>{{ number_format($rental['total'], 2, '.', ',') }} Bs.</td>
                        </tr>
                    </tbody>
            </table>
            </div>
            <br>
            <div class="car-items">
                <table>
                    <thead>
                        <tr>
                            <th colspan="3">USUARIO ENCARGADO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3"><strong>Nombre: </strong>{{ strtoupper($rental['user']['name'])  }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Tipo de usuario: </strong>{{ strtoupper($rental['user']['profile']['description'])  }}</td>
                        </tr>
                    </tbody>
            </table>
            </div>
            <small>Fotografía del Espacio Alquilado ©.</small>
            <div class="thumbnail">
                <div class="column">
                    <img src="{{url('/img/billboards/'.$rental['billboard_img'])}}">
                </div>
            </div>
            <br>
            <br>
            <div class="footer">
                <span>Copyright © {{ date("Y") }} Imagen S.R.L Todos los derechos reservados.</span>
            </div>
        </div>
    </div>
  @endforeach
</body>
