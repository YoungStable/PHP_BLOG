<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface Interface_DAO{
    public static function getInstance($config);
    public function my_query($sql);
    public function fetchAll($sql);
    public function fetchRow($sql);
    public function fetchColumn($sql);
    
}