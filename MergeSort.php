<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 2018/3/15
 * Time: 18:10
 */

namespace Sort;

/**
 * 归并排序
 * Class MergeSort
 * @package Sort
 */
class MergeSort extends Sort
{

    /**
     * 优化
     *  1. 小数组使用插入排序
     *  2. 左边最后一个比右边第一个小，则说明已经完全排好序，直接合并即可
     * @param array $arr
     *
     * @return array
     */
    public function sort($arr = [])
    {
        $this->setArr($arr);
        if ($this->length < 2) return $this->arr;

        $middle = floor($this->length / 2);
        $lt = array_slice($this->arr, 0, $middle);
        $gt = array_slice($this->arr, $middle);

        return $this->merge($this->sort($lt), $this->sort($gt));
        //        $left = $right = clone $this;
//        return $this->merge($left->setArr($lt)->sort(), $right->setArr($gt)->sort());
    }

    private function merge($left, $right)
    {
        $result = [];
        while (isset($left[0]) && isset($right[0])) {
            if($left[0] <= $right[0]){
                $result[] = array_shift($left);
            }else{
                $result[] = array_shift($right);
            }
        }

        while ($temp = array_shift($left)) {
            $result[] = $temp;
        }

        while ($temp = array_shift($right)) {
            $result[] = $temp;
        }

        return $result;
    }

    /**
     * 自底向上底归并排序
     */
    public function sort2()
    {
        $arr = $this->arr;
        for ($i = 1; $i < $this->length; $i+=$i) {
            for ($j = 0; $j < $this->length; $j += 2 * $i) {
                $end = min($j + 2 * $i - 1, $this->length - 1);
                $left = array_slice($arr, $i, $j + $i - 1);
                $right = array_slice($arr, $j + $i - 1, $end);
            }
        }
        return $arr;
    }
}