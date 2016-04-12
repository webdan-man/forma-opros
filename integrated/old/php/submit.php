<?php
/* проверка данных */
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['sitesa'])) {$sitesa = $_POST['sitesa'];}
if (isset($_POST['quest'])) {$quest = $_POST['quest'];}
$name = stripslashes($name);
$name = htmlspecialchars($name);
$email = stripslashes($email);
$email = htmlspecialchars($email);
$phone = stripslashes($phone);
$phone = htmlspecialchars($phone);

$sitesa = stripslashes($sitesa);
$sitesa = htmlspecialchars($sitesa);
$quest = stripslashes($quest);
$quest = htmlspecialchars($quest);
/* UTM */
if (isset($_POST['utm_medium'])) {$utm_medium = $_POST['utm_medium'];}
if (isset($_POST['utm_source'])) {$utm_source = $_POST['utm_source'];}
if (isset($_POST['utm_campaign'])) {$utm_campaign = $_POST['utm_campaign'];}
if (isset($_POST['block'])) {$block = $_POST['block'];}
if (isset($_POST['utm_term'])) {$utm_term = $_POST['utm_term'];}
if (isset($_POST['utm_content'])) {$utm_content = $_POST['utm_content'];}
if (isset($_POST['position'])) {$position = $_POST['position'];}
if (isset($_POST['keyword'])) {$keyword = $_POST['keyword'];}
if (isset($_POST['action'])) {$action = $_POST['action'];}

$utm_medium = stripslashes($utm_medium);
$utm_medium = htmlspecialchars($utm_medium);
$utm_source = stripslashes($utm_source);
$utm_source = htmlspecialchars($utm_source);
$utm_campaign = stripslashes($utm_campaign);
$utm_campaign = htmlspecialchars($utm_campaign);
$utm_term = stripslashes($utm_term);
$utm_term = htmlspecialchars($utm_term);
$utm_content = stripslashes($utm_content);
$utm_content = htmlspecialchars($utm_content);
$block = stripslashes($block);
$block = htmlspecialchars($block);
$keyword = stripslashes($keyword);
$keyword = htmlspecialchars($keyword);
$position = stripslashes($position);
$position = htmlspecialchars($position);
$action = stripslashes($action);
$action = htmlspecialchars($action);
/* UTM */
/* проверка данных */

/* config start */ 
    require_once "class.phpmailer.php";
    /* основной email */
    $emailAddress = 'bogdansulagaev@gmail.com';
    /* копия письма */
    $emailCC ='timeveda@bk.ru ';
    /* тема письма */
    $subject='Подписка на рассылку';
    $site='gulfstream.bz';
/* config end */


/* тело письма */
$msg=
'
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=320, target-densitydpi=device-dpi">
<style type="text/css">
/* Mobile-specific Styles */
@media only screen and (max-width: 600px) { 
table[class=w0], td[class=w0] { width: 0 !important; }
table[class=w10], td[class=w10], img[class=w10] { width:10px !important; }
table[class=w15], td[class=w15], img[class=w15] { width:5px !important; }
table[class=w30], td[class=w30], img[class=w30] { width:10px !important; }
table[class=w60], td[class=w60], img[class=w60] { width:10px !important; }
table[class=w125], td[class=w125], img[class=w125] { width:80px !important; }
table[class=w130], td[class=w130], img[class=w130] { width:55px !important; }
table[class=w140], td[class=w140], img[class=w140] { width:90px !important; }
table[class=w160], td[class=w160], img[class=w160] { width:180px !important; }
table[class=w170], td[class=w170], img[class=w170] { width:100px !important; }
table[class=w180], td[class=w180], img[class=w180] { width:80px !important; }
table[class=w195], td[class=w195], img[class=w195] { width:80px !important; }
table[class=w220], td[class=w220], img[class=w220] { width:80px !important; }
table[class=w240], td[class=w240], img[class=w240] { width:180px !important; }
table[class=w255], td[class=w255], img[class=w255] { width:185px !important; }
table[class=w275], td[class=w275], img[class=w275] { width:135px !important; }
table[class=w280], td[class=w280], img[class=w280] { width:135px !important; }
table[class=w300], td[class=w300], img[class=w300] { width:140px !important; }
table[class=w325], td[class=w325], img[class=w325] { width:95px !important; }
table[class=w360], td[class=w360], img[class=w360] { width:140px !important; }
table[class=w410], td[class=w410], img[class=w410] { width:180px !important; }
table[class=w470], td[class=w470], img[class=w470] { width:200px !important; }
table[class=w580], td[class=w580], img[class=w580] { width:280px !important; }
table[class=w640], td[class=w640], img[class=w640] { width:300px !important; }
table[class*=hide], td[class*=hide], img[class*=hide], p[class*=hide], span[class*=hide] 
{ display:none !important; }
table[class=h0], td[class=h0] { height: 0 !important; }
p[class=footer-content-left] { text-align: center !important; }
#headline p { font-size: 30px !important; }
.article-content, #left-sidebar{ -webkit-text-size-adjust: 90% !important; -ms-text-size-adjust: 90% !important; }
.header-content, .footer-content-left {-webkit-text-size-adjust: 80% !important; -ms-text-size-adjust: 80% !important;}
img { height: auto; line-height: 100%;}
 } 

body { background-color: #ececec; margin: 0; padding: 0; }
img { outline: none; text-decoration: none; display: block;}
br, strong br, b br, em br, i br { line-height:100%; }
h1, h2, h3, h4, h5, h6 { line-height: 100% !important; -webkit-font-smoothing: antialiased; }
h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color: blue !important; }
h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active { color: red !important; }
h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited { color: purple !important; }
table td, table tr { border-collapse: collapse; }
.yshortcuts, .yshortcuts a, .yshortcuts a:link,.yshortcuts a:visited, .yshortcuts a:hover, .yshortcuts a span {
color: black; text-decoration: none !important; border-bottom: none !important; background: none !important;
}   
code {
  white-space: normal;
  word-break: break-all;
}
#background-table { background-color: #ececec; }

#top-bar { border-radius:6px 6px 0px 0px; -moz-border-radius: 6px 6px 0px 0px; 
-webkit-border-radius:6px 6px 0px 0px; -webkit-font-smoothing: antialiased; 
background-color: #4b4044; color: #72a6a6; }
#top-bar a { font-weight: bold; color: #72a6a6; text-decoration: none;}
#footer { border-radius:0px 0px 6px 6px; -moz-border-radius: 0px 0px 6px 6px; 
-webkit-border-radius:0px 0px 6px 6px; -webkit-font-smoothing: antialiased; }

body, td { font-family: HelveticaNeue, sans-serif; }
.header-content, .footer-content-left, .footer-content-right { 
    -webkit-text-size-adjust: none; -ms-text-size-adjust: none; }

.header-content { font-size: 12px; color: #72a6a6; }
.header-content a { font-weight: bold; color: #72a6a6; text-decoration: none; }
#headline p { color: #72a6a6; font-family: \'Helvetica Neue\', Arial, Helvetica, 
Geneva, sans-serif; font-size: 36px; text-align: center; margin-top:0px; margin-bottom:30px; }
#headline p a { color: #72a6a6; text-decoration: none; }
.article-title { font-size: 18px; line-height:24px; color: #d9653b; font-weight:bold; 
    margin-top:0px; margin-bottom:18px; font-family: HelveticaNeue, sans-serif; }
.article-title a { color: #d9653b; text-decoration: none; }
.article-title.with-meta {margin-bottom: 0;}
.article-meta { font-size: 13px; line-height: 20px; color: #ccc; font-weight: bold; margin-top: 0;}
.article-content { font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; 
    margin-bottom: 18px; font-family: HelveticaNeue, sans-serif; }
.article-content a { color: #7f8c4f; font-weight:bold; text-decoration:none; }
.article-content img { max-width: 100% }
.article-content ol, .article-content ul { margin-top:0px; margin-bottom:18px; margin-left:19px; padding:0; }
.article-content li { font-size: 13px; line-height: 18px; color: #444444; }
.article-content li a { color: #7f8c4f; text-decoration:underline; }
.article-content p {margin-bottom: 15px;}
.footer-content-left { font-size: 12px; line-height: 15px; color: #000; margin-top: 0px; margin-bottom: 15px; }
.footer-content-left a { color: #000; font-weight: bold; text-decoration: none; }
.footer-content-right { font-size: 11px; line-height: 16px; color: #000; margin-top: 0px; margin-bottom: 15px; }
.footer-content-right a { color: #000; font-weight: bold; text-decoration: none; }
#footer { background-color: #d5e9e7; color: #000; }
#footer a { color: #000; text-decoration: none; font-weight: bold; }
#permission-reminder { white-space: normal; }
#street-address { color: #000; white-space: normal; }
</style>
<!--[if gte mso 9]>
<style _tmplitem="820" >
.article-content ol, .article-content ul {
   margin: 0 0 0 24px;
   padding: 0;
   list-style-position: inside;
}
</style>
<![endif]--></head><body><table width="100%" cellpadding="0" cellspacing="0" border="0" id="background-table">
    <tbody><tr>
        <td align="center" bgcolor="#ececec">
            <table class="w640" style="margin:0 10px;" width="640" cellpadding="0" cellspacing="0" border="0">
                <tbody><tr><td class="w640" width="640" height="20"></td></tr>
                <tr>
                <td id="header" class="w640" width="640" align="center" bgcolor="#d5e9e7">
    
    <table class="w640" width="640" cellpadding="0" cellspacing="0" border="0">
        <tbody><tr><td class="w30" width="30"></td><td class="w580" width="580" height="30"></td><td class="w30" width="30"></td></tr>
        <tr>
            <td class="w30" width="30"></td>
            <td class="w580" width="580">
                <div align="center" id="headline">
                    <p>
                        <strong><singleline label="Title">'.$subject.'  |  '.$site.'</singleline></strong>
                    </p>
                </div>
            </td>
            <td class="w30" width="30"></td>
        </tr>
    </tbody></table>
    
    
</td>
                </tr>
                <tr id="simple-content-row"><td class="w640" width="640" bgcolor="#ffffff">
    <table class="w640" width="640" cellpadding="0" cellspacing="0" border="0">
        <tbody><tr>
            <td class="w30" width="30"></td>
            <td class="w580" width="580">
                <repeater>                  
                    <layout label="Text only">
                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                            <tbody><tr>
                                <td class="w580" width="580">
                                    <p align="left" class="article-title"><singleline label="Title"><b>Контактные данные:</b></singleline></p>
                                    <div align="left" class="article-content">
                                            <multiline label="Description"><b>Имя:</b> '.$name.'</multiline><br>
                                            <multiline label="Description"><b>Телефон:</b> '.$phone.'</multiline><br>
                                            <multiline label="Description"><b>Email:</b> '.$email.'</multiline><br>
                                            <multiline label="Description"><b>Сайт:</b> '.$sitesa.'</multiline><br>
                                            <multiline label="Description"><b>Вопрос:</b> '.$quest.'</multiline><br>
                                            <multiline label="Description"><b>Форма заказа:</b> '.$action.'</multiline><br>
                                    </div>
                                </td>
                            </tr>
                        </tbody></table>
                    </layout>                       
                    <layout label="Two columns">
                        <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                            <tbody><tr>
                                <td class="w275" width="275" valign="top">
                                    <table class="w325" width="325" cellpadding="0" cellspacing="0" border="0">
                                        <tbody><tr>                                        
                                            <td class="w470" width="470">
                                                <p align="left" class="article-title"><singleline label="Title"><b>UTM-метки:</b></singleline></p>
                                                <div align="left" class="article-content">
                                                    <multiline label="Description"><b>utm_source</b> (рекламная система) = '.$utm_source.'</multiline><br>
                                                    <multiline label="Description"><b>utm_medium</b> (тип трафика) = '.$utm_medium.'</multiline><br>
                                                    <multiline label="Description"><b>utm_campaign</b> (кампания) = '.$utm_campaign.'</multiline><br>
                                                    <multiline label="Description"><b>utm_content</b> (контент) = '.$utm_content.'</multiline><br>
                                                    <multiline label="Description"><b>utm_term</b> (доп поле) = '.$utm_term.'</multiline><br>
                                                    <multiline label="Description"><b>block</b> (спецразмещение или гарантия) = '.$block.'</multiline><br>
                                                    <multiline label="Description"><b>position</b> (номер позиции объявления) = '.$position.'</multiline><br>
                                                    <multiline label="Description"><b>keyword</b> (ключевое слово) = '.$keyword.'</multiline>
                                                </div>
                                            </td>                                          
                                        </tr>
                                        <tr><td class="w275" width="275" height="10"></td></tr>
                                    </tbody></table>
                                </td>
                            </tr>
                        </tbody></table>
                    </layout>
                </repeater>
            </td>
            <td class="w30" width="30"></td>
        </tr>
    </tbody></table>
</td></tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table></body></html>  
';
/* тело письма */

/* тело письма автоответ клиенту */
/*$return_msg='Спасибо за обращение в компанию LandingPage.bz<br>Ваша заявка принята!'*/

// $return_msg='Здравствуйте '.$name.'! <br>
// Вы оставили заявку на консультацию по улучшению клиентского сервиса. <br>
// Наши специалисты свяжутся с Вами в ближайшее время. <br>
// С уважением, команда CRM Expert';
/* тело письма автоответ клиенту */


/* отправка основного сообщения через класс */
$mail = new PHPMailer();
$mail->IsMail();
$mail->AddReplyTo($email,$email);
$mail->AddAddress($emailAddress);
$mail->AddCC($emailCC);
$mail->SetFrom($email,$email);
$mail->Subject = $subject." |  от ".$email;
if(isset($_FILES['files'])) {
    if($_FILES['files']['error'] == 0) {
        $mail->AddAttachment($_FILES['files']['tmp_name'],$_FILES['files']['name']);
    }
}
$mail->MsgHTML($msg);
$mail->Send();
/* отправка основного сообщения через класс */
/* отправка уведомления для клиента через класс */


$mail1 = new PHPMailer();
$mail1->IsMail();
//тут
$mail1->AddReplyTo($emailAddress,$emailAddress);
$mail1->AddAddress($email);
//тут
$mail1->SetFrom($emailAddress,$emailAddress);
$mail1->Subject = "Ваша заявка принята";
$mail1->MsgHTML($return_msg);
//$mail1->Send();       

/* отправка уведомления для клиента через класс */
/* отправка уведомления для клиента через класс */



$emailSent = true;
?>
