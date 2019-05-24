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
     * Notes : 找出一维数组的等级
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


if ( !function_exists('uploadFile') ) {


    /**
     * Notes : 上传文件函数
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/18 9:58
     * @param $file            表单的name名
     * @param string $path     上传的路径
     * @param bool $childPath  是否根据日期生成子目录
     * @return array  上传的状态
     */
    function uploadFile($file, $path = 'upload', $newidth = 200, $childPath = true)
    {
        //判断请求中是否包含name=file的上传文件
        if (!request()->hasFile($file)) {
            $data = ['status_code' => 500, 'message' => '上传文件为空'];
            return $data;
        }
        $file = request()->file($file);

        //上传文件类型列表
        $uptypes=[
            'image/jpg',
            'image/jpeg',
            'image/png',
            'image/gif',
        ];
        if (!in_array($file->getClientMimeType(), $uptypes)){
            $data = ['status_code' => 500, 'message' => '上传文件不合法'];
            return $data;
        }

        //判断文件上传过程中是否出错
        if (!$file->isValid()) {
            $data = ['status_code' => 500, 'message' => '文件上传出错'];
            return $data;
        }
        //兼容性的处理路径的问题
        if ($childPath == true) {
            $path = './' . trim($path, './') . '/' . date('Ymd') . '/';
        } else {
            $path = './' . trim($path, './') . '/';
        }
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
        //获取上传的文件名
        $oldName = $file->getClientOriginalName();
        //TODO
        //获取图像信息
        list($width, $height, $type)= getimagesize($file);

        $imageinfo = [
            'width'=>$width,
            'height'=>$height,
            'type'=>image_type_to_extension($type,false),
        ];

        $fun = "imagecreatefrom".$imageinfo['type'];

        $image = $fun($file);

        $newWidth  = $newidth;
        $newHeight = $height * ($newidth/$width);

        $image_thump = imagecreatetruecolor($newWidth, $newHeight);

        //将原图复制带图片载体上面，并且按照一定比例压缩,极大的保持了清晰度
        imagecopyresampled($image_thump, $image,0,0,0,0, $newWidth, $newHeight, $width, $height);

        $imgType = "image" . $imageinfo['type'];
        //组合新的文件名

        $newName = uniqid() . '.' . $file->getClientOriginalExtension();

        $result = $imgType($image_thump, $path.$newName);

        imagedestroy($image_thump);
        imagedestroy($image);
        //上传失败
        if (!$result) {
            $data = [
                'success' => 0,
                'message' => '保存文件失败',
                'url' => ''
            ];
            return $data;
        }
        //上传成功
        $data =   [
            'success' => 1,
            'message' => '上传成功',
            'url' => trim($path, '.').$newName
        ];


        return $data;
    }
}

