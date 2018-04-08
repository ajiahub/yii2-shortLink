<?php

namespace chinahub\shortlink\helpers;

/**
 * ---------------------------------------
 * NumberHelper.php
 * Author: ligang <ligang@chexiu.cn>
 * Date: 2018/3/30 14:22
 * ---------------------------------------
 */
class NumberHelper
{
    /**
     * 十进制数转换成62进制
     * @param $num
     * @return string
     */
    public static function from10_to62($num)
    {
        $to = 62;
        $dict = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $ret = '';
        do {
            $ret = $dict[bcmod($num, $to)] . $ret;
            $num = bcdiv($num, $to);
        } while ($num > 0);
        return $ret;
    }

    /**
     * 62进制数转换成十进制数
     * @param $num
     * @return int|string
     */
    public static function from62_to10($num)
    {
        $from = 62;
        $num = strval($num);
        $dict = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $len = strlen($num);
        $dec = 0;
        for ($i = 0; $i < $len; $i++) {
            $pos = strpos($dict, $num[$i]);
            $dec = bcadd(bcmul(bcpow($from, $len - $i - 1), $pos), $dec);
        }
        return $dec;
    }
}