<?php
require '../../vendor/autoload.php';
include('../assets/config.php');

use Google\Cloud\Translate\V2\TranslateClient;

$object = new Syst;

function getAuthorizationHeader()
{
    $headers = null;
    if (isset($_SERVER['Authorization'])) {
        $headers = trim($_SERVER["Authorization"]);
    } else if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
        $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
    } elseif (function_exists('apache_request_headers')) {
        $requestHeaders = apache_request_headers();
        $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
        if (isset($requestHeaders['Authorization'])) {
            $headers = trim($requestHeaders['Authorization']);
        }
    }
    return $headers;
}

function getBearerToken()
{
    $headers = getAuthorizationHeader();
    if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }
    return null;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bearer_token = getBearerToken();
    if (!empty($bearer_token)) {

        $status = '';
        $msg = '';
        $resp = '';
        $do_checkapi = $object->checkapi($bearer_token);
        if ($do_checkapi === true) {

            $object->query = "
				SELECT api_tbl.api_sesid, api_tbl.api_token
				FROM api_tbl
				WHERE api_token = '" . $bearer_token . "'
				";

            $object->execute();

            if ($object->row_count() > 0) {
                $result = $object->statement_result();

                foreach ($result as $r) {
                    $api_sesid = $r['api_sesid'];
                }
            }

            $req_body = file_get_contents('php://input');
            $dec_body = json_decode($req_body, true);
            $data = $dec_body["data"];
            if (isset($data)) {

                $max_length = $data["max_length"] + 0;
                $repetition_penalty = $data["repetition_penalty"] + 0;
                $num_beam = $data["num_beam"] + 0;
                $early_stopping =  $data["early_stopping"] + 0;
                $out_lang = $data['out_lang'];
                $news = $data['news'];

                function checkinput($max_length, $repetition_penalty, $num_beam, $early_stopping, $out_lang, $news)
                {
                    if (isset($max_length) && isset($repetition_penalty) && isset($num_beam) && isset($early_stopping) && isset($news) && isset($out_lang)) {
                        if (!empty($max_length) && !empty($repetition_penalty) && !empty($num_beam) && !empty($early_stopping) && !empty($news) && !empty($out_lang)) {
                            if (($max_length >= 50 && $max_length <= 150) && ($repetition_penalty >= 0 && $repetition_penalty <= 3) && ($num_beam >= 1 && $num_beam <= 10) && ($early_stopping >= 0 && $early_stopping <= 1) && ($out_lang == 'id' || $out_lang == 'en')) {
                                return true;
                            } else {
                                return false;
                            }
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                };


                $data = array(
                    ':max_length' => $max_length,
                    ':repetition_penalty' => $repetition_penalty,
                    ':num_beam' => $num_beam,
                    ':early_stopping' => $early_stopping,
                    ':news' => $news
                );

                $summarized_news = '';

                $pydata = json_encode($data);
                $enc_pydata = base64_encode($pydata);
                $command = '/data/www/t5/t5venv/bin/python3 /data/www/t5/T5_Tokenizer/ml/predict.py '.$enc_pydata;

                $gen_req_uniqid = strtoupper(substr(md5(uniqid()), 0, 8));

                if (checkinput($max_length, $repetition_penalty, $num_beam, $early_stopping, $out_lang, $news)) {
                    $object->query = "
                    INSERT INTO req_tbl 
                    (req_sesid, req_uniqid, req_var1, req_var2, req_var3, req_cb1, req_news) 
                    VALUES 
                    ('" . $api_sesid . "', '" . $gen_req_uniqid . "', :max_length, :repetition_penalty, :num_beam, :early_stopping, :news)
                    ";

                    $object->execute($data);

                    $i = 0;

                    do {
                        $summarized_news = 'Testing OK';
                        //$summarized_news = shell_exec($command);
                        $i++;
                    } while (empty($summarized_news) && $i <= 3);

                    if (!empty($summarized_news)) {

                        $object->query = "
                        UPDATE req_tbl 
                        SET req_sum = '" . $summarized_news . "' 
                        WHERE req_uniqid = '" . $gen_req_uniqid . "'
                        ";

                        $object->execute();

                        if ($out_lang == 'id') {

                            $translate = new TranslateClient([
                                'keyFile' => json_decode(file_get_contents('../../g_assets/t5tokenizer-3f80d3cec1eb.json'), true)
                            ]);

                            $source_body = $summarized_news;
                            $source_lang = 'en';
                            $target_lang = 'id';

                            $resultnewstrans = $translate->translate($source_body, [
                                'source' => $source_lang,
                                'target' => $target_lang
                            ]);

                            $b_resp = $resultnewstrans['text'];
                        } else {
                            $b_resp = $summarized_news;
                        }

                        $b_msg = 'Request ' . $gen_req_uniqid . ' Return Success with ' . $i . ' tries';

                        $status = '1';
                        $msg = $b_msg;
                        $resp = $b_resp;
                    }
                } else {
                    $status = '0';
                    $msg = 'Invalid Configuration or Data';
                    $resp = '';
                }
            } else {
                $status = '0';
                $msg = 'Data not Initialized';
                $resp = '';
            }
        } else {
            $status = '0';
            $msg = $do_checkapi;
            $resp = '';
        }
    } else {
        $status = '0';
        $msg = 'Token not init';
        $resp = '';
    }

    $output = array(
        'status'    =>  $status,
        'msg'       =>    $msg,
        'resp'      =>    $resp
    );
    echo json_encode($output);

} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $data = array(
        'varone' => 1.5,
        'vartwo' => 3,
        'varthree' => 4.5,
        'cby' => 1,
        'cbx' => 0,
        'cbyn' => 0,
        'news' => 'Hello Were from blablabla'
    );

    $token = 'vvv';

    $output = array(
        'data'      =>  $data
    );
    $encoded =  json_encode($output);
    echo $encoded;
    echo '<br>';
    $in = json_decode($encoded, true);
    echo $in['token'];
    echo '<br>';
    $dt = $in['data']['news'];
    echo $dt;

    echo json_encode($data);
}
