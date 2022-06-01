<?php

include('../assets/config.php');

$object = new Syst;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["token"])) {

        $status = '';
        $msg = '';
        $resp = '';

        $do_checkapi = $object->checkapi($_POST["token"]);
        if ($do_checkapi) {
            if (isset($_POST["data"])) {
                $status = '0';
                $msg = 'Hey Go Pass';
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
        'msg'        =>    $msg,
        'resp'        =>    $resp
    );
    echo json_encode($output);
}
