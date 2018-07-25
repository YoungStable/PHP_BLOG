<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Image{
    public static $error;
    public function makeThumb($max_w,$max_h,$src_file,$path,$red=255,$green=255,$blue=255){
        if(!file_exists($src_file)){
            self::$error = '原图像文件不存在';
            return false;
        }
        if(!getimagesize($src_file)){
            self::$error = '原图像文件类型不合法';
            return false;
        }
        //getimagesize不单是获取图像大小，还获取了其他文件信息
        $srcInfo = getimagesize($src_file);
        switch($srcInfo[2]){
            case 1:$type = 'gif';break;
            case 2:$type = 'jpeg';break;
            case 3:$type = 'png';
        }
        $create_func_name = 'imagecreatefrom'.$type;
        //利用可变函数
        $src_img = $create_func_name($src_file);
        
        $dst_img = imagecreatetruecolor($max_w, $max_h);
        //第一次调用imagecolotallocate会给图像填充背景色
        $bg_color = imagecolorallocate($dst_img, $red, $green, $blue);
        imagefill($dst_img, 0, 0, $bg_color);
        $dst_wh = $max_w/$max_h;
        $src_w = $srcInfo[0];
        $src_h = $srcInfo[1];
        $src_wh = $src_w/$src_h;
        //进行宽高比的比较，将目标画布调整成与原图像同比例
        if($src_wh>$dst_wh){
            $dst_w = $max_w;
            $dst_h = floor($dst_w/$src_wh);
        }
        else{
            $dst_h = $max_h;
            $dst_w = floor($dst_h*$src_wh);
        }
        /*解释这条表达式：
         * 假设src_wh>dst_wh的情况，此时原图像比例，比目标画布的原始比例“更宽”
         * 故在适配时，需要将目标画布的高度减少，以适配原图像的比例(增加长度也能适配，但此处不允许比max_w更大的宽)。
         * 故max_h-dst_w必然大于零（不改动大小时，则等于零）
         * src_wh<dst_wh的情况同理可得，比例"更高"，故需缩短宽度
         */
        $dst_x = ($max_w-$dst_w)/2;
        $dst_y = ($max_h-$dst_h)/2;
        if(imagecopyresampled($dst_img, $src_img, $dst_x, $dst_y, 0, 0, $dst_w, $dst_h, $src_w, $src_h)){
            //basename()返回参数中路径里的文件名(默认包含扩展名)
            $filename = basename($src_file);
            $thumb = 'thumb_'.$filename;
            $save_func_name = 'image'.$type;
            $save_func_name($dst_img,$path.'/'.$thumb);
            imagedestroy($dst_img);
            imagedestroy($src_img);
            return $thumb;
        }else{
            imagedestroy($dst_img);
            imagedestroy($src_img);
            self::$error='发生未知错误，缩略图生成失败';
            return FALSE;
        }
    }
}
