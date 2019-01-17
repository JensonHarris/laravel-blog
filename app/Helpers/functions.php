<?php


if (! function_exists('arrayToTree')) {

    /**
     * Notes : 将一维关系数组转化为数组结构数组
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 16:10
     ** @param array $array     一维数组
     * @param string $idname  id字段名   例:id
     * @param string $pidname 父id字段名 例:pid
     * @return array
     */
    function arrayToTree($array,$idname='',$pidname=''){
        $tree = [];
        foreach($array as $k=>$item) {
            if ($item[$pidname] == 0) {
                $tree[] = &$array[$k];
            } else {
                foreach($array as $key=>$v){
                    if ($v[$idname] == $item[$pidname]) {
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
     * @param string $idname  id字段名   例:id
     * @param string $pidname 父id字段名 例:pid
     * @param int $pid         默认pid值
     * @param int $level       默认层级值
     * @return array
     */
    function arrayLevel($array, $idname = 'id', $pidname = 'pid', $pid = 0, $level = 1) {
        static $list = []; //static
        foreach ($array as $key=>$item) {
            if ($item[$pidname] == $pid) {
                $item['level'] = $level;
                $list[] = $item;
                unset($array[$key]);
                arrayLevel($array, $idname, $pidname, $item[$idname] , $level + 1);
            }
        }
        return $list;
    }
}



if ( !function_exists('markdown_to_html') ) {
    /**
     * 把markdown转为html
     *
     * @param $markdown
     * @return mixed|string
     */
    function markdown_to_html($markdown)
    {
        // 正则匹配到全部的iframe
        preg_match_all('/&lt;iframe.*iframe&gt;/', $markdown, $iframe);
        // 如果有iframe 则先替换为临时字符串
        if (!empty($iframe[0])) {
            $tmp = [];
            // 组合临时字符串
            foreach ($iframe[0] as $k => $v) {
                $tmp[] = '【iframe'.$k.'】';
            }
            // 替换临时字符串
            $markdown = str_replace($iframe[0], $tmp, $markdown);
            // 讲iframe转义
            $replace = array_map(function ($v){
                return htmlspecialchars_decode($v);
            }, $iframe[0]);
        }
        // markdown转html
        $parser = new Parser();
        $html = $parser->makeHtml($markdown);
        $html = str_replace('<code class="', '<code class="lang-', $html);
        // 将临时字符串替换为iframe
        if (!empty($iframe[0])) {
            $html = str_replace($tmp, $replace, $html);
        }
        return $html;
    }
}

