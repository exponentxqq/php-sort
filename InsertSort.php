<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 2018/3/15
 * Time: 15:14
 */

namespace Sort;


class InsertSort extends Sort
{

    public function sort($arr = [])
    {
        for ($i = 1; $i < $this->length; $i++) {
            $temp = $this->arr[$i];
            for ($j = $i - 1; $j >= 0; $j--) {
                if($temp < $this->arr[$j]){
                    $this->cycle_count++;
                    $this->arr[$j + 1] = $this->arr[$j];
                }else{
                    break;
                }
            }
            $this->arr[$j + 1] = $temp;
        }
        return $this->arr;
    }
}
