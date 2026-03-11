<?php
require('src/CsvParser.php');
require('src/VatProcessor.php');
require('src/Database.php');
require('src/VatRepository.php');
require('src/CsvUploadHandler.php');

$config = require('config/database.php');
$db     = new Database($config);
$handler = new CsvUploadHandler(
    new CsvParser(),
    new VatProcessor(),
    new VatRepository($db->getInstance())
);

$handler->handle($_FILES, $_SERVER);