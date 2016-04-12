<?php

$req_dump = "\nЗапрос от: ".date("d-m-Y H:i:s")."\n";
$req_dump .= print_r( $_REQUEST, true );
$req_dump .= "============================================================";
$fp = file_put_contents( 'request.log', $req_dump, FILE_APPEND);

/*

https://wiki.k50.ru/index.php?title=%D0%92%D1%8B%D0%B3%D1%80%D1%83%D0%B7%D0%BA%D0%B0_%D0%B7%D0%B0%D0%BA%D0%B0%D0%B7%D0%BE%D0%B2_%D0%B8%D0%B7_CRM

-date*   - дата заказа в формате ГГГГ-ММ-ДД (2014-12-02) +
-orderId* - id заказа в системе crm клиента +
-referrer* - внешняя страница с которой был осуществлен переход приведший к продаже -/+
-landing* - страница сайта на которую был осуществлен переход с метками и дополнительными параметрами с utm и доп параметрами -
-amount - количество товаров в заказе всего +
-margin - суммарная прибыль(маржа) с заказа +
-revenue - суммарная стоимость заказа +
-goodsInOrder - идентификаторы уникальных товаров в заказе +
-goodsQuantityInOrder - количество каждого уникального товара в заказе через запятую(например при покупке 1 ручку и 2 тетрадей, значение 1,2) +
-goodsPriceInOrder - стоимость каждого уникального товара в заказе через запятую +
-goodsMarginInOrder - маржа с каждого уникального товара в заказе через запятую
-trackCode - уникальный код захода
-goal_1 - произвольный дополнительный параметр, должен содержать числовой формат данных
-goal_2 - произвольный дополнительный параметр, должен содержать числовой формат данных
-goal_3 - произвольный дополнительный параметр, должен содержать числовой формат данных
-goal_4 - произвольный дополнительный параметр, должен содержать числовой формат данных
-goal_5 - произвольный дополнительный параметр, должен содержать числовой формат данных
*/

$date = $_REQUEST['order_createdat'];
$orderId = $_REQUEST['order_number'];
$referrer = "";

$landing = "http://russia-converse.ru/";
$utm_array = array('utm_source' => $_REQUEST['order_utm_source'], 'utm_medium' => $_REQUEST['order_utm_medium'], 'utm_campaign' => $_REQUEST['order_utm_campaign'], 'utm_content' => $_REQUEST['order_utm_content'], 'utm_term' => $_REQUEST['order_utm_term']);
$utm_query_str = http_build_query($utm_array);
if($utm_query_str != "") {
    $landing = $landing. "?" . $utm_query_str;
}

$amount = $_REQUEST['order_quantity'];
$margin = $_REQUEST['order_marginsumm'];
$revenue = $_REQUEST['order_totalsumm'];
$goodsInOrder = $_REQUEST['order_products_code'];
$goodsQuantityInOrder = $_REQUEST['order_products_quantity'];
$goodsPriceInOrder = $_REQUEST['order_products_price'];
$goodsMarginInOrder = $_REQUEST['order_products_margin'];

$trackCode = "";

$goal_1 = "";
$goal_2 = "";
$goal_3 = "";
$goal_4 = "";
$goal_5 = "";

$order_site_code = $_REQUEST['order_site_code'];

if($order_site_code == 'russia-converse-ru') {
    
    $fields_array = array($date, $orderId, $referrer, $landing, $amount, $margin, $revenue, $goodsInOrder, $goodsQuantityInOrder, $goodsPriceInOrder, $goodsMarginInOrder, $trackCode, $goal_1, $goal_2, $goal_3, $goal_4, $goal_5);
    
    $handle = fopen($order_site_code.".csv", "a");
    fputcsv($handle, $fields_array, ";");
    fclose($handle);
    
}

