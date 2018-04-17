<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 2018/3/15
 * Time: 15:14
 */

namespace Sort;

/**
 * 插入排序
 *  最好情况：O(n)
 *  最坏情况：O(n^2)
 *  平均情况：O(n^2)
 * Class InsertSort
 * @package Sort
 */
class InsertSort extends Sort
{

    public function sort($arr = [])
    {
        for ($i = 1; $i < $this->length; $i++) {
            $temp = $this->arr[$i];
            for ($j = $i - 1; $j >= 0 && $temp < $this->arr[$j]; $j--) {
                $this->arr[$j + 1] = $this->arr[$j];
            }
            $this->arr[$j + 1] = $temp;
        }
        return $this->arr;
    }
}
