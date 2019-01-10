<?php


if (! function_exists('arrayToTree')) {

    /**
     * Notes : 将一维关系数组转化为数组结构数组
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 16:10
     ** @param array $array     一维数组
     * @param string $id_name  id字段名   例:auth_id
     * @param string $pid_name 父id字段名 例:auth_pid
     * @return array
     */
    function arrayToTree($array,$id_name='',$pid_name=''){
        $tree = [];
        foreach($array as $k=>$item) {
            if ($item[$pid_name] == 0) {
                $tree[] = &$array[$k];
            } else {
                foreach($array as $key=>$v){
                    if ($v[$id_name] == $item[$pid_name]) {
                        $array[$key]['children'][] = &$array[$k];
                        break;
                    }
                }
            }
        }
        return  $tree;
    }
}

if (! function_exists('arrayLevel')){

    /**
     * Notes :
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 16:07
     * @param array $array     一维数组
     * @param string $id_name  id字段名   例:auth_id
     * @param string $pid_name 父id字段名 例:auth_pid
     * @param int $pid         默认pid值
     * @param int $level       默认层级值
     * @return array
     */
    function arrayLevel($array,$id_name='id',$pid_name='pid', $pid = 0, $level = 1) {
        $list = [];
        foreach ($array as $item) {
            if ($item[$pid_name] == $pid) {
                $item['level'] = $level;
                $list[] = $item;
                arrayLevel($array, $item[$id_name], $level + 1);
            }
        }
        return $list;
    }
}
