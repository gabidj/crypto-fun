<?php
/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 9/26/2017
 * Time: 12:15 AM
 */

namespace cmd;


use GSRO\CryptoFun\Iterator\WordIterator;

require ('vendor/autoload.php');

$iterator = new WordIterator('abcdef');

echo $iterator->nextWord('cbabc');
