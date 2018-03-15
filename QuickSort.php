<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 2018/3/15
 * Time: 12:19
 */

namespace Sort;


class QuickSort extends Sort
{
    public function sort()
    {
        static $count = 0;
        if($this->length <= 1) return $this->arr;
        $left = $right = clone $this;
        $lt = $gt = [];

        $v = $this->arr[0];

        for ($i = 1; $i < $this->length; $i++){
            $current = $this->arr[$i];
            if($current < $v){
                $lt[] = $this->arr[$i];
            }else{
                $gt[] = $this->arr[$i];
            }
            $count++;
        }

        $lt = $left->setArr($lt)->sort();
        $gt = $right->setArr($gt)->sort();

        $this->cycle_count = $count;
        $re = array_merge($lt, [$v], $gt);
        return $re;
    }
}