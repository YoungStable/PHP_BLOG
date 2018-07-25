<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Factory{
    public static  function getModelInstance($class_name){
        static $model_list = array();
        if(!isset($model_list[$class_name])){
            $model_list[$class_name] = new $class_name;
        }
        return $model_list[$class_name];
    }
}
