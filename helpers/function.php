<?php
/**
 * Created by PhpStorm.
 * User: Miko
 * Date: 2017/2/9
 * Time: 17:25
 */

if(!function_exists('catetree')){
    function catetree($data,$pid=0,$level=0,$html='-'){
        static $list = [];
        foreach($data as $v){
            if($pid == $v->cate_id){
                if($level != 0){
                    $v->html = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$level);
                    $v->html .= '|';
                    $v->html .= str_repeat($html,$level);
                }
                $list[] = $v;
                catetree($data,$v->id,$level+1);
            }
        }
       
        return $list;
    }
}

