<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detalle Alquiler</title>
    
    <style>
    .text-right {
        text-align: right;
    }

    .container-box {
        max-width: 100%;
        margin: auto;
        padding: 30px 30px 20px 30px;
        border: 2px solid #000;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
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
                                    100
                                </div>
                                <div class="date">
                                    <strong>Fecha emisión:</strong> <br>
                                    12/05/2021
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
                        <td colspan="3"><strong>Fecha de Inicio: </strong>asasd</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Fecha Fin: </strong>asdasd</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Cliente: </strong>asdasdasd</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Código del espacio: </strong>asdasd &nbsp; <strong>Ciudad: </strong>asdasd</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Ubicación: </strong>asdasdasd</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Impresión: </strong>sdasdasd &nbsp;&nbsp;&nbsp; <strong>Iluminación: </strong>asdasdas</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Monto total impresión: </strong>asdasdasd Bs.</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Condición del alquiler: </strong>asdsadas</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Imp.Mensual: </strong>asdasd Bs. &nbsp;&nbsp; <strong>Imp.Total: </strong>asdasd Bs.</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Monto total: </strong>asdasdas Bs.</td>
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
                        <td colspan="3"><strong>Nombre: </strong>asasd</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Tipo de usuario: </strong>asdasd</td>
                    </tr>
                </tbody>
           </table>
        </div>
        <small>Fotografía del Espacio Alquilado ©.</small>
        <div class="thumbnail">
            <div class="column">
                <img src="{{url('/img/162384809560c9f49f39467.jpeg')}}">
            </div>
        </div>
        <br>
        <div class="footer">
            <span>Copyright © 2021 Imagen S.R.L Todos los derechos reservados.</span>
        </div>
    </div>
</body>