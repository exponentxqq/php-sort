<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 2018/3/15
 * Time: 18:10
 */

namespace Sort;


class MergeSort extends Sort
{

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
}