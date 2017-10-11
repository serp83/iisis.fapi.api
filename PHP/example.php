<?php
/**
 * Created
 * User: TSN
 * Date: 08.10.2017
 * Time: 23:09
 */

class Fapi
{

    public static function getObjectList($number, $ui) {
        $curl = curl_init(); // Инициализируем запрос
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://fapi.iisis.ru/fapi/v2/analogList?n='.$number.'&ui=' . $ui, // Полный адрес метода
            CURLOPT_RETURNTRANSFER => true, // Возвращать ответ
            CURLOPT_POST => false,
        ));
        $response = curl_exec($curl); // Выполненяем запрос

        $response = json_decode($response, false); // Декодируем из JSON
        curl_close($curl); // Закрываем соединение
        return $response; // Возвращаем ответ
    }


}

$number = "w753";
$ui = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$result =  Fapi::getObjectList($number, $ui);

foreach ($result->analogList->a as  $row){
    echo '<pre>';
    echo "PRODUCT: " . $result->manufacturerList->mf[$row->mfi]->ds ." / " . $row->ns . " / ". $result->productList->p[$row->pi]->d . " ANALOG: ". $result->manufacturerList->mf[$row->mfai]->ds . " / " . $row->nsa . " / " . $result->productList->p[$row->pai]->d;
    echo '</pre>';
}