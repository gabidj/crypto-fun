<?php
/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 9/26/2017
 * Time: 12:15 AM
 */

// namespace added for php storm use statement auto-insert
namespace cmd;

use GSRO\CryptoFun\Algorithm\Basic\Number;

require ('vendor/autoload.php');


$numberAlgo = new Number();
$config = include ('config/autoload/number.local.php');
$storageDir = $config['storage_dir'];

$currentProgress = 1;
if (file_exists($storageDir . '/__progress.txt')) {
    $fp = fopen($storageDir . '/__progress.txt', 'r');
    $currentProgress = fread($fp, filesize($storageDir . '/__progress.txt'));
    fclose($fp);
}

$a = $currentProgress;

while (1) {
    $numberAlgo($a);
    $fp = fopen($storageDir.'/__progress.txt', 'w');
    fwrite($fp, $a);
    fclose($fp);
    $fp = fopen($storageDir.'results-jsons.dat', 'a');
    fwrite($fp, \sprintf("\n%020d", $a) . "\n" . json_encode($numberAlgo->getStorage()));
    $numberAlgo->clearStorage();
    fclose($fp);
    ++$a;
}
