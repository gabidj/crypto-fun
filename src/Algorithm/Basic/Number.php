<?php
/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 9/26/2017
 * Time: 12:05 AM
 */
namespace GSRO\CryptoFun\Algorithm\Basic;

use GSRO\CryptoFun\Algorithm\AlgorithmInterface;

class Number implements AlgorithmInterface
{
    /**
     * @var array
     */
    protected $storage = [];

    /**
     * @return array
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param array $storage
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;
    }

    /**
     * Checks if a duplicate exists in array
     *
     * @param array $storage
     * @return bool
     */
    public function checkStorage(array $storage = null)
    {
        if ($storage === null) {
            $storage = $this->getStorage();
        }
        $count = array_count_values($storage);
        $mirror = array_flip($count);
        return (isset($mirror[2]));
    }

    /**
     * Clear storage
     *
     * @return bool
     */
    public function clearStorage()
    {
        $this->storage = [];
        return true;
    }


    public function __invoke($a)
    {
        $this->storage[] = $a;
        if ($a == 1 || $a == 0) {
            return $a;
        }
        if ($a % 2 === 0) {
            return $this($a/2);
        }
        return $this($a*3+1);
    }
}
