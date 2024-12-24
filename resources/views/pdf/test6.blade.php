<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Nota de Remision</title>
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

    .invoice-table {
      border: 2px solid #707070;
      border-radius: 7px;
      border-spacing: 0;
      box-sizing: border-box;
      clear: both;
      margin: 2mm 0mm;
      height: 200mm;
      width: 100%;
    }
  
    .invoice-table th, td { border-left: 2px solid #707070; }
    .invoice-table th:first-child, td:first-child { border-left: none;}
    .invoice-table th { border-bottom: 2px solid #707070; text-align: center; font-weight: normal;}
    .invoice-table td { vertical-align: top; font-size: 8pt; }
    .invoice_line { height: 6mm; }
    .invoice_line td, .invoice_line th { padding: 1mm; }

    .divSquare{
        width:48%; height:200px; border:1px solid black; float: left
    }

    .table-title {
      width: 100%;
      border-collapse:separate;
      border:solid black 2px;
      border-radius:6px;
    }

    .table-title td {
      border: 1px solid black;
    }
  </style>
</head>
<body>
  <div class="invoice-box ">
    <div id="light-table">
      <div id="leftdivcontainer" class="clearfix">
        <div style="float: left; position: relative;">
          <img src="{{url('/img/logo.png')}}" style="width:230px; height: 50px;">
        </div>
        <div class="rightdiv" style="padding: 5px;">
          <div style="display: inline-block; width: 45%;">
            <table class="table-title">
                <tr>
                    <td colspan="3">Fecha</td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>02</td>
                    <td>2022</td>
                </tr>
            </table>
          </div>
          <div style="display: inline-block; width: 45%;">
            <table class="table-title">
                <tr>
                    <td>T.C.</td>
                </tr>
                <tr>
                    <td>6.98</td>
                </tr>
            </table>
          </div>
          <div class="rightdiv">
            <div style="display: inline-block; width: 92%;">
              <table class="table-title">
                <tr>
                  <td><span style="font-size: 20px; font-weight: bold;">N° 10000215</span></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <span style="color: #2A2A2A; font-weight: bold; font-size: 18px;">NIT: 164692025</span>
    <div style="width: 620px; margin: 2px auto; margin-bottom: 1; text-align: center;">
      <span style="font-size: 30px; font-weight: bold;">COMPROBANTE DE INGRESO</span>
    </div>
    <div id="light-table" style="color: #000000;">
      <div style="border: 2px solid #707070; border-radius: 7px;">
        <div style="float: right; margin: 8px; width:200px; color: #555;"><b>Cheque N°: 123456789010</b></div>
        <div style="margin: 2px 2px 2px 10px; color: #555;"><strong>LUGAR Y FECHA :</strong> Santa Cruz de la Sierra, 29 de Diciembre de 2021</div>
        <div style="margin: 2px 2px 2px 10px; color: #555;"><strong>TÍTULO / RAZÓN SOCIAL :</strong> BATEBOL S.A.</div>
        <div style="margin: 2px 2px 2px 10px; color: #555;"><strong>POR CONCEPTO DE :</strong> Nuestro registro de ingreso F-45</div>
        <div style="margin: 2px 2px 2px 10px; color: #555;"><strong>PROYECTO :</strong> Alquiler de valla publicitarias</div>
      </div>
    </div>
    <div id="light-table" style="margin-top: 5px;">
      <table class="invoice-table">
        <tr class="invoice_line" style="background-color: #E8E8E8;">
          <th style="color: #707070; padding:10px; width: 100px; font-weight: bold; font-size: 17px;">CÓDIGO</th>
          <th style="color: #707070; padding:10px; width: 350px; font-weight: bold; font-size: 17px;">NOMBRE CUENTA - REF.</th>
          <th style="color: #707070; padding:10px; width: 85px; font-weight: bold; font-size: 17px;">DEBE Bs.</th>
          <th style="color: #707070; padding:10px; width: 95px; font-weight: bold; font-size: 17px;">HABER Bs.</th>
          <th style="color: #707070; padding:10px; width: 80px; font-weight: bold; font-size: 17px;">DEBE Us.</th>
          <th style="color: #707070; padding:10px; width: 90px; font-weight: bold; font-size: 17px;">HABER Us.</th>
        </tr>
        <tr class="invoice_line" style="text-align: center;">
          <td style="color: #000000; font-size: 15px;">
            <span style="font-weight: bold">1001001000101</span> 
            <div style="margin-top: 1.5rem; color: #9e0207">8864545484</div>
          </td>
          <td style="color: #000000; text-align: justify; font-size: 13px;">
            <span style="font-weight: bold"><u>CAJA MONEDA NACIONAL EN SANTA CRUZ BOLIVIA</u></span><br>
            <span><b>Ref:</b> F-417 Plaza Sucre de la localidad de Copacabana - Prov. Manco Kapac en la localidad de el alto bolivia 10x4 mts</span>
            <div style="color: #9e0207">ENTEL SA</div>
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
        </tr>
        <tr class="invoice_line" style="text-align: center;">
          <td style="color: #000000; font-size: 15px;">
            <span style="font-weight: bold">1001001000101</span> 
            <div style="margin-top: 1.5rem; color: #9e0207">8864545484</div>
          </td>
          <td style="color: #000000; text-align: justify; font-size: 13px;">
            <span style="font-weight: bold"><u>CAJA MONEDA NACIONAL EN SANTA CRUZ BOLIVIA</u></span><br>
            <span><b>Ref:</b> F-417 Plaza Sucre de la localidad de Copacabana - Prov. Manco Kapac en la localidad de el alto bolivia 10x4 mts</span>
            <div style="color: #9e0207">ENTEL SA</div>
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
        </tr>
        <tr class="invoice_line" style="text-align: center;">
          <td style="color: #000000; font-size: 15px;">
            <span style="font-weight: bold">1001001000101</span> 
            <div style="margin-top: 1.5rem; color: #9e0207">8864545484</div>
          </td>
          <td style="color: #000000; text-align: justify; font-size: 13px;">
            <span style="font-weight: bold"><u>CAJA MONEDA NACIONAL EN SANTA CRUZ BOLIVIA</u></span><br>
            <span><b>Ref:</b> F-417 Plaza Sucre de la localidad de Copacabana - Prov. Manco Kapac en la localidad de el alto bolivia 10x4 mts</span>
            <div style="color: #9e0207">ENTEL SA</div>
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
        </tr>
        <tr class="invoice_line" style="text-align: center;">
          <td style="color: #000000; font-size: 15px;">
            <span style="font-weight: bold">1001001000101</span> 
            <div style="margin-top: 1.5rem; color: #9e0207">8864545484</div>
          </td>
          <td style="color: #000000; text-align: justify; font-size: 13px;">
            <span style="font-weight: bold"><u>CAJA MONEDA NACIONAL EN SANTA CRUZ BOLIVIA</u></span><br>
            <span><b>Ref:</b> F-417 Plaza Sucre de la localidad de Copacabana - Prov. Manco Kapac en la localidad de el alto bolivia 10x4 mts</span>
            <div style="color: #9e0207">ENTEL SA</div>
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
        </tr>
        <tr class="invoice_line" style="text-align: center;">
          <td style="color: #000000; font-size: 15px;">
            <span style="font-weight: bold">1001001000101</span> 
            <div style="margin-top: 1.5rem; color: #9e0207">8864545484</div>
          </td>
          <td style="color: #000000; text-align: justify; font-size: 13px;">
            <span style="font-weight: bold"><u>CAJA MONEDA NACIONAL EN SANTA CRUZ BOLIVIA</u></span><br>
            <span><b>Ref:</b> F-417 Plaza Sucre de la localidad de Copacabana - Prov. Manco Kapac en la localidad de el alto bolivia 10x4 mts</span>
            <div style="color: #9e0207">ENTEL SA</div>
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
          <td style="color: #000000; font-size: 15px;">
              4,870.00
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td style="color: #000000; text-align: justify; font-size: 15px;">&nbsp;
          </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="invoice_line">
          <td colspan="2" style="text-align: right; border-top: 2px solid #707070; color: #474747; font-size: 20px; font-weight: bold; padding:16px;">TOTALES</td>
          <td style="text-align: center; border-top: 2px solid #707070; font-size: 16px; color: #000000; font-weight: bold; padding:16px; background: #F0F0F0;">4,870.00</td>
          <td style="text-align: center; border-top: 2px solid #707070; font-size: 16px; color: #000000; font-weight: bold; padding:16px; background: #F0F0F0;">4,870.00</td>
          <td style="text-align: center; border-top: 2px solid #707070; font-size: 16px; color: #000000; font-weight: bold; padding:16px; background: #F0F0F0;">4,870.00</td>
          <td style="text-align: center; border-top: 2px solid #707070; font-size: 16px; color: #000000; font-weight: bold; padding:16px; background: #F0F0F0;">4,870.00</td>
        </tr>
      </table>
    </div>
    <div id="light-table">
      <div style="border: 2px solid #707070; border-radius: 7px; color: black;">
        <div style="margin: 12px;"><b>Son:</b> 4,870.00 (cuatro mil ochocientos setenta 00/100 Bolivianos)</div>
      </div>
    </div>
    <div id="light-table" style="margin-top: 5px; page-break-before: avoid;">
      <div style="border: 2px solid #707070; border-radius: 7px; color: black; height: 100px; padding: 7px;">
        <div style="display: inline-block; margin: 0 10px 0 0; border: 1px solid #707070; color: black; height: 60px; width: 49%"></div>
        <div style="display: inline-block; border: 1px solid #707070; color: black; height: 60px; width: 49%"></div>
        <div style="display: inline-block; margin: 0 10px 0 0;border: 1px solid #707070; color: black; height: 30px; width: 49%">
          <span style="display: table; margin: 0 auto; font-weight: bold;">CONTADOR</span>
        </div>
        <div style="display: inline-block; border: 1px solid #707070; color: black; height: 30px; width: 49%">
          <span style="display: table; margin: 0 auto; font-weight: bold;">GERENTE</span>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
