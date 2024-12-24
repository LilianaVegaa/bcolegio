<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Reporte</title>
    
  <style>
    .invoice-box {
      max-width: 100%;
      margin: auto;
      padding: 25px;
      font-size: 16px;
      line-height: 24px;
      font-family: 'Ubuntu', sans-serif;
      color: #555;
    }

    #light-table {
      width: 100%;  
      padding-top: 0;
      padding-bottom: 0;
      text-align: left;
    }

    .leftdiv {
      float: left;
      position: relative;
      width: 33%; 
    }

    .rightdiv {
      float: right;
      width: 300px; 
    }

    .leftdiv p {
      display: block;
      width: 75%;
      margin: 0 auto !important;
    }

    #leftdivcontainer {
      vertical-align: middle;
      width: 100%;
      text-align: center;
    }

    .clearfix:after {
      clear: both;
    }

    .clearfix:before,
    .clearfix:after {
      content: " ";
      display: table;
    }

    .test span {
      display: block;
      white-space: pre;
      font-size:   10pt;
      line-height: 12pt;
    }

    #invoice-table {
      border: 2px solid #707070;
      border-top: 0;
      border-radius: 7px;
      border-spacing: 0;
      box-sizing: border-box;
      clear: both;
      width: 100%;
    }
  
    #invoice-table th, td { border-left: 2px solid #707070; }
    #invoice-table th:first-child, td:first-child { border-left: none; }
    #invoice-table th { border-bottom: 2px solid #707070; }
    #invoice-table td { vertical-align: top; font-size: 8pt; }
    th { text-align: center; font-weight: normal; }
    .amount { text-align: center; }
    .invoice_line { height: 6mm; }
    .invoice_line td, .invoice_line th { padding: 1mm; }

    .watermark {
      background: url("{{ asset('/img/logo.jpg') }}");
      background-size: 300px;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed; 
      opacity: 0.25;
    }

    .wrap {
      margin-top: 30px;
      text-align: center;
      width: auto;
    }

    .left, .right {
      display: inline-block;
      margin: 40px;
      margin-bottom: 0;
      border-top: 1px solid #000; 
      text-align: center;
      font-weight: bold;
      width: 300px;
    }
  </style>
</head>
<body>
  <div class="invoice-box">
  <div id="light-table">
      <div id="leftdivcontainer" class="clearfix">
        <div style="float: left; position: relative;">
          <img src="{{url('/img/logo.png')}}" style="width:230px; height: 50px;">
        </div>
        <div class="rightdiv" style="padding: 5px;">
          <div style="width: 300px; text-align: left;">
            <b>Sucursal:</b> Santa Cruz de la sierra
          </div>
          <div style="width: 300px; text-align: left;">
            <b>Desde:</b> 01/02/2021 hasta 30/02/2022
          </div>
          <div style="width: 300px; text-align: left;">
            <b>Proyecto:</b> Campaña de lona
          </div>
        </div>
      </div>
    </div>
    <div style="width: 620px; margin: 10px auto; margin-bottom: 1; text-align: center;">
      <span style="font-size: 30px; font-weight: bold;"><u>LIBRO DIARIO</u></span>
    </div>
    <div style="margin: 7px; page-break-inside: avoid;">
      <div id="light-table" style="color: #000000;">
        <div style="border: 2px solid #707070; border-radius: 7px; color: #555;">
          <div style="margin: 5px">
            <div style="display: inline-block; padding: 2px 0 2px 5px;"><b>TIPO :</b> INGRESO</div>
            <div style="display: inline-block; float: right; padding: 2px 5px 2px 0; width:200px;"><b>FECHA :</b> 01/02/2022</div>
          </div>
          <div style="margin: 5px">
            <div style="display: inline-block; padding: 2px 0 2px 5px;"><b>NRO. DOC. :</b> 1</div>
            <div style="display: inline-block; float: right; padding: 2px 5px 2px 0; width:200px;"><b>T.C. :</b> 6.96</div>
          </div>
          <div style="margin: 5px">
            <div style="display: inline-block; padding: 2px 0 2px 5px;"><b>TÍTULO :</b> factura numero 2</div>
            <div style="display: inline-block; float: right; padding: 2px 5px 2px 0; width:200px;"><b>CHEQUE N° :</b> 8556842</div>
          </div>
          <div style="margin: 5px">
            <div style="display: inline-block; padding: 2px 0 2px 5px;"><b>GLOSA :</b> Por paguos de aguinaldos correspondientes al mes de diciembre del año 2022 y mas detalles para ver que sucede</div>
          </div>
        </div>
      </div>
      <div id="light-table">
        <table id="invoice-table">
          <tr class="invoice_line" style="background-color: #E8E8E8;">
            <th style="color: #707070; padding:10px; width: 90px; font-weight: bold; font-size: 15px;">CUENTA</th>
            <th style="color: #707070; padding:10px; width: 170px; font-weight: bold; font-size: 15px;">NOMBRE DE CUENTA</th>
            <th style="color: #707070; padding:10px; width: 200px; font-weight: bold; font-size: 15px;">REFERENCIA</th>
            <th style="color: #707070; padding:10px; width: 70px; font-weight: bold; font-size: 15px;">DEBE (BS)</th>
            <th style="color: #707070; padding:10px; width: 70px; font-weight: bold; font-size: 15px;">HABER (BS)</th>
          </tr>
          <tr class="invoice_line" style="text-align: center;">
            <td style="color: #000000; font-size: 15px;">
              100100100100012
            </td>
            <td style="color: #000000; text-align: justify; font-size: 12px;">
              CUENTA MONEDA NACIONAL EN BANCO GANADERO SC
            </td>
            <td style="color: #000000; text-align: justify; font-size: 15px;">
              Por pagos de aguinaldo correspondiente al mes de diciembre del año 2022
            </td>
            <td style="color: #000000; font-size: 15px;">
              10,000,000.00
            </td>
            <td style="color: #000000; font-size: 15px;">
              10,000,000.00
            </td>
          </tr>
          <tr class="invoice_line" style="text-align: center;">
            <td style="color: #000000; font-size: 15px;">
              100100100100012
            </td>
            <td style="color: #000000; text-align: justify; font-size: 12px;">
              CUENTA MONEDA NACIONAL EN BANCO GANADERO SC
            </td>
            <td style="color: #000000; text-align: justify; font-size: 15px;">
              Por pagos de aguinaldo correspondiente al mes de diciembre del año 2022
            </td>
            <td style="color: #000000; font-size: 15px;">
              10,000,000.00
            </td>
            <td style="color: #000000; font-size: 15px;">
              10,000,000.00
            </td>
          </tr>
          <tr class="invoice_line" style="text-align: center;">
            <td style="color: #000000; font-size: 15px;">
              100100100100012
            </td>
            <td style="color: #000000; text-align: justify; font-size: 12px;">
              CUENTA MONEDA NACIONAL EN BANCO GANADERO SC
            </td>
            <td style="color: #000000; text-align: justify; font-size: 15px;">
              Por pagos de aguinaldo correspondiente al mes de diciembre del año 2022
            </td>
            <td style="color: #000000; font-size: 15px;">
              10,000,000.00
            </td>
            <td style="color: #000000; font-size: 15px;">
              10,000,000.00
            </td>
          </tr>
          <tr class="invoice_line">
            <td colspan="3" style="text-align: right; border-top: 2px solid #707070; color: #474747; font-size: 20px; font-weight: bold; padding:16px;">TOTAL Bs.</td>
            <td style="text-align: center; border-top: 2px solid #707070; font-size: 16px; color: #000000; font-weight: bold; padding:16px; background: #F0F0F0;">4,870.00</td>
            <td style="text-align: center; border-top: 2px solid #707070; font-size: 16px; color: #000000; font-weight: bold; padding:16px; background: #F0F0F0;">4,870.00</td>
          </tr>
        </table>
      </div>
    </div>
    <div style="margin: 7px; page-break-inside: avoid;">
      <div id="light-table" style="color: #000000;">
        <div style="border: 2px solid #707070; border-radius: 7px; color: #555;">
          <div style="margin: 5px">
            <div style="display: inline-block; padding: 2px 0 2px 5px;">TIPO : INGRESO</div>
            <div style="display: inline-block; float: right; padding: 2px 5px 2px 0; width:200px;">FECHA : 01/02/2022</div>
          </div>
          <div style="margin: 5px">
            <div style="display: inline-block; padding: 2px 0 2px 5px;">NRO. DOC. : 1</div>
            <div style="display: inline-block; float: right; padding: 2px 5px 2px 0; width:200px;">T.C. : 6.96</div>
          </div>
          <div style="margin: 5px">
            <div style="display: inline-block; padding: 2px 0 2px 5px;">TÍTULO : factura numero 2</div>
            <div style="display: inline-block; float: right; padding: 2px 5px 2px 0; width:200px;">CHEQUE N° : 855684234168748</div>
          </div>
          <div style="margin: 5px">
            <div style="display: inline-block; padding: 2px 0 2px 5px;">GLOSA : por venta de servicios</div>
          </div>
        </div>
      </div>
      <div id="light-table">
        <table id="invoice-table">
          <tr class="invoice_line" style="background-color: #E8E8E8;">
            <th style="color: #707070; padding:10px; width: 90px; font-weight: bold; font-size: 15px;">CUENTA</th>
            <th style="color: #707070; padding:10px; width: 170px; font-weight: bold; font-size: 15px;">NOMBRE DE CUENTA</th>
            <th style="color: #707070; padding:10px; width: 200px; font-weight: bold; font-size: 15px;">REFERENCIA</th>
            <th style="color: #707070; padding:10px; width: 70px; font-weight: bold; font-size: 15px;">DEBE (BS)</th>
            <th style="color: #707070; padding:10px; width: 70px; font-weight: bold; font-size: 15px;">HABER (BS)</th>
          </tr>
          <tr class="invoice_line" style="text-align: center;">
            <td style="color: #000000; font-size: 15px;">
              100100100100012
            </td>
            <td style="color: #000000; text-align: justify; font-size: 12px;">
              CUENTA MONEDA NACIONAL EN BANCO GANADERO SC
            </td>
            <td style="color: #000000; text-align: justify; font-size: 15px;">
              Por pagos de aguinaldo correspondiente al mes de diciembre del año 2022
            </td>
            <td style="color: #000000; font-size: 15px;">
              10,000,000.00
            </td>
            <td style="color: #000000; font-size: 15px;">
              10,000,000.00
            </td>
          </tr>
          <tr class="invoice_line" style="text-align: center;">
            <td style="color: #000000; font-size: 15px;">
              100100100100012
            </td>
            <td style="color: #000000; text-align: justify; font-size: 12px;">
              CUENTA MONEDA NACIONAL EN BANCO GANADERO SC
            </td>
            <td style="color: #000000; text-align: justify; font-size: 15px;">
              Por pagos de aguinaldo correspondiente al mes de diciembre del año 2022
            </td>
            <td style="color: #000000; font-size: 15px;">
              10,000,000.00
            </td>
            <td style="color: #000000; font-size: 15px;">
              10,000,000.00
            </td>
          </tr>
          <tr class="invoice_line" style="text-align: center;">
            <td style="color: #000000; font-size: 15px;">
              100100100100012
            </td>
            <td style="color: #000000; text-align: justify; font-size: 12px;">
              CUENTA MONEDA NACIONAL EN BANCO GANADERO SC
            </td>
            <td style="color: #000000; text-align: justify; font-size: 15px;">
              Por pagos de aguinaldo correspondiente al mes de diciembre del año 2022
            </td>
            <td style="color: #000000; font-size: 15px;">
              10,000,000.00
            </td>
            <td style="color: #000000; font-size: 15px;">
              10,000,000.00
            </td>
          </tr>
          <tr class="invoice_line">
            <td colspan="3" style="text-align: right; border-top: 2px solid #707070; color: #474747; font-size: 20px; font-weight: bold; padding:16px;">TOTAL Bs.</td>
            <td style="text-align: center; border-top: 2px solid #707070; font-size: 16px; color: #000000; font-weight: bold; padding:16px; background: #F0F0F0;">4,870.00</td>
            <td style="text-align: center; border-top: 2px solid #707070; font-size: 16px; color: #000000; font-weight: bold; padding:16px; background: #F0F0F0;">4,870.00</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</body>