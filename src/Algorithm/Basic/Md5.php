<?php
/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 9/26/2017
 * Time: 12:05 AM
 */
namespace GSRO\CryptoFun\Algorithm\Basic;

use GSRO\CryptoFun\Algorithm\AlgorithmInterface;

class Md5 implements AlgorithmInterface
{
    // protected $charlist =
    // 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890`~!@#$%^&*()-_=+[{]};:\\\'",<.>/?';

    public function __invoke($a)
    {
        return md5($a);
    }
}
