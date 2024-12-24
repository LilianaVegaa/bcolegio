<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Nota de Remision</title>
  <style>
    .invoice-box {
      max-width: 100%;
      margin: auto;
      padding: 10px;
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
    .invoice_line td, .invoice_line th { padding: 0.6mm; }

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
                <td>{{ date('d', strtotime($data['receipt']['date'])) }}</td>
                <td>{{ date('m', strtotime($data['receipt']['date'])) }}</td>
                <td>{{ date('Y', strtotime($data['receipt']['date'])) }}</td>
              </tr>
            </table>
          </div>
          <div style="display: inline-block; width: 45%;">
            <table class="table-title">
              <tr>
                <td>T.C.</td>
              </tr>
              <tr>
                <td>{{ $data['receipt']['type_change'] }}</td>
              </tr>
            </table>
          </div>
          <div class="rightdiv">
            <div style="display: inline-block; width: 92%;">
              <table class="table-title">
                <tr>
                  <td><span style="font-size: 20px; font-weight: bold;">N° {{ $data['receipt']['number'] }}</span></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <span style="color: #2A2A2A; font-weight: bold; font-size: 18px;">NIT: 164692025</span>
    <div style="width: 620px; margin: 10px auto; margin-bottom: 1; text-align: center;">
      <span style="font-size: 30px; font-weight: bold;">COMPROBANTE DE {{ $data['receipt']['type'] }}</span>
    </div>
    <div id="light-table" style="color: #000000;">
      <div style="border: 2px solid #707070; border-radius: 7px;">
        @if ($data['receipt']['check']) 
          <div style="float: right; margin: 8px; width:200px; color: #555;"><b>Cheque N°: {{ $data['receipt']['check'] }}</b></div>
        @endif 
        <div style="margin: 2px 2px 2px 10px; color: #555;"><strong>LUGAR Y FECHA :</strong> {{ $data['receipt']['office'] }}, {{ $data['spanish_date'] }}</div>
        <div style="margin: 2px 2px 2px 10px; color: #555;"><strong>TÍTULO / RAZÓN SOCIAL :</strong> {{ $data['receipt']['title'] }}</div>
        <div style="margin: 2px 2px 2px 10px; color: #555;"><strong>POR CONCEPTO DE :</strong> {{ $data['receipt']['glosa'] }}</div>
        @if ($data['receipt']['project']) 
          <div style="margin: 2px 2px 2px 10px; color: #555;"><strong>PROYECTO :</strong> {{ $data['receipt']['project'] }}</div>
        @endif 
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
        @foreach($data['receipt']['plans'] as $key => $plan)  
          <tr class="invoice_line" style="text-align: center;">
            <td style="color: #000000; font-size: 15px;">
              <span style="font-weight: bold">{{ $plan['number'] }}</span>
              <div style="margin-top: 1.5rem; color: #9e0207">{{ $plan['attendee']['nit'] }}</div>
            </td>
            <td style="color: #000000; text-align: justify; font-size: 13px;">
              <span style="font-weight: bold"><u>{{ $plan['name'] }}</u></span><br>
              @if ($plan['reference'])
                <span><b>Ref:</b> {{ $plan['reference'] }}</span>
              @endif
              <div style="color: #9e0207">{{ $plan['attendee']['description'] }}</div>
            </td>
            <td style="color: #000000; font-size: 15px;">
              @if (!round($plan['debe_bs'], 0) == 0)
                {{ $plan['debe_bs'] }}
              @endif
            </td>
            <td style="color: #000000; font-size: 15px;">
              @if (!round($plan['haber_bs'], 0) == 0)
                {{ $plan['haber_bs'] }}
              @endif
            </td>
            <td style="color: #000000; font-size: 15px;">
              @if (!round($plan['debe_sus'], 0) == 0)
                {{ $plan['debe_sus'] }}
              @endif
            </td>
            <td style="color: #000000; font-size: 15px;">
              @if (!round($plan['haber_sus'], 0) == 0)
                {{ $plan['haber_sus'] }}
              @endif
            </td>
          </tr>
        @endforeach
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
          <td style="text-align: center; border-top: 2px solid #707070; font-size: 16px; color: #000000; font-weight: bold; padding:16px; background: #F0F0F0;">{{ $data['receipt']['total_debe_bs'] }}</td>
          <td style="text-align: center; border-top: 2px solid #707070; font-size: 16px; color: #000000; font-weight: bold; padding:16px; background: #F0F0F0;">{{ $data['receipt']['total_haber_bs'] }}</td>
          <td style="text-align: center; border-top: 2px solid #707070; font-size: 16px; color: #000000; font-weight: bold; padding:16px; background: #F0F0F0;">{{ $data['receipt']['total_debe_sus'] }}</td>
          <td style="text-align: center; border-top: 2px solid #707070; font-size: 16px; color: #000000; font-weight: bold; padding:16px; background: #F0F0F0;">{{ $data['receipt']['total_haber_sus'] }}</td>
        </tr>
      </table>
    </div>
    <div id="light-table">
      <div style="border: 2px solid #707070; border-radius: 7px; color: black;">
        <div style="margin: 12px;"><b>Son:</b> {{ $data['literal_amount'] }}</div>
      </div>
    </div>
    <div id="light-table" style="margin-top: 5px; page-break-inside: avoid;">
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
