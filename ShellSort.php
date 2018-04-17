<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 2018/3/15
 * Time: 16:33
 */

namespace Sort;

/**
 * 希尔排序
 * Class ShellSort
 * @package Sort
 */
class ShellSort extends Sort
{

    public function sort($arr = [])
    {
        $this->setArr($arr);
        $gap = 1;
//        while ($gap < $this->length / 3) {
//            $gap = $gap * 3 + 1;
//        }

        // 第一层循环分区
        for ($gap = floor($this->length / 2); $gap > 0; $gap = floor($gap / 2)) {
            // 第二层查询开始插入排序
            for ($i = $gap; $i < $this->length; $i++) {
                $temp = $this->arr[(int)$i];
                for ($j = $i - $gap; $j >= 0 && $this->arr[$j] > $temp; $j -= $gap) {
                    $this->arr[(int)$j + $gap] = $this->arr[$j];
                }
                $this->arr[(int)$j + $gap] = $temp;
            }
        }

        return $this->arr;
    }
}