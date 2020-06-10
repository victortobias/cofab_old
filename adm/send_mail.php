<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d');

use PHPMailer\PHPMailer\PHPMailer;

require '../vendor/autoload.php';
require_once '../config2.php';

 $validacpf = Usuario::validaCpf($_POST['cpf']);
  
  if(count($validacpf) > 0){
    echo "<script>alert('Este CPF já está sendo utilizado, caso precise refazer seu cadastro envie um email para inscricoescofab@gmail.com')</script>";
    echo '<script>window.history.back();</script>';
  }else{

if(isset($_POST['name'])){

$link1 = "'https://d1oco4z2z1fhwp.cloudfront.net/templates/default/7/sayagata-200px.gif'";
$link2 = "'https://d1oco4z2z1fhwp.cloudfront.net/templates/default/7/sayagata-200px.gif'";
$fontes1 = "'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans'";
$fontes2 = "'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans'";
$lato = "'Lato'";
$link3 = "'https://d1oco4z2z1fhwp.cloudfront.net/templates/default/7/bg-yeah.jpg'";
$body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
    <!--[if gte mso 9]><xml>
     <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
     </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
    <title></title>
    <!--[if !mso]><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <!--<![endif]-->
    
    <style type="text/css" id="media-query">
      body {
  margin: 0;
  padding: 0; }

table, tr, td {
  vertical-align: top;
  border-collapse: collapse; }

.ie-browser table, .mso-container table {
  table-layout: fixed; }

* {
  line-height: inherit; }

a[x-apple-data-detectors=true] {
  color: inherit !important;
  text-decoration: none !important; }

[owa] .img-container div, [owa] .img-container button {
  display: block !important; }

[owa] .fullwidth button {
  width: 100% !important; }

[owa] .block-grid .col {
  display: table-cell;
  float: none !important;
  vertical-align: top; }

.ie-browser .num12, .ie-browser .block-grid, [owa] .num12, [owa] .block-grid {
  width: 600px !important; }

.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
  line-height: 100%; }

.ie-browser .mixed-two-up .num4, [owa] .mixed-two-up .num4 {
  width: 200px !important; }

.ie-browser .mixed-two-up .num8, [owa] .mixed-two-up .num8 {
  width: 400px !important; }

.ie-browser .block-grid.two-up .col, [owa] .block-grid.two-up .col {
  width: 300px !important; }

.ie-browser .block-grid.three-up .col, [owa] .block-grid.three-up .col {
  width: 200px !important; }

.ie-browser .block-grid.four-up .col, [owa] .block-grid.four-up .col {
  width: 150px !important; }

.ie-browser .block-grid.five-up .col, [owa] .block-grid.five-up .col {
  width: 120px !important; }

.ie-browser .block-grid.six-up .col, [owa] .block-grid.six-up .col {
  width: 100px !important; }

.ie-browser .block-grid.seven-up .col, [owa] .block-grid.seven-up .col {
  width: 85px !important; }

.ie-browser .block-grid.eight-up .col, [owa] .block-grid.eight-up .col {
  width: 75px !important; }

.ie-browser .block-grid.nine-up .col, [owa] .block-grid.nine-up .col {
  width: 66px !important; }

.ie-browser .block-grid.ten-up .col, [owa] .block-grid.ten-up .col {
  width: 60px !important; }

.ie-browser .block-grid.eleven-up .col, [owa] .block-grid.eleven-up .col {
  width: 54px !important; }

.ie-browser .block-grid.twelve-up .col, [owa] .block-grid.twelve-up .col {
  width: 50px !important; }

@media only screen and (min-width: 620px) {
  .block-grid {
    width: 600px !important; }
  .block-grid .col {
    vertical-align: top; }
    .block-grid .col.num12 {
      width: 600px !important; }
  .block-grid.mixed-two-up .col.num4 {
    width: 200px !important; }
  .block-grid.mixed-two-up .col.num8 {
    width: 400px !important; }
  .block-grid.two-up .col {
    width: 300px !important; }
  .block-grid.three-up .col {
    width: 200px !important; }
  .block-grid.four-up .col {
    width: 150px !important; }
  .block-grid.five-up .col {
    width: 120px !important; }
  .block-grid.six-up .col {
    width: 100px !important; }
  .block-grid.seven-up .col {
    width: 85px !important; }
  .block-grid.eight-up .col {
    width: 75px !important; }
  .block-grid.nine-up .col {
    width: 66px !important; }
  .block-grid.ten-up .col {
    width: 60px !important; }
  .block-grid.eleven-up .col {
    width: 54px !important; }
  .block-grid.twelve-up .col {
    width: 50px !important; } }

@media (max-width: 620px) {
  .block-grid, .col {
    min-width: 320px !important;
    max-width: 100% !important;
    display: block !important; }
  .block-grid {
    width: calc(100% - 40px) !important; }
  .col {
    width: 100% !important; }
    .col > div {
      margin: 0 auto; }
  img.fullwidth, img.fullwidthOnMobile {
    max-width: 100% !important; }
  .no-stack .col {
    min-width: 0 !important;
    display: table-cell !important; }
  .no-stack.two-up .col {
    width: 50% !important; }
  .no-stack.mixed-two-up .col.num4 {
    width: 33% !important; }
  .no-stack.mixed-two-up .col.num8 {
    width: 66% !important; }
  .no-stack.three-up .col.num4 {
    width: 33% !important; }
  .no-stack.four-up .col.num3 {
    width: 25% !important; }
  .mobile_hide {
    min-height: 0px;
    max-height: 0px;
    max-width: 0px;
    display: none;
    overflow: hidden;
    font-size: 0px; } }

    </style>
</head>
<body class="clean-body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #FFFFFF">
  <style type="text/css" id="media-query-bodytag">
    @media (max-width: 520px) {
      .block-grid {
        min-width: 320px!important;
        max-width: 100%!important;
        width: 100%!important;
        display: block!important;
      }

      .col {
        min-width: 320px!important;
        max-width: 100%!important;
        width: 100%!important;
        display: block!important;
      }

        .col > div {
          margin: 0 auto;
        }

      img.fullwidth {
        max-width: 100%!important;
      }
            img.fullwidthOnMobile {
        max-width: 100%!important;
      }
      .no-stack .col {
                min-width: 0!important;
                display: table-cell!important;
            }
            .no-stack.two-up .col {
                width: 50%!important;
            }
            .no-stack.mixed-two-up .col.num4 {
                width: 33%!important;
            }
            .no-stack.mixed-two-up .col.num8 {
                width: 66%!important;
            }
            .no-stack.three-up .col.num4 {
                width: 33%!important;
            }
            .no-stack.four-up .col.num3 {
                width: 25%!important;
            }
      .mobile_hide {
        min-height: 0px!important;
        max-height: 0px!important;
        max-width: 0px!important;
        display: none!important;
        overflow: hidden!important;
        font-size: 0px!important;
      }
    }
  </style>
  <!--[if IE]><div class="ie-browser"><![endif]-->
  <!--[if mso]><div class="mso-container"><![endif]-->
  <table class="nl-container" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #FFFFFF;width: 100%" cellpadding="0" cellspacing="0">
    <tbody>
    <tr style="vertical-align: top">
        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #FFFFFF;"><![endif]-->

    <div style="background-color:transparent;">
      <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 600px;"><tr class="layout-full-width" style="background-color:transparent;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center" width="600" style=" width:600px; padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
              <div style="background-color: transparent; width: 100% !important;">
              <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

                  
                    
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="divider " style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
    <tbody>
        <tr style="vertical-align: top">
            <td class="divider_inner" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 10px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                <table class="divider_content" height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid transparent;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                    <tbody>
                        <tr style="vertical-align: top">
                            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                <span>&#160;</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>    <div style="background-color:transparent;">
      <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 600px;"><tr class="layout-full-width" style="background-color:transparent;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center" width="600" style=" width:600px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
              <div style="background-color: transparent; width: 100% !important;">
              <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

                  
                    <div align="center" class="img-container center  autowidth  fullwidth " style="padding-right: 0px;  padding-left: 0px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px;line-height:0px;"><td style="padding-right: 0px; padding-left: 0px;" align="center"><![endif]-->
  <img class="center  autowidth  fullwidth" align="center" border="0" src="http://www.solubytes.com.br/cofab/imgs/Cofab-25.jpeg" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: auto;float: none;width: 100%;max-width: 600px" width="600">
<!--[if mso]></td></tr></table><![endif]-->
</div>

                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>    <div style="background-image:url(' . $link1 . ');background-position:top center;background-repeat:repeat;;background-color:transparent">
      <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-image:url( ' . $link2 . ');background-position:top center;background-repeat:repeat;;background-color:transparent" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 600px;"><tr class="layout-full-width" style="background-color:transparent;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center" width="600" style=" width:600px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:15px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
              <div style="background-color: transparent; width: 100% !important;">
              <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:15px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

                  
                    <div class="">
    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 30px; padding-bottom: 5px;"><![endif]-->
    <div style="line-height:120%;color:#555555;font-family:' . $fontes1 . ', Tahoma, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 30px; padding-bottom: 5px;"> 
        <div style="font-size:12px;line-height:14px;font-family:Montserrat, ' . $fontes2 . ', Tahoma, sans-serif;color:#555555;text-align:left;"><p style="margin: 0;font-size: 12px;line-height: 14px;text-align: center"><span style="font-size: 48px; line-height: 57px;"><strong><span style="line-height: 57px; font-size: 48px;">Inscrição recebida com sucesso!</span></strong></span></p></div> 
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div class="">
    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 5px; padding-bottom: 10px;"><![endif]-->
    <div style="line-height:120%;color:#555555;font-family:' . $fontes1 . ', Tahoma, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 5px; padding-bottom: 10px;"> 
        <div style="line-height:14px;font-family:Montserrat, ' . $fontes2 . ', Tahoma, sans-serif;font-size:12px;color:#555555;text-align:left;"><p style="margin: 0;line-height: 14px;text-align: center;font-size: 12px"><span style="font-size: 14px; line-height: 16px;"><strong>Sua inscrição será confirmada somente após o pagamento.</strong></span></p></div>  
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="divider " style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
    <tbody>
        <tr style="vertical-align: top">
            <td class="divider_inner" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 10px;padding-left: 10px;padding-top: 15px;padding-bottom: 20px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                <table class="divider_content" height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="15%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 10px solid #f9b085;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                    <tbody>
                        <tr style="vertical-align: top">
                            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                <span>&#160;</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
                  
                    <div class="">
    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 5px; padding-bottom: 10px;"><![endif]-->
    <div style="line-height:120%;color:#555555;font-family:' . $fontes1 . ', Tahoma, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 5px; padding-bottom: 10px;"> 
        <div style="line-height:14px;font-family:Montserrat, ' . $fontes2 . ', Tahoma, sans-serif;font-size:12px;color:#555555;text-align:left;"><p style="margin: 0;line-height: 14px;text-align: center;font-size: 12px"><span style="font-size: 20px; line-height: 24px;"><strong>Confira seus dados abaixo:</strong></span></p></div>   
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div class="">
    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 25px; padding-left: 25px; padding-top: 5px; padding-bottom: 20px;"><![endif]-->
    <div style="line-height:180%;color:#555555;font-family:' . $lato . ', Tahoma, Verdana, Segoe, sans-serif; padding-right: 25px; padding-left: 25px; padding-top: 5px; padding-bottom: 20px;">    
        <div style="font-size:12px;line-height:22px;color:#555555;font-family:'. $lato . ', Tahoma, Verdana, Segoe, sans-serif;text-align:left;"><p style="margin: 0;font-size: 12px;line-height: 22px"><span style="font-size: 20px; line-height: 36px;">Nome Completo: <strong>[NOME]</strong></span><br></p><p style="margin: 0;font-size: 12px;line-height: 22px"><span style="font-size: 20px; line-height: 36px;">RG: <strong>[RG]</strong><br>CPF: <strong>[CPF]</strong><br>Email: <strong>[EMAIL]</strong><br>Telefone: <strong>[TELEFONE]</strong><br>Cidade: <strong>[CIDADE]</strong><br>Estado: <strong>[ESTADO]</strong><br>Categoria de Inscrição: <strong>[CATEGORIA]</strong><br>Profissão: <strong>[PROFISSAO]</strong><br>Atuação: <strong>[ATUACAO]</strong></span></p><br></div>   
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  

<div align="center" class="button-container center " style="padding-right: 10px; padding-left: 10px; padding-top:0px; padding-bottom:30px;">
  <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top:0px; padding-bottom:30px;" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://www.google.com" style="height:37pt; v-text-anchor:middle; width:246pt;" arcsize="6%" strokecolor="#66E583" fillcolor="#66E583"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:' . $lato . ', Tahoma, Verdana, Segoe, sans-serif; font-size:18px;"><![endif]-->
    <a [LINKPAGAMENTO] target="_blank" style="display: block;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #ffffff; background-color: #66E583; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; max-width: 328px; width: 288px;width: auto; border-top: 0px solid transparent; border-right: 0px solid transparent; border-bottom: 4px solid #f9b085; border-left: 0px solid transparent; padding-top: 5px; padding-right: 20px; padding-bottom: 5px; padding-left: 20px; font-family: ' . $lato . ', Tahoma, Verdana, Segoe, sans-serif;mso-border-alt: none">
      <span style="line-height:24px;font-size:12px;"><span style="font-size: 18px; line-height: 36px;" data-mce-style="font-size: 18px; line-height: 36px;"><strong>[FRASEPAGAMENTO]</strong></span></span>
    </a>
  <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
</div>
<div class="">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 5px; padding-bottom: 10px;"><![endif]-->
<div style="line-height:120%;color:#555555;font-family:' . $fontes1 . ', Tahoma, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 5px; padding-bottom: 10px;"> 
    <div style="line-height:14px;font-family:Montserrat, ' . $fontes2 . ', Tahoma, sans-serif;font-size:12px;color:#555555;text-align:left;"><p style="margin: 0;line-height: 14px;text-align: center;font-size: 12px"><span style="font-size: 20px; line-height: 24px;"><strong>Envie seu(s) comprovante(s) para o email: cofabcomprovante@gmail.com</strong></span></p></div>   
</div>
<!--[if mso]></td></tr></table><![endif]-->
</div>

                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>    <div style="background-image:url( '. $link3 . ');background-position:top center;background-repeat:no-repeat;;background-color:#f9b085">
      <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-image:url(' . $link3 . ');background-position:top center;background-repeat:no-repeat;;background-color:#f9b085" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 600px;"><tr class="layout-full-width" style="background-color:transparent;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center" width="600" style=" width:600px; padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:20px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
              <div style="background-color: transparent; width: 100% !important;">
              <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:20px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

                  
                    
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="divider " style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
    <tbody>
        <tr style="vertical-align: top">
            <td class="divider_inner" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 10px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                <table class="divider_content" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid transparent;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                    <tbody>
                        <tr style="vertical-align: top">
                            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                <span></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
                  
                    <div align="center" class="img-container center  autowidth  " style="padding-right: 0px;  padding-left: 0px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px;line-height:0px;"><td style="padding-right: 0px; padding-left: 0px;" align="center"><![endif]-->
<div style="line-height:30px;font-size:1px">&#160;</div>  <img class="center  autowidth " align="center" border="0" src="http://www.solubytes.com.br/cofab/imgs/sitepeq.png" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: auto;float: none;width: 100%;max-width: 380px" width="380">
<!--[if mso]></td></tr></table><![endif]-->
</div>

                  
                  
                    <div class="">
    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top: 10px; padding-bottom: 0px;"><![endif]-->
    <div style="line-height:150%;color:#FFFFFF;font-family:' . $fontes1 . ', Tahoma, sans-serif; padding-right: 0px; padding-left: 0px; padding-top: 10px; padding-bottom: 0px;">   
        <div style="line-height:18px;font-family:Montserrat, ' . $fontes2 . ', Tahoma, sans-serif;font-size:12px;color:#FFFFFF;text-align:left;"><p style="margin: 0;line-height: 18px;text-align: center;font-size: 12px"><span style="background-color: transparent; line-height: 18px; font-size: 12px;"><span style="line-height: 18px; font-size: 12px;"><span style="font-size: 28px; line-height: 42px;"><strong>CONFIRA A GRADE CIENTÍFICA</strong></span></span></span></p><p style="margin: 0;line-height: 18px;text-align: center;font-size: 12px"><span style="background-color: transparent; line-height: 18px; font-size: 12px;"><span style="line-height: 18px; font-size: 12px;"><em style="font-size: 18px;">Acesse o nosso site e mantenha-se atualizado</em></span></span><br></p></div>    
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div class="">
    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 15px; padding-bottom: 10px;"><![endif]-->
    <div style="line-height:180%;color:#FFFFFF;font-family:' . $lato .', Tahoma, Verdana, Segoe, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 15px; padding-bottom: 10px;">    
        <div style="line-height:22px;font-size:12px;color:#FFFFFF;font-family:' . $lato . ', Tahoma, Verdana, Segoe, sans-serif;text-align:left;"><p style="margin: 0;line-height: 22px;text-align: center;font-size: 12px"><span style="font-size: 16px; line-height: 28px;">Contamos com a presença de renomados pesquisadores nacionais e internacionais, venha comemorar os 25 anos de COFAB conosco!</span></p></div>   
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    
<div align="center" class="button-container center " style="padding-right: 10px; padding-left: 10px; padding-top:15px; padding-bottom:30px;">
  <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top:15px; padding-bottom:30px;" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://www.cofab.fob.usp.br" style="height:40pt; v-text-anchor:middle; width:148pt;" arcsize="6%" strokecolor="#FFFFFF" fillcolor="transparent"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:' . $lato . ', Tahoma, Verdana, Segoe, sans-serif; font-size:18px;"><![endif]-->
    <a href="http://www.cofab.fob.usp.br" target="_blank" style="display: block;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #ffffff; background-color: transparent; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; max-width: 198px; width: 158px;width: auto; border-top: 4px solid #FFFFFF; border-right: 4px solid #FFFFFF; border-bottom: 4px solid #FFFFFF; border-left: 4px solid #FFFFFF; padding-top: 5px; padding-right: 20px; padding-bottom: 5px; padding-left: 20px; font-family: ' . $lato . ', Tahoma, Verdana, Segoe, sans-serif;mso-border-alt: none">
      <span style="font-size:12px;line-height:24px;"><span style="font-size: 18px; line-height: 36px;" data-mce-style="font-size: 18px; line-height: 28px;"><strong><span style="line-height: 36px; font-size: 18px;" data-mce-style="line-height: 28px;">ACESSAR AGORA</span></strong></span></span>
    </a>
  <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
</div>

                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>    <div style="background-color:transparent;">
      <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 600px;"><tr class="layout-full-width" style="background-color:transparent;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center" width="600" style=" width:600px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
              <div style="background-color: transparent; width: 100% !important;">
              <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

                  
                    
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="divider " style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
    <tbody>
        <tr style="vertical-align: top">
            <td class="divider_inner" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 10px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                <table class="divider_content" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid transparent;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                    <tbody>
                        <tr style="vertical-align: top">
                            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                <span></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>    <div style="background-color:transparent;">
      <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 600px;"><tr class="layout-full-width" style="background-color:transparent;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center" width="600" style=" width:600px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:10px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
              <div style="background-color: transparent; width: 100% !important;">
              <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

                  
                    
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="divider " style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
    <tbody>
        <tr style="vertical-align: top">
            <td class="divider_inner" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 10px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                <table class="divider_content" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid transparent;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                    <tbody>
                        <tr style="vertical-align: top">
                            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                <span></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>    <div style="background-color:#F9F9F9;">
      <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:#F9F9F9;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 600px;"><tr class="layout-full-width" style="background-color:transparent;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center" width="600" style=" width:600px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
              <div style="background-color: transparent; width: 100% !important;">
              <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

                  
                    <div align="center" class="img-container center fixedwidth " style="padding-right: 0px;  padding-left: 0px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px;line-height:0px;"><td style="padding-right: 0px; padding-left: 0px;" align="center"><![endif]-->
<div style="line-height:20px;font-size:1px">&#160;</div>  <img class="center fixedwidth" align="center" border="0" src="http://www.solubytes.com.br/cofab/imgs/Cofab-25.jpeg" alt="Email Design Workshop" title="Email Design Workshop" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: auto;float: none;width: 100%;max-width: 330px" width="330">
<div style="line-height:5px;font-size:1px">&#160;</div><!--[if mso]></td></tr></table><![endif]-->
</div>

                  
                  
                    <div class="">
    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;"><![endif]-->
    <div style="line-height:120%;color:#f9b085;font-family:' . $lato . ', Tahoma, Verdana, Segoe, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;">   
        <div style="line-height:14px;font-size:12px;color:#f9b085;font-family:' . $lato . ', Tahoma, Verdana, Segoe, sans-serif;text-align:left;"><p style="margin: 0;line-height: 14px;text-align: center;font-size: 12px"><span style="font-size: 16px; line-height: 19px;"><strong>www.cofab.fob.usp.br</strong></span></p></div>    
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    
<div align="center" style="padding-right: 10px; padding-left: 10px; padding-bottom: 15px;" class="">
  <div style="line-height:10px;font-size:1px">&#160;</div>
  <div style="display: table; max-width:77px;">
  <!--[if (mso)|(IE)]><table width="57" cellpadding="0" cellspacing="0" border="0"><tr><td style="border-collapse:collapse; padding-right: 10px; padding-left: 10px; padding-bottom: 15px;"  align="center"><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; mso-table-lspace: 0pt;mso-table-rspace: 0pt; width:57px;"><tr><td width="32" style="width:32px; padding-right: 5px;" valign="top"><![endif]-->
    <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 0">
      <tbody><tr style="vertical-align: top"><td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
        <a href="https://www.facebook.com/CofabUsp/" title="Facebook" target="_blank">
          <img src="http://www.solubytes.com.br/cofab/imgs/facebook@2x.png" alt="Facebook" title="Facebook" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
        </a>
      <div style="line-height:5px;font-size:1px">&#160;</div>
      </td></tr>
    </tbody></table>
    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
  </div>
</div>
                  
                  
                    
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="divider " style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
    <tbody>
        <tr style="vertical-align: top">
            <td class="divider_inner" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 0px;padding-left: 0px;padding-top: 0px;padding-bottom: 15px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                <table class="divider_content" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #EEEDED;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                    <tbody>
                        <tr style="vertical-align: top">
                            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                <span></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
                  
                    <div class="">
    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;"><![endif]-->
    <div style="line-height:120%;color:#555555;font-family:' . $lato . ', Tahoma, Verdana, Segoe, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;">   
        <div style="font-size:12px;line-height:14px;color:#555555;font-family:' . $lato . ', Tahoma, Verdana, Segoe, sans-serif;text-align:left;"><p style="margin: 0;font-size: 14px;line-height: 17px;text-align: center"><strong>COFAB 2018 | USP-FOB.</strong> Todos direitos reservados.</p></div> 
    </div>
    <!--[if mso]></td></tr></table><![endif]-->
</div>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>    <div style="background-color:#F9F9F9;">
      <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:#F9F9F9;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 600px;"><tr class="layout-full-width" style="background-color:transparent;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center" width="600" style=" width:600px; padding-right: 0px; padding-left: 0px; padding-top:15px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
              <div style="background-color: transparent; width: 100% !important;">
              <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:15px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

                  
                    
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="divider " style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
    <tbody>
        <tr style="vertical-align: top">
            <td class="divider_inner" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 10px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                <table class="divider_content" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid transparent;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                    <tbody>
                        <tr style="vertical-align: top">
                            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                <span></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>   <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </td>
  </tr>
  </tbody>
  </table>
  <!--[if (mso)|(IE)]></div><![endif]-->


</body></html>';

// Dados


    $name = $_POST['name'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $email = urldecode($_POST['confirm_email']);
    $telephone = $_POST['telephone'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $category = $_POST['category'];
    $profession = $_POST['profession'];
    $performance = $_POST['performance'];
    if(isset($_POST['sbfa'])){
      $sbfa = $_POST['sbfa'];
    }else{
      $sbfa = 0;
    }

  if(!isset($_POST['submit_work'])){
    $submitwork = 0;
    $frasepagamento = "PAGAR AGORA COM PAGSEGURO";
    
    if ($category == "Simpósio de Saúde Coletiva Estudantes Graduação e Pós Graduação") {
      $frasepagamento = "VOCÊ RECEBERÁ O LINK PARA PAGAMENTO SOMENTE APÓS O RECEBIMENTO DA SUA COMPROVAÇÃO DE ESTUDANTE";
      $linkpagamento = '';

    }elseif ($category == "Simpósio de Saúde Coletiva - Profissionais") {
      $linkpagamento = 'href="https://pag.ae/blx07pz"';

    }

  }elseif($_POST['submit_work'] == 0) {
    $submitwork = 0;
    $frasepagamento = "PAGAR AGORA COM PAGSEGURO";
    if($category == "COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia"){
      
      if($sbfa == 1){
        $linkpagamento ='';
        $frasepagamento = "VOCÊ RECEBERÁ O LINK PARA PAGAMENTO SOMENTE APÓS O RECEBIMENTO DA SUA COMPROVAÇÃO DE ESTUDANTE E SÓCIO DO SBFA";
      }elseif($sbfa == 0){
        $linkpagamento ='';
        $frasepagamento = "VOCÊ RECEBERÁ O LINK PARA PAGAMENTO SOMENTE APÓS O RECEBIMENTO DA SUA COMPROVAÇÃO DE ESTUDANTE";
      }

    }elseif ($category == "COFAB Profissional Fonoaudiólogo") {
      if($sbfa == 1){
        $linkpagamento ='';
        $frasepagamento = "VOCÊ RECEBERÁ O LINK PARA PAGAMENTO SOMENTE APÓS O RECEBIMENTO DA SUA COMPROVAÇÃO DE SÓCIO DO SBFA";
      }else{
      $linkpagamento = 'href="https://pag.ae/bhx06MR"';
      }


    }elseif($category == "COFAB Profissional de outras áreas") {
      $linkpagamento = 'href="https://pag.ae/bdx06Vd"';

    }elseif($category == "COFAB Estudantes Graduação e Pós Graduação de Outras Áreas") {
      $linkpagamento = '';
      $frasepagamento ='VOCÊ RECEBERÁ O LINK PARA PAGAMENTO SOMENTE APÓS O RECEBIMENTO DA SUA COMPROVAÇÃO DE ESTUDANTE';

    }elseif($category == "Simpósio de Saúde Coletiva Estudantes Graduação e Pós Graduação") {
      $linkpagamento = 'href="https://pag.ae/bgx07d8"';

    }elseif ($category == "Simpósio de Saúde Coletiva - Profissionais") {
      $linkpagamento = 'href="https://pag.ae/blx07pz"';

    }

  }else{
    // no caso de envio de trabalho
    $submitwork = $_POST['submit_work'];
    $linkpagamento = '';

    if($category == "COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia"){
      
      if($sbfa == 1){
        $frasepagamento = "VOCÊ RECEBERÁ O LINK PARA PAGAMENTO SOMENTE APÓS O RECEBIMENTO DO TRABALHO E DA SUA COMPROVAÇÃO DE ESTUDANTE E SÓCIO DO SBFA";

      }else{
        $frasepagamento = "VOCÊ RECEBERÁ O LINK PARA PAGAMENTO SOMENTE APÓS O RECEBIMENTO DO TRABALHO E DA SUA COMPROVAÇÃO DE ESTUDANTE";
      }

      

    }elseif ($category == "COFAB Profissional Fonoaudiólogo") {
      
      if($sbfa == 1){
        $frasepagamento = "VOCÊ RECEBERÁ O LINK PARA PAGAMENTO SOMENTE APÓS O RECEBIMENTO DO TRABALHO E DA SUA COMPROVAÇÃO DE SÓCIO DO SBFA";

      }else{
      $frasepagamento = "VOCÊ RECEBERÁ O LINK PARA PAGAMENTO SOMENTE APÓS O RECEBIMENTO DO TRABALHO";
      }


    }elseif($category == "COFAB Profissional de outras áreas") {
      $frasepagamento = "VOCÊ RECEBERÁ O LINK PARA PAGAMENTO SOMENTE APÓS O RECEBIMENTO DO TRABALHO";
      
    }elseif ($category == "COFAB Estudantes Graduação e Pós Graduação de Outras Áreas") {
      $frasepagamento = "VOCÊ RECEBERÁ O LINK PARA PAGAMENTO SOMENTE APÓS O RECEBIMENTO DO TRABALHO E DA SUA COMPROVAÇÃO DE ESTUDANTE";
    }
    
  }








// Substituindo Macros pelos valores.
$body = str_replace('[NOME]', $name, $body);
$body = str_replace('[RG]', $rg, $body);
$body = str_replace('[CPF]', $cpf, $body);
$body = str_replace('[EMAIL]', $email, $body);
$body = str_replace('[TELEFONE]', $telephone, $body);
$body = str_replace('[CIDADE]', $city, $body);
$body = str_replace('[ESTADO]', $state, $body);
$body = str_replace('[CATEGORIA]', $category, $body);
$body = str_replace('[PROFISSAO]', $profession, $body);
$body = str_replace('[ATUACAO]', $performance, $body);
$body = str_replace('[FRASEPAGAMENTO]', $frasepagamento, $body);
$body = str_replace('[LINKPAGAMENTO]', $linkpagamento, $body);



//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

$mail->CharSet = 'UTF-8';

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
//$mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "inscricoescofab@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "cofab201@";

//Set who the message is to be sent from
$mail->setFrom('inscricoescofab@gmail.com', 'Inscrições COFAB');

//Set an alternative reply-to address
$mail->addReplyTo('inscricoescofab@gmail.com', 'Inscrições COFAB');

//Set who the message is to be sent to
$mail->addAddress($email, $name);

//Set the subject line
$mail->Subject = 'Inscrição Recebida com Sucesso!';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($body);

//Replace the plain text body with one created manually
$mail->AltBody = 'Caso não consiga abrir está mensagem, envie um email para inscricoescofab@gmail.com';

//Attach an image file
//$mail->addAttachment('http://www.solubytes.com.br/cofab/imgs/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "<h1>Ops, parece que teve algum erro na inscrição, tente preencher novamente! </h1> Erro:" . $mail->ErrorInfo;
    //salva erro ao enviar em um log
    $file = fopen("log.txt", "a+");
    fwrite($file, date("d-m-Y H:i:s"). " - " . $mail->ErrorInfo . " IP:" . $_SERVER["REMOTE_ADDR"] . "\r\n");
    fclose($file);
    echo "<br><strong>Erro salvo no Log e enviado ao Administrador.</strong>";
} else {
    echo "<h1>Inscrição realizada com sucesso!</h1>";
    //insere no banco
    $inscricao = new Usuario($name, $rg, $cpf, $email, $telephone, $city, $state, $category, $profession, $performance, $submitwork, $hoje, $sbfa);
    $inscricao->insert();
    //salva txt
    $security = fopen("registereds.txt", "a+");
    fwrite($security, date("d-m-Y H:i:s"). " - " . $name. " IP:" . $_SERVER["REMOTE_ADDR"] . "\r\n");
    fclose($security);
    
  
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}
}else{
    echo "<h1>Ops, teve algum erro para salvar os seus dados. Contate o administrador!</h1>";
}

    
  }






?>