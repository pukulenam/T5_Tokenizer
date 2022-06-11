<?php 
require '../vendor/autoload.php';
use Google\Cloud\Translate\V2\TranslateClient;

$translate = new TranslateClient([
    'keyFile' => json_decode(file_get_contents('../g_assets/t5tokenizer-9c070d9d82ad.json'), true)
]);

$source_body = 'Kementerian Komunikasi dan Informatika (Kominfo) memberi lampu hijau pada layanan internet Starlink milik Elon Musk untuk masuk Indonesia. Namun, ada syarat yang wajib dipenuhi layanan tersebut agar bisa beroperasi.

Internet Starlink bisa masuk melalui PT Telkom Satelit Indonesia (Telkomsat). Layanan internet Starlink tersebut nantinya bukan tersedia untuk pelanggan retail, melainkan untuk jaringan tetap tertutup.

Menurut Menteri Komunikasi dan Informatika, Johnny Plate, Kominfo memberikan Hak Labuh Satelit Khusus Non Geostationer (NGSO) kepada PT Telkom Satelit Indonesia (Telkomsat) sebagai pengguna korporat backhaul dalam penyelenggaraan jaringan internet Starlink.';
$source_lang = 'id';
$target_lang = 'en';

$result = $translate->translate($source_body, [
    'source' => $source_lang,
    'target' => $target_lang
]);

echo $result['text'];