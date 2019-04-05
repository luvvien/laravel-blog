<?php
/**
 * Created by PhpStorm.
 * User: vien
 * Date: 2019/3/27
 * Time: 10:38 AM
 */

/**
 * @func 时间戳格式化
 * @param $timestamp
 * @return false|string
 */
function vn_time($timestamp)
{
    return date('Y-m-d H:i:s', $timestamp);
}