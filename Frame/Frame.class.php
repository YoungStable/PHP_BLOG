<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Frame {

    public static function run() {
        static::initDirConst();
        static::initConfig();
        static::initDispatchParam();
        static::initPlatformConst();
        static::initAutoload();
        static::initDispatch();
    }

    private static function initDirConst() {
        define('ROOT_DIR', str_replace('\\', '/', getcwd() . '/'));
        define('APP_DIR', ROOT_DIR . 'App/');
        define('FRAME_DIR', ROOT_DIR . 'Frame/');
        define('CONFIG_DIR', APP_DIR . 'config/');
        define('DAO_DIR', FRAME_DIR . 'dao/');
        define('VENDOR_DIR', ROOT_DIR.'vendor/');
        define('SMARTY_DIR', VENDOR_DIR.'smarty/');
        define('PUBLIC_DIR', ROOT_DIR.'Public/');
        define('UPLOADS_DIR', ROOT_DIR.'Uploads/');
    }

    private static function initConfig() {
        $GLOBALS['conf'] = include CONFIG_DIR . 'conf.php';
    }

    private static function initDispatchParam() {
        $default_platform = $GLOBALS['conf']['App']['default_platform'];
        define('PLATFORM', isset($_GET['p']) ? $_GET['p'] : $default_platform);

        $default_action = $GLOBALS['conf'][PLATFORM]['default_action'];
        define('ACTION', isset($_GET['a']) ? $_GET['a'] : $default_action);

        $default_controller = $GLOBALS['conf'][PLATFORM]['default_controller'];
        define('CONTROLLER', isset($_GET['c']) ? $_GET['c'] : $default_controller);
    }

    private static function initPlatformConst() {
        define('CURRENT_CON_DIR', APP_DIR . PLATFORM . '/Controller/');
        define('CURRENT_MODEL_DIR', APP_DIR . PLATFORM . '/Model/');
        define('CURRENT_VIEW_DIR', APP_DIR . PLATFORM . '/View/');
        
        define('CSS_DIR', '/Public/'.PLATFORM.'/css');
        define('JS_DIR', '/Public/'.PLATFORM.'/js');
        define('IMAGES_DIR', '/Public/'.PLATFORM.'/images');
    }

    public static function autoload($class_name) {
        $frame_classes = array(
            'Controller' => FRAME_DIR . 'Controller.class.php',
            'Model' => FRAME_DIR . 'Model.class.php',
            'Factory' => FRAME_DIR . 'Factory.class.php',
            'MySQLDB' => DAO_DIR . 'MySQLDB.class.php',
            'PDODB' => DAO_DIR .'PDODB.class.php',
            'Interface_DAO' => DAO_DIR . 'Interface_DAO.interface.php',
            'Smarty' => SMARTY_DIR . 'Smarty.class.php',
            'Captcha' => VENDOR_DIR . 'Captcha.class.php',
            'Upload' => FRAME_DIR.'Upload.class.php',
            'Page' => FRAME_DIR.'Page.class.php',
            'Image' => FRAME_DIR.'Image.class.php'
        );
        if (isset($frame_classes[$class_name])) {
            include $frame_classes[$class_name];
        } elseif (substr($class_name, -10) == 'Controller') {
            include CURRENT_CON_DIR . $class_name . '.class.php';
        } elseif (substr($class_name, -5) == 'Model') {
            include CURRENT_MODEL_DIR . $class_name . '.class.php';
        }
    }

    private static function initAutoload() {
        //实现中被调用的自动加载函数为静态函数，故加上类名
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    private static function initDispatch() {
        $controller_name = CONTROLLER . 'Controller';
        $controller = new $controller_name;
        $action_name = ACTION . 'Action';
        $controller->$action_name();
    }

}
