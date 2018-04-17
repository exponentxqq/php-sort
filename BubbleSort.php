<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 2018/3/15
 * Time: 14:31
 */

namespace Sort;

/**
 * 冒泡排序
 * Class BubbleSort
 * @package Sort
 */
class BubbleSort extends Sort
{
    public function sort()
    {
        for ($i = 0; $i < $this->length; $i++) {
            for ($j = 0; $j < $this->length - $i - 1; $j++) {
                if ($this->arr[$j] > $this->arr[$j + 1]) {
                    $this->cycle_count++;
                    $this->swap($j, $j + 1);
                }
            }
        }
        return $this->arr;
    }
}