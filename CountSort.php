<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 2018/3/15
 * Time: 17:19
 */

namespace Sort;


class CountSort extends Sort
{

    public function sort()
    {
        $countings = [];

        for ($i = 0; $i < $this->length; $i++){
            $this->cycle_count++;
            if(isset($countings[$this->arr[$i]])) {
                $countings[$this->arr[$i]] += 1;
            }else{
                $countings[$this->arr[$i]] = 1;
            }
        }

        $arr = [];
        for ($i = 0; $i < count($countings); $i++){
            for ($j = 0; $j < $countings[$i]; $j++) {
                $this->cycle_count++;
                $arr[] = $i;
            }
        }

        return $arr;
    }
}