<?php
require '../vendor/autoload.php';
include('assets/php/config.php');
use Google\Cloud\Translate\V2\TranslateClient;

$object = new Syst;

if (isset($_POST["action"])) {

	$alert = '';
	$error = '';
	$success = '';

	if ($_POST["action"] == 'sessioncheck') {

		if (!isset($_COOKIE['sesid'])) {

			$object->destroy_ses();

			$newsesid = $object->newuser();
			setcookie('sesid', $newsesid, time() + (86400 * 30), "/");
			$_SESSION['sesid'] = $newsesid;

			$token = md5($newsesid . $_SERVER['HTTP_USER_AGENT'] . $object->client_ip()); //Not yet utilized
			setcookie('token', $token, time() + (86400 * 30), "/");

			$alert = 'alert alert-success';
			$success = 'Halo Selamat Datang di T5Tokenizer News Summarization';
		} else {

			$sesid = $_COOKIE['sesid'];

			$object->query = "
				SELECT user_tbl.user_sesid
				FROM user_tbl
				WHERE user_sesid = '" . $sesid . "'
				";

			$object->execute();

			if ($object->row_count() > 0) {

				if ($object->ses_init()) {

					$alert = 'alert alert-success';
					$success = 'Halo Anda Masih Disini';
				} else {

					$_SESSION['sesid'] = $sesid;

					$object->query = "
					UPDATE user_tbl 
					SET user_lastlogin = NOW() 
					WHERE user_sesid = '" . $sesid . "'
					";

					$object->execute();

					$object->makelog('User Relogin');

					$alert = 'alert alert-success';
					$success = 'Halo Selamat Datang Kembali';
				}
			} else {

				$object->destroy_ses();

				$newsesid = $object->newuser();
				$_SESSION['sesid'] = $newsesid;
				$object->makelog('New User : ' . $newsesid);
				setcookie('sesid', $newsesid, time() + (86400 * 30), "/");

				$alert = 'alert alert-success';
				$success = 'Halo Selamat Datang di T5Tokenizer News Summarization';
			}
		}

		$output = array(
			'alert'		=>  $alert,
			'error'		=>	$error,
			'success'	=>	$success
		);
	} elseif ($_POST["action"] == 'newrequest') {

		$resp_act = '';

		if (isset($_SESSION['sesid'])) {

			function checkinput($max_length, $repetition_penalty, $num_beam, $news)
			{
				if (isset($max_length) && isset($repetition_penalty) && isset($num_beam) && isset($news)) {
					if (!empty($max_length) && !empty($repetition_penalty) && !empty($num_beam) && !empty($news)) {
						if (($max_length >= 50 && $max_length <= 150) && ($repetition_penalty >= 0 && $repetition_penalty <= 3) && ($num_beam >= 1 && $num_beam <= 10)) {
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

			if (!isset($_POST["cbx"])) {
				$cbx = 0;
			} else {
				$cbx = $_POST["cbx"];
			}

			$gen_req_uniqid = strtoupper(substr(md5(uniqid()), 0, 8));

			$logdata = 'New Request : ' . $gen_req_uniqid;

			$object->makelog($logdata);

			$max_length = $_POST["varone"];
			$repetition_penalty = $_POST["vartwo"];
			$num_beam = $_POST["varthree"];
			$early_stopping = $cbx;
			$news = $object->clean_input($_POST["lt"]);

			$data = array(
				':max_length' => $max_length,
				':repetition_penalty' => $repetition_penalty,
				':num_beam' => $num_beam,
				':early_stopping' => $early_stopping,
				':news' => $news
			);

			$pydata = json_encode($data);
			$enc_pydata = base64_encode($pydata);
			$command = '/data/www/t5/t5venv/bin/python3 predict.py '.$enc_pydata;

			if (checkinput($max_length, $repetition_penalty, $num_beam, $news)) {
				$object->query = "
				INSERT INTO req_tbl 
				(req_sesid, req_uniqid, req_var1, req_var2, req_var3, req_cb1, req_news) 
				VALUES 
				('" . $_SESSION['sesid'] . "', '" . $gen_req_uniqid . "', :max_length, :repetition_penalty, :num_beam, :early_stopping, :news)
				";

				$object->execute($data);

				$i = 0;
				$summarized_news = '';

				do {
					$summarized_news = shell_exec($command);
					$i++;
				} while (empty($summarized_news) && $i <= 3);

				if (!empty($summarized_news)) {

					$object->query = "
					UPDATE req_tbl 
					SET req_sum = '" . $summarized_news . "' 
					WHERE req_uniqid = '" . $gen_req_uniqid . "'
					";

					$object->execute();

					$resp_act = 'ok';
					$alert = 'alert alert-success';
					$success = 'Request ' . $gen_req_uniqid . ' Return Success with ' . $i . ' tries';

					$output = array(
						'respact'	=> $resp_act,
						'r_json'	=> $pydata,
						'r_encbsix' => $enc_pydata,
						'sumtext'	=>  $summarized_news,
						'requniqid' => $gen_req_uniqid,
						'alert'		=>  $alert,
						'error'		=>	$error,
						'success'	=>	$success
					);
				} else {
					$resp_act = 'ok';
					$alert = 'alert alert-danger';
					$error = 'Request ' . $gen_req_uniqid . ' Returning Blank After ' . $i . ' tries. Please Try Again.';
					$output = array(
						'r_json'	=> $pydata,
						'r_encbsix' => $enc_pydata,
						'respact'	=> $resp_act,
						'alert'		=>  $alert,
						'error'		=>	$error,
						'success'	=>	$success
					);
				}
			} else {
				$resp_act = 'ok';
				$alert = 'alert alert-danger';
				$error = 'Invalid Configuration or Data';
				$output = array(
					'respact'	=> $resp_act,
					'alert'		=>  $alert,
					'error'		=>	$error,
					'success'	=>	$success
				);
			}
		} else {

			$resp_act = 'refresh';
			$alert = 'alert alert-danger';
			$error = 'Something Went Wrong';

			$output = array(
				'respact'	=> $resp_act,
				'alert'		=>  $alert,
				'error'		=>	$error,
				'success'	=>	$success
			);
		}
	

	}else if($_POST["action"] == 'trnsumnews'){
		if (isset($_POST["requniqid"]) && !empty($_POST["requniqid"])){

			$requniqid = $object->clean_input($_POST['requniqid']);

			$object->query = "
				SELECT req_tbl.req_sesid, req_tbl.req_uniqid, req_tbl.req_sum
				FROM req_tbl
				WHERE req_sesid = '".$_SESSION['sesid']."' AND req_uniqid = '".$_POST['requniqid']."'
				";

			$object->execute();

			if ($object->row_count() > 0) {
				$result = $object->get_result();
				foreach ($result as $row) {
					$news_sum = $row['req_sum'];
				}

			}

			$translate = new TranslateClient([
				'keyFile' => json_decode(file_get_contents('../g_assets/t5tokenizer-3f80d3cec1eb.json'), true)
			]);
			
			$source_body = $news_sum;
			$source_lang = 'en';
			$target_lang = 'id';
			
			$resultnewstrans = $translate->translate($source_body, [
				'source' => $source_lang,
				'target' => $target_lang
			]);

			$resp_act = 'ok';
			$alert = 'alert alert-success';
			$success = 'News Translated';

			$output = array(
				'respact'	=> $resp_act,
				'trnslnews' => $resultnewstrans['text'],
				'alert'		=>  $alert,
				'error'		=>	$error,
				'success'	=>	$success
			);

		}
	}		
	echo json_encode($output);
}
