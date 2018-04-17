<?php
/**
 * Created by PhpStorm.
 * User: xqq
 * Date: 2018/3/15
 * Time: 11:56
 */

namespace Sort;

use tests\SelectSortTest;

require '../autoload.php';

ini_set('display_errors',1);            //错误信息
ini_set('display_startup_errors',0);    //php启动错误信息
ini_set('xdebug.max_nesting_level', 10000);
error_reporting(E_ALL);

$a = Sort::generateNearlyOrderedIntArray(100);

var_dump(count($a));
//var_dump($a);
$sort = new CountSort([1,1,5,5,5,7,2,5,3,2,1,6,7,8,5,3,1,16]);
$time = microtime(true);
$arr = $sort->sort();
//$arr = insertionSort([7, 5, 6, 1, 9, 2, 4]);
var_dump(microtime(true) - $time);
var_dump(count($arr));
var_dump($arr);
var_dump('cycle_count:'.$sort->getCycleCount());