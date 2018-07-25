<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
return array(
    'database' => array(
        'host' => '127.0.0.1',
        'port' => '3306',
        'user' => 'root',
        'pass' => 'shasinitmd2011',
        'charset' => 'utf8',
        'dbname' => 'blog'        
    ),
    'App' => array(
        'default_platform' => 'Front',
        'dao' => 'PDO'
    ),
    'Front' => array(
        'default_controller' => 'Index',
        'default_action' => 'index'
    ),
    'Admin' => array(
        'default_controller' => 'Admin',
        'default_action' => 'login'
    ),
    'Captcha' => array(
        'width' => 80,
        'height' => 32,
        'NoisePerPx' => 0.03,
        'LineNum' => 5,
        'ChrNum' => 4
    ),
    'Page' => array(
        'pageSize' => 8,
        'maxnum' => 5
    )
);
