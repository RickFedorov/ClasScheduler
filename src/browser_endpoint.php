<?php
namespace ClasScheduler;

if (! array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

print_r($_REQUEST);
print_r( $_SERVER);

require_once './Portal.php';

$portal = new Portal($_REQUEST , $_SERVER);
echo $portal->process();



