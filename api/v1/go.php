<?php

include('../assets/config.php');

$object = new Syst;

function getAuthorizationHeader(){
    $headers = null;
    if (isset($_SERVER['Authorization'])) {
        $headers = trim($_SERVER["Authorization"]);
    }
    else if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
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

function getBearerToken() {
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

            $req_body = file_get_contents('php://input');
            $dec_body = json_decode($req_body, true);
            $data = $dec_body["data"];
            if (isset($data)) {

                $varone = $data['varone'];
                    $vartwo = $data['vartwo'];
                    $varthree = $data['varthree'];
                    $cbx = $data['cbx'];
                    $cby = $data['cby'];
                    $cbyn = $data['cbyn'];
                    $news = $data['news'];

                $b_msg = 'Request OK';
                $b_resp = 'Hey Thankyou for sending a request to us :D, Here is your request Details : v1='.$varone.' v2='.$vartwo.' v3='.$varthree.' cbx='.$cbx.' cby='.$cby.' cbyn='.$cbyn.' news='.$news;
                
                $status = '1';
                $msg = $b_msg;
                $resp = $b_resp;
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
    }else{
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

}else if ($_SERVER['REQUEST_METHOD'] == 'GET'){

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
