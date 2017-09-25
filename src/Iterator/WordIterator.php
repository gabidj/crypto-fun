<?php
/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 9/26/2017
 * Time: 1:23 AM
 */

namespace GSRO\CryptoFun\Iterator;

////////////////////////////
///
///
///
///
///
///
///  WIP - don't use yet
///
///
///
///
///
///
///
///
///
/// ////////////////////////
class WordIterator
{
    const INDEX_BASE = 16;

    /**
     * @var string
     */
    protected $charlist;

    /**
     * @var string
     */
    protected $progress;

    /**
     * @return string
     */
    public function getCharlist(): string
    {
        return $this->charlist;
    }

    /**
     * @param string $charlist
     */
    public function setCharlist(string $charlist)
    {
        $this->charlist = $charlist;
    }

    /**
     * @return string
     */
    public function getProgress(): string
    {
        return $this->progress;
    }

    /**
     * @param string $progress
     */
    public function setProgress(string $progress)
    {
        $this->progress = $progress;
    }

    /**
     * WordIterator constructor.
     * @param string $charlist
     * @param string $progress
     */
    public function __construct($charlist, $progress = '')
    {
        $this->charlist = $charlist;
        $this->progress = $progress;
    }

    public function wordToInt($word, $charlist = null)
    {
        if ($charlist == null) {
            $charlist = $this->charlist;
        }
        $base = strlen($this->charlist);

        // faster processing
        $wordIndex = '';
        $wordLength = strlen($word);
        for ($i=0; $i<$wordLength; $i++) {
            $wordIndex .= base_convert(strpos($charlist, $word[$i]), $base, self::INDEX_BASE);
        }
        return $wordIndex;
    }

    public function intToWord($int, $charlist = null)
    {
        if ($charlist == null) {
            $charlist = $this->charlist;
        }
        $base = strlen($this->charlist);
        $int = base_convert($int, self::INDEX_BASE, $base);
        // faster processing
        $word = '';
        $int = (string)($int);
        $wordLength = strlen($int);
        for ($i=0; $i<$wordLength; $i++) {
            $word .= $charlist[$int[$i]];
            # $word .= $charlist[base_convert($int[$i], $base, self::INDEX_BASE)];
        }
        return $word;
    }

    public function nextWord($currentWord = null)
    {
        if ($currentWord == null) {
            $currentWord = $this->getProgress();
        }
        return $this->intToWord($this->wordToInt($currentWord)+1);
    }
}