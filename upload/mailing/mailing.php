<?php
session_start();
include_once("../../config.inc");

$mail = $_SESSION["correo"];
$mailImagen = WB_SITENAME . $_SESSION["img"];
$mailShortUrl = $_SESSION["shorturl"];
$mailQrCode = WB_SITENAME . $_SESSION["qrcode"];

$headers = "From: messages-noreply@archertroy.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$message = <<<EOF


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml"> <head> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>*|MC:SUBJECT|*</title> <style type="text/css">body,#bodyTable,#bodyCell{height:100% !important;margin:0;padding:0;width:100% !important;}table{border-collapse:collapse;}img,a img{border:0;outline:none;text-decoration:none;}h1,h2,h3,h4,h5,h6{margin:0;padding:0;}p{margin:1em 0;padding:0;}a{word-wrap:break-word;}.ReadMsgBody{width:100%;}.ExternalClass{width:100%;}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%;}table,td{mso-table-lspace:0pt;mso-table-rspace:0pt;}#outlook a{padding:0;}img{-ms-interpolation-mode:bicubic;}body,table,td,p,a,li,blockquote{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;}#bodyCell{padding:0;}.mcnImage{vertical-align:bottom;}.mcnTextContent img{height:auto !important;}body,#bodyTable{background-color:#F2F2F2;}#bodyCell{border-top:0;}h1{color:#606060 !important;display:block;font-family:Helvetica;font-size:40px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:-1px;margin:0;text-align:left;}h2{color:#404040 !important;display:block;font-family:Helvetica;font-size:26px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:-.75px;margin:0;text-align:left;}h3{color:#606060 !important;display:block;font-family:Helvetica;font-size:18px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:-.5px;margin:0;text-align:left;}h4{color:#808080 !important;display:block;font-family:Helvetica;font-size:16px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:normal;margin:0;text-align:left;}#templatePreheader{background-color:#FFFFFF;border-top:0;border-bottom:0;}.preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:11px;line-height:125%;text-align:left;}.preheaderContainer .mcnTextContent a{color:#606060;font-weight:normal;text-decoration:underline;}#templateHeader{background-color:#FFFFFF;border-top:0;border-bottom:0;}.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:15px;line-height:150%;text-align:left;}.headerContainer .mcnTextContent a{color:#6DC6DD;font-weight:normal;text-decoration:underline;}#templateBody{background-color:#FFFFFF;border-top:0;border-bottom:0;}.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:15px;line-height:150%;text-align:left;}.bodyContainer .mcnTextContent a{color:#6DC6DD;font-weight:normal;text-decoration:underline;}#templateFooter{background-color:#F2F2F2;border-top:0;border-bottom:0;}.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:11px;line-height:125%;text-align:left;}.footerContainer .mcnTextContent a{color:#606060;font-weight:normal;text-decoration:underline;}@media only screen and (max-width: 480px){body,table,td,p,a,li,blockquote{-webkit-text-size-adjust:none !important;}}@media only screen and (max-width: 480px){body{width:100% !important;min-width:100% !important;}}@media only screen and (max-width: 480px){table[class=mcnTextContentContainer]{width:100% !important;}}@media only screen and (max-width: 480px){table[class=mcnBoxedTextContentContainer]{width:100% !important;}}@media only screen and (max-width: 480px){table[class=mcpreview-image-uploader]{width:100% !important;display:none !important;}}@media only screen and (max-width: 480px){img[class=mcnImage]{width:100% !important;}}@media only screen and (max-width: 480px){table[class=mcnImageGroupContentContainer]{width:100% !important;}}@media only screen and (max-width: 480px){td[class=mcnImageGroupContent]{padding:9px !important;}}@media only screen and (max-width: 480px){td[class=mcnImageGroupBlockInner]{padding-bottom:0 !important;padding-top:0 !important;}}@media only screen and (max-width: 480px){tbody[class=mcnImageGroupBlockOuter]{padding-bottom:9px !important;padding-top:9px !important;}}@media only screen and (max-width: 480px){table[class=mcnCaptionTopContent],table[class=mcnCaptionBottomContent]{width:100% !important;}}@media only screen and (max-width: 480px){table[class=mcnCaptionLeftTextContentContainer],table[class=mcnCaptionRightTextContentContainer],table[class=mcnCaptionLeftImageContentContainer],table[class=mcnCaptionRightImageContentContainer],table[class=mcnImageCardLeftTextContentContainer],table[class=mcnImageCardRightTextContentContainer]{width:100% !important;}}@media only screen and (max-width: 480px){td[class=mcnImageCardLeftImageContent],td[class=mcnImageCardRightImageContent]{padding-right:18px !important;padding-left:18px !important;padding-bottom:0 !important;}}@media only screen and (max-width: 480px){td[class=mcnImageCardBottomImageContent]{padding-bottom:9px !important;}}@media only screen and (max-width: 480px){td[class=mcnImageCardTopImageContent]{padding-top:18px !important;}}@media only screen and (max-width: 480px){td[class=mcnImageCardLeftImageContent],td[class=mcnImageCardRightImageContent]{padding-right:18px !important;padding-left:18px !important;padding-bottom:0 !important;}}@media only screen and (max-width: 480px){td[class=mcnImageCardBottomImageContent]{padding-bottom:9px !important;}}@media only screen and (max-width: 480px){td[class=mcnImageCardTopImageContent]{padding-top:18px !important;}}@media only screen and (max-width: 480px){table[class=mcnCaptionLeftContentOuter] td[class=mcnTextContent],table[class=mcnCaptionRightContentOuter] td[class=mcnTextContent]{padding-top:9px !important;}}@media only screen and (max-width: 480px){td[class=mcnCaptionBlockInner] table[class=mcnCaptionTopContent]:last-child td[class=mcnTextContent]{padding-top:18px !important;}}@media only screen and (max-width: 480px){td[class=mcnBoxedTextContentColumn]{padding-left:18px !important;padding-right:18px !important;}}@media only screen and (max-width: 480px){td[class=mcnTextContent]{padding-right:18px !important;padding-left:18px !important;}}@media only screen and (max-width: 480px){table[class=templateContainer]{max-width:600px !important;width:100% !important;}}@media only screen and (max-width: 480px){h1{font-size:24px !important;line-height:125% !important;}}@media only screen and (max-width: 480px){h2{font-size:20px !important;line-height:125% !important;}}@media only screen and (max-width: 480px){h3{font-size:18px !important;line-height:125% !important;}}@media only screen and (max-width: 480px){h4{font-size:16px !important;line-height:125% !important;}}@media only screen and (max-width: 480px){table[class=mcnBoxedTextContentContainer] td[class=mcnTextContent],td[class=mcnBoxedTextContentContainer] td[class=mcnTextContent] p{font-size:18px !important;line-height:125% !important;}}@media only screen and (max-width: 480px){table[id=templatePreheader]{display:block !important;}}@media only screen and (max-width: 480px){td[class=preheaderContainer] td[class=mcnTextContent],td[class=preheaderContainer] td[class=mcnTextContent] p{font-size:14px !important;line-height:115% !important;}}@media only screen and (max-width: 480px){td[class=headerContainer] td[class=mcnTextContent],td[class=headerContainer] td[class=mcnTextContent] p{font-size:18px !important;line-height:125% !important;}}@media only screen and (max-width: 480px){td[class=bodyContainer] td[class=mcnTextContent],td[class=bodyContainer] td[class=mcnTextContent] p{font-size:18px !important;line-height:125% !important;}}@media only screen and (max-width: 480px){td[class=footerContainer] td[class=mcnTextContent],td[class=footerContainer] td[class=mcnTextContent] p{font-size:14px !important;line-height:115% !important;}}@media only screen and (max-width: 480px){td[class=footerContainer] a[class=utilityLink]{display:block !important;}}</style></head> <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"> <center> <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable"> <tr> <td align="center" valign="top" id="bodyCell"> <table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templatePreheader"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer"> <tr> <td valign="top" class="preheaderContainer" style="padding-top:9px;"></td></tr></table> </td></tr></table> </td></tr><tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer"> <tr> <td valign="top" class="headerContainer" style="padding-top:10px; padding-bottom:10px;"><table class="mcnImageBlock" border="0" cellpadding="0" cellspacing="0" width="100%"> <tbody class="mcnImageBlockOuter"> <tr> <td style="padding:9px" class="mcnImageBlockInner" valign="top"> <table class="mcnImageContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="100%"> <tbody><tr> <td class="mcnImageContent" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0;" valign="top"> <img alt="" src="http://archertroy.com/wp-content/uploads/cover/homeLess959.jpg" style="max-width:960px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage" align="left" width="564"> </td></tr></tbody></table> </td></tr></tbody></table></td></tr></table> </td></tr></table> </td></tr><tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer"> <tr> <td valign="top" class="bodyContainer" style="padding-top:10px; padding-bottom:10px;"><table class="mcnDividerBlock" border="0" cellpadding="0" cellspacing="0" width="100%"> <tbody class="mcnDividerBlockOuter"> <tr> <td class="mcnDividerBlockInner" style="padding: 18px;"> <table style="border-top: 1px solid #999999;" class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%"> <tbody><tr> <td> <span></span> </td></tr></tbody></table> </td></tr></tbody></table><table class="mcnTextBlock" border="0" cellpadding="0" cellspacing="0" width="100%"> <tbody class="mcnTextBlockOuter"> <tr> <td class="mcnTextBlockInner" valign="top"> <table class="mcnTextContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="600"> <tbody><tr> <td class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;" valign="top"> <h1 style="text-align: center;">GREEN SCREEN</h1><h4 style="text-align: center;">INTERACTIVO WEB</h4><p><em><strong>Descripción: </strong></em>La aplicación consta en tomar una foto con un fondo verde (chroma key) para posterior cambiarle el fondo y reemplazarlo por el fondo de la activación y a su vez agregarle un marco a la foto. Una vez que se haya obtenido el resultado final de la foto se procede a subirla para que el usuario pueda compartir su experiencia en sus redes sociales.</p></td></tr></tbody></table> </td></tr></tbody></table><table class="mcnImageBlock" border="0" cellpadding="0" cellspacing="0" width="100%"> <tbody class="mcnImageBlockOuter"> <tr> <td style="padding:9px" class="mcnImageBlockInner" valign="top"> <table class="mcnImageContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="100%"> <tbody><tr> <td class="mcnImageContent" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0;" valign="top"> <img alt="" src="{$mailImagen}" style="max-width:600px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage" align="left" width="564"> </td></tr></tbody></table> </td></tr></tbody></table><table class="mcnTextBlock" border="0" cellpadding="0" cellspacing="0" width="100%"> <tbody class="mcnTextBlockOuter"> <tr> <td class="mcnTextBlockInner" valign="top"> <table class="mcnTextContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="600"> <tbody><tr> <td class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;" valign="top"> <h1>Sitio Web: <a class="website" href="{$mailShortUrl}" target="_blank">http://goo.gl/cnCZd1</a></h1><h3>Comparte en redes sociales tu momento #ArcherTroy.</h3><p>&nbsp;</p></td></tr></tbody></table> </td></tr></tbody></table></td></tr></table> </td></tr></table> </td></tr><tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer"> <tr> <td valign="top" class="footerContainer" style="padding-top:10px; padding-bottom:10px;"><table class="mcnTextBlock" border="0" cellpadding="0" cellspacing="0" width="100%"> <tbody class="mcnTextBlockOuter"> <tr> <td class="mcnTextBlockInner" valign="top"> <table class="mcnTextContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="600"> <tbody><tr> <td class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;" valign="top"> <em>Copyright © ArcherTroy, Todos los derechos reservados.</em> </td></tr></tbody></table> </td></tr></tbody></table></td></tr></table> </td></tr></table> </td></tr></table> </td></tr></table> </center> </body></html>


EOF;


mail("jonathan@archertroy.com", MAIL_ASUNTO, $message, $headers);

?>