<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 2018/3/15
 * Time: 11:48
 */

namespace Sort;

abstract class Sort
{

    protected $arr = [];
    protected $length = 0;

    protected $cycle_count = 0;

    abstract public function sort();

    public function __construct($arr = [])
    {
        $this->arr = $arr;
        $this->length = count($arr);
    }

    public function __clone()
    {
        $this->arr = [];
        $this->length = 0;
    }

    public function setArr($arr)
    {
        $this->arr = empty($arr) ? $this->arr : $arr;
        $this->length = count($this->arr);
        return $this;
    }

    public function swap($i, $j)
    {
        if($i < 0 || $j < 0 || $j > $this->length || $i > $this->length){
            return ;
        }
        $temp = $this->arr[$i];
        $this->arr[$i] = $this->arr[$j];
        $this->arr[$j] = $temp;
    }

    public function getCycleCount()
    {
        return $this->cycle_count;
    }

    /**
     * 生成一个n位的随机数组
     * @param $n
     *
     * @return array
     */
    public static function generateRandomArray($n)
    {
        $list = [];
        for ($i = 0; $i < $n; $i++){
            $list[] = rand();
        }
        return $list;
    }

    /**
     * 生成一个可控制混乱度的随机数组
     * @param      $n
     * @param bool $swapTimes
     *
     * @return array
     */
    public static function generateNearlyOrderedIntArray($n,$swapTimes = false) {
        $arr = [];
        for ($i=0; $i<$n; $i++) {
            $arr[] = $i;
        }
        if($swapTimes === false){
            $swapTimes = floor($n / 5);
        }
        //交换数组中的任意两个元素
        for ($i=0; $i<$swapTimes; $i++) {
            $indexA = rand() % $n;
            $indexB = rand() % $n;
            $tmp = $arr[$indexA];
            $arr[$indexA] = $arr[$indexB];
            $arr[$indexB] = $tmp;
        }
        return $arr;
    }
}