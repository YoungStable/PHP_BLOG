<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Upload {
    public static $error;
    
    public function uploadAction($file, $allow, $path,$maxsize = 1048576){
        switch($file['error']){
            case 1:self::$error = '上传失败，超出了限制文件的大小';
                    return FALSE;
            case 2:self::$error = '上传失败，超出了浏览器规定的文件大小！';
                    return FALSE;
            case 3:self::$error = '上传失败，文件不完整！';
                    return FALSE;
            case 4:self::$error = '请先选择要上传的文件！';
                    return FALSE;
            case 6:
            case 7:self::$error = '服务器繁忙，请稍后再试！';
                    return FALSE;
        }
        
        if($file['size']>$maxsize){
            self::$error = '上传失败！超出了文件的限制大小';
            return FALSE;
        }
        
        if(!in_array($file['type'], $allow)){
            self::$error = '上传失败！文件类型不符合要求！允许的类型有：'. implode(',',$allow);
            return FALSE;
        }
        
        $newname = $this->randName($file['name']);
        $destination = $path.'/'.$newname;
        $result = move_uploaded_file($file['tmp_name'],$destination);
        if($result){
            return $newname;
        }else{
            self::$error = '上传失败！发生未知错误！';
            return FALSE;
        }
    }
    
    private function randName($filename){
        $newname = date('YmdHis');
        $NumberStr = '0987654321';
        for($i=0;$i<6;$i++){
            $newname .= $NumberStr[mt_rand(0, strlen($NumberStr)-1)];
        }
        $newname .= strrchr($filename, '.');
        return $newname;
    }
}
