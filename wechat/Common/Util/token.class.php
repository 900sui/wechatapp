<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/3 0003
 * Time: 13:15
 */

namespace Common\Util;


class token
{
    public function set_token($values){
        define("TOKEN_SALT","OdsryJZCevzfr1YbDS4I");

        sort($values);
        $v = "";

        foreach($values as $key => $value){
            $v .= $value;
        }

        return strtolower(md5(strtolower(md5($v)).TOKEN_SALT));
    }
}