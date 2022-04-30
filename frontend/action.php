<?php

include('assets/php/config.php');

$object = new Syst;

if (isset($_POST["action"])) {

	$alert = '';
	$error = '';
	$success = '';

	if ($_POST["action"] == 'sessioncheck') {
		if ($object->ses_init()) {

			$alert = 'alert alert-success';
			$success = 'Halo Selamat Datang Kembali';

		} else {
			$gen_sessionid = strtoupper(substr(md5(uniqid()), 0, 12));
			$_SESSION['sesid'] = $gen_sessionid;

			$alert = 'alert alert-success';
			$success = 'Halo Selamat Datang di T5Tokenizer News Summarization';
		}

		$output = array(
			'alert'		=>  $alert,
			'error'		=>	$error,
			'success'	=>	$success
		);
	}
	echo json_encode($output);
}
