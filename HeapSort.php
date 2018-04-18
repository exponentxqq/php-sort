<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 2018/4/18
 * Time: 21:08
 */

namespace Sort;


class HeapSort extends Sort
{
    private $heap;
    public function __construct($arr = [])
    {
        $this->heap = MaxHeap::heapify($arr);
    }
    public function sort()
    {
        $arr = [];
        for ($i = $this->heap->size() - 1; $i >= 0; $i--) {
            $arr[$i] = $this->heap->extractMax();
        }

        return $arr;
    }
}

class MaxHeap
{
    private $data;
    private $capacity = 0;

    public function __construct(int $capacity)
    {
        $this->data = new \SplFixedArray($capacity);
    }

    public function size():int
    {
        return $this->capacity + 1;
    }

    public function isEmpty():bool
    {
        return $this->capacity < 0;
    }

    public static function heapify($data):self
    {
        $len = count($data);
        $heap = new self($len);
        $heap->data = $data;
        $heap->capacity = $len - 1;
        for ($i = floor($heap->capacity / 2); $i >= 0 ; $i--) {
            $heap->shiftDown($i);
        }
        return $heap;
    }

    public function insert($data)
    {
        $this->data[$this->capacity] = $data;
        $this->shiftUp($this->capacity);
        $this->capacity++;
    }

    public function extractMax()
    {
        if ($this->isEmpty()) return false;
        $result = $this->data[0];

        $this->swap($this->capacity, 0);
        $this->shiftDown(0);
        unset($this->data[$this->capacity]);
        $this->capacity--;
        return $result;

    }

    private function shiftUp($current)
    {
        while ($current > 0 && $this->getParent($current) < $this->data[$current]) {
            $this->swap($this->parentKey($current), $current);
            $current = $this->parentKey($current);
        }
    }

    private function shiftDown($current)
    {
        while (($left_key = $this->leftKey($current)) <= $this->capacity) {
            $swap = $left_key;
            $right_key = $this->rightKey($current);
            if ($right_key <= $this->capacity && $this->getLeft($current) < $this->getRight($current))
                $swap = $right_key;

            if ($this->data[$current] >= $this->data[$swap])
                break;

            $this->swap($current, $swap);
            $current = $swap;
        }
    }

    public function printHeap()
    {
        $plies = $this->getPlies();
        $key = 0;
        for ($i = 1; $i <= $plies; $i++) {
            $count = pow(2, ($i - 1));
            $multi = pow(2, $plies - $i);
            echo str_repeat(' ', $multi);
            for ($j = 0; $j < $count; $j++) {
                if (!isset($this->data[$key])) break;
                echo $this->data[$key++] . ' ';
            }
            echo "\n";
        }
    }

    private function getRight($key)
    {
        return $this->data[$key * 2 + 2];
    }

    private function getLeft($key)
    {
        return $this->data[$key * 2 + 1];
    }

    private function getParent($key)
    {
        return $this->data[(int)ceil($key / 2 - 1)];
    }

    private function parentKey($key):int
    {
        return (int)ceil($key / 2 - 1);
    }

    private function leftKey($key):int
    {
        return $key * 2 + 1;
    }

    private function rightKey($key):int
    {
        return $key * 2 + 2;
    }

    private function swap($a, $b)
    {
        $tmp = $this->data[$a];
        $this->data[$a] = $this->data[$b];
        $this->data[$b] = $tmp;
    }

    public function getPlies()
    {
        $count = 0;
        $value = $this->capacity;
        do {
            $value /= 2;
            $count++;
        } while ($value >= 2);
        return $count + 1;
    }

    public function __destruct()
    {
        unset($this->data);
    }
}