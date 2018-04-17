<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 2018/3/15
 * Time: 17:19
 */

namespace Sort;

/**
 * 计数排序
 * Class CountSort
 * @package Sort
 */
class CountSort extends Sort
{

    public function sort()
    {
        $countings = [];
        $max = $this->arr[0];
        for ($i = 0; $i < $this->length; $i++){
            $this->cycle_count++;
            if(isset($countings[$this->arr[$i]])) {
                $countings[$this->arr[$i]] += 1;
            }else{
                $countings[$this->arr[$i]] = 1;
            }
            $max = $this->arr[$i] > $max ? $this->arr[$i] : $max;
        }

        $arr = [];
        for ($i = 0; $i <= $max; $i++){
            for ($j = 0; isset($countings[$i]) && $j < $countings[$i]; $j++) {
                $this->cycle_count++;
                $arr[] = $i;
            }
        }

        return $arr;
    }
}