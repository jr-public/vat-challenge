<?php
require('src/Database.php');
require('src/VatRepository.php');

$config 	= require('config/database.php');
$db 		= new Database($config);
$vatRepo 	= new VatRepository($db->getInstance());

$valid    	= $vatRepo->listByStatus('valid');
$corrected 	= $vatRepo->listByStatus('corrected');
$invalid  	= $vatRepo->listByStatus('invalid');

require('views/results.php');
