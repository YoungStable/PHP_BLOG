<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Captcha {
    private $width;
    private $height;
    private $NoisePerPx;
    private $LineNum;
    private $ChrNum;
    private $str;

    public function __construct() {
        $this->initParam();
    }
    
    private function initParam(){
        $this->width = $GLOBALS['conf']['Captcha']['width'];
        $this->height = $GLOBALS['conf']['Captcha']['height'];
        $this->NoisePerPx = $GLOBALS['conf']['Captcha']['NoisePerPx'];
        $this->LineNum = $GLOBALS['conf']['Captcha']['LineNum'];
        $this->ChrNum = $GLOBALS['conf']['Captcha']['ChrNum'];
    }
    
    public function generate() {
        //创建画布
        $img = imagecreatetruecolor($this->width, $this->height);
        //创建背景色句柄，并填充
        $backcolor = imagecolorallocate($img, mt_rand(200, 255), mt_rand(150, 255), mt_rand(200, 255));
        imagefill($img, 0, 0, $backcolor);

        //创建随机字符数组
        $arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        shuffle($arr);
        $rand_key = array_rand($arr, $this->ChrNum);
        $str = '';
        
        //得到随机字符
        foreach ($rand_key as $key) {
            $str .= $arr[$key];
        }
        //存入Session
        @session_start();
        $_SESSION['captcha'] = $str;
        //绘制字符
        $span = floor($this->width / ($this->ChrNum + 1));
        
        for ($i = 1; $i <= $this->ChrNum; $i++) {
            $fore_color = imagecolorallocate($img, mt_rand(200, 255), mt_rand(0, 100), mt_rand(0, 80));
            imagestring($img, 5, $i * $span, ($this->height/2)-6, $str[$i - 1], $fore_color);
        }
        //绘制干扰线
        for ($i = 1; $i <= $this->LineNum; $i++) {
            $line_color = imagecolorallocate($img, mt_rand(0, 150), mt_rand(30, 250), mt_rand(200, 255));
            imageline($img, mt_rand(0, $this->width-1), mt_rand(0, $this->height-1), mt_rand(0, $this->width-1), mt_rand(0, $this->height-1), $line_color);
        }
        //绘制噪点
        for ($i = 1; $i <= $this->height * $this->width * $this->NoisePerPx; $i++) {
            $pix_color = imagecolorallocate($img, mt_rand(100, 150), mt_rand(0, 120), mt_rand(0, 255));
            imagesetpixel($img, mt_rand(0, $this->width), mt_rand(0, $this->height), $pix_color);
        }
        
        header('content-type:image/png');
        ob_clean();
        imagepng($img);

        imagedestroy($img);
    }
    
    public function setWidth($width){
        $this->width = $width;
    }
    
    public function setHeight($height){
        $this->height = $height;
    }

    //多个地方会用到验证码比对，故写在Captcha类中，
    public static function checkCaptcha($captcha_code) {
        @session_start();
        return strtolower($captcha_code) === strtolower($_SESSION['captcha']);
    }

}
