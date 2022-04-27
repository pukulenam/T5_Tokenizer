<?php

include($_SERVER['DOCUMENT_ROOT'] . '/T5_Tokenizer/frontend' . '/assets/php/Appointment.php');

$object = new Appointment;

$gen_unum = strtoupper(substr(md5(uniqid()), 0, 4));
$data = array(
    ':var2' => $gen_unum,
    ':var1' => $_POST["varone"]
);

$object->query = "
	INSERT INTO test_tbl 
	(var1, var2) 
	VALUES 
	(:var1, :var2)
	";

$object->execute($data);

$command = escapeshellcmd('test.py' . json_encode($_POST["varone"]));
$output = shell_exec($command);

$data = array(
    ':var3'		=>	json_decode($output)
);

$object->query = "
	UPDATE test_tbl
	SET var3 = :var3
	WHERE var2 = '" . $gen_unum . "'
	";

$object->execute($data);


