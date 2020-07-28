<?php 

	// SESSION START
	if (!session_id()) session_start();

	// memanggil file 'init.php' yg akan meload seluruh file terkait
	require_once '../app/init.php';

	// instansiasi class 'App'
	$app = new App();