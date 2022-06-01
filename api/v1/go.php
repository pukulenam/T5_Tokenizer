<?php

include('../assets/config.php');

$object = new Syst;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["token"])) {

        $status = '';
        $msg = '';
        $resp = '';

        $do_checkapi = $object->checkapi($_POST["token"]);
        if ($do_checkapi === true) {
            if (isset($_POST["data"])) {

                $e = json_decode($_POST["data"], true);

                $varone = $e['varone'];
                    $vartwo = $e['vartwo'];
                    $varthree = $e['varthree'];
                    $cbx = $e['cbx'];
                    $cby = $e['cby'];
                    $cbyn = $e['cbyn'];
                    $news = $e['news'];

                $b_msg = 'Hey Thankyou for sending a request to us :D, Here is your request Details : v1='.$varone.' v2='.$vartwo.' v3='.$varthree.' cbx='.$cbx.' cby='.$cby.' cbyn='.$cbyn.' news='.$news;
                
                $status = '1';
                $msg = $b_msg;
                $resp = '';
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
        'token'    =>  $token,
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

}
