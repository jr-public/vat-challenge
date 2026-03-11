<?php
require('src/VatProcessor.php');

$vat 	= $_POST['vat_number'] ?? '';
$vatProcessor = new VatProcessor();
$result = $vatProcessor->process($vat);

require('views/single.php');