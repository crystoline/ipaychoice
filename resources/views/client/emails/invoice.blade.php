<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Grids Master Template</title>

    <style type="text/css">
        a {text-decoration: none}
        .btn-rounded {
            border-radius: 3px;
        }
        .btn {
            border-radius: 0;
        }
        .btn-space, .btn-vspace {
            margin-bottom: 5px;
        }
        .btn-hspace, .btn-space {
            margin-right: 5px;
        }
        .btn-primary {
            color: #fff;
            background-color: #4e91ff;
            border-color: #4e91ff;
        }
        .btn {
            display: inline-block;
            margin-bottom: 0;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            border: 1px solid transparent;
            padding: 8px 12px;
            font-size: 13px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .btn, .dropdown-header, .dropdown-menu>li>a {
            line-height: 1.42857143;
            white-space: nowrap;
        }
        /* Outlines the grids, remove when sending */
        table td { border: 1px solid #fafafa;;}
        table.footer td{ border: none }
        table.footer a{ color: #fff }
        /* CLIENT-SPECIFIC STYLES */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; }
        /* RESET STYLES */
        img { border: 0; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { margin: 0 !important; padding: 0 !important; width: 100% !important; }
        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] { margin: 0 !important; }
        /* MEDIA QUERIES */
        @media all and (max-width:639px){
            .wrapper{ width:320px!important; padding: 0 !important; }
            .container{ width:300px!important;  padding: 0 !important; }
            .mobile{ width:300px!important; display:block!important; padding: 0 !important; }
            .img{ width:100% !important; height:auto !important; }
            *[class="mobileOff"] { width: 0px !important; display: none !important; }
            *[class*="mobileOn"] { display: block !important; max-height:none !important; }
        }
    </style>
</head>
<body style="font-family: Garamond,sans-serif;margin:0; padding:0; background-color:#F2F2F2;">
<center>
    <br><br><br>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
        <tr>
            <td align="center" valign="top">

                <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
                    <tr>
                        <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">

                            <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                <tr>
                                    <td align="center" valign="top">
                                        <h1>{{Session::get('client.configuration')->client->name}}</h1>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                    </tr>
                </table>

<div class=" text-center">
                <br><br><h3>{{Session::get('client.configuration')->client->name}} sent you an invoice for {{$invoice['currency']['html'].number_format($invoice['amount'],2)}}</h3><br><br>
                <a class=" text-center btn-rounded btn btn-space btn-primary" href="{{$subdomain}}.{{env('APP_DOMAIN')}}/invoice/{{$client}}/{{$invoice['invoice_no']}}">View Your Invoice</a>
                </div>
<br><br><br>
                <table style="color:#fff" width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper footer" bgcolor="#1c3061">
                    <tr>
                        <td height="10" style="border: none;font-size:10px; line-height:10px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">

                            <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                <tr>
                                    <td width="300" class="mobile" align="center" valign="top">
                                        <span>Copyright ?? {!! date('Y') !!} iPayChoice</span>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                    </tr>
                </table>


            </td>
        </tr>
    </table>
</center>
</body>
</html>