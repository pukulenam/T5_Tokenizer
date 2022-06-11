<?php 
require '../vendor/autoload.php';
use Google\Cloud\Translate\V2\TranslateClient;

$translate = new TranslateClient([
    'keyFile' => json_decode(file_get_contents('../g_assets/t5tokenizer-feecafca17ba.json'), true)
]);

$source_body = 'Hai Guys, Namaku';
$source_lang = 'id';

$result = $translate->translate($source_body, [
    'target' => 'fr'
]);

echo $result;