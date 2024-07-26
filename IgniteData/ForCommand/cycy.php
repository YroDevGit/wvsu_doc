<?php

function getCommandText(){
$jsonFilePath = 'IgniteData\ForCommand\command.json';


$jsonContent = file_get_contents($jsonFilePath);

$data = json_decode($jsonContent, true);

if (json_last_error() === JSON_ERROR_NONE) {
    return $data;
} else {
    return 'Error decoding JSON: ' . json_last_error_msg();
}
}

?>