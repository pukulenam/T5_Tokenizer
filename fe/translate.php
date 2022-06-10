<?php
// Pengujian tanpa GCP Google Translate API

//include('assets/php/config.php');

//Query params
$q = $_REQUEST["q"];

function translate($from_lan, $to_lan, $text){
    $json = json_decode(file_get_contents('https://ajax.googleapis.com/ajax/services/language/translate?v=1.0&q=' . urlencode($text) . '&langpair=' . $from_lan . '|' . $to_lan));
    $translated_text = $json->responseData->translatedText;

    return $translated_text;
}

echo translate("id","en", $q);
?>