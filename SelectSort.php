<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 2018/3/15
 * Time: 14:51
 */

namespace Sort;


class SelectSort extends Sort
{

    public function sort()
    {
        for ($i = 0; $i < $this->length; $i++) {
            $key = $i;
            for ($j = $i + 1; $j < $this->length; $j++) {
                if ($this->arr[$key] > $this->arr[$j]) {
                    $this->cycle_count++;
                    $key = $j;
                }
            }
            $this->swap($i, $key);
        }
        return $this->arr;
    }
}