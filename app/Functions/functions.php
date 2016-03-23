<?php
/**
 * UUID算法
 * Author : leePeng <lp@kuhui.com.cn>
 * Data : 2016-1-7
 * @return String
 */
function uuid() {
    $charid = strtoupper ( md5 ( uniqid ( rand (), true ) ) ); //根据当前时间（微秒计）生成唯一id.
    $hyphen = chr ( 45 ); // "-"
    $uuid = '' .
        substr ( $charid, 0, 8 ) .
        $hyphen . substr ( $charid, 8, 4 ) .
        $hyphen . substr ( $charid, 12, 4 ) .
        $hyphen . substr ( $charid, 16, 4 ) .
        $hyphen . substr ( $charid, 20, 12 );
    return $uuid;
}
/**
 * 随机产生六位数
 * Author : leePeng <lp@kuhui.com.cn>
 * Data : 2016-1-7
 * @param int $len
 * @param string $format
 * @return string
 */
function randStr($len = 6, $format = 'ALL'){
    switch ($format) {
        case 'ALL':
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
            break;
        case 'CHAR':
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-@#~';
            break;
        case 'NUMBER':
            $chars = '0123456789';
            break;
        default :
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
            break;
    }
    mt_srand((double)microtime() * 1000000 * getmypid());
    $password = "";
    while (strlen($password) < $len)
        $password .= substr($chars, (mt_rand() % strlen($chars)), 1);
    return $password;
}
